<?php

namespace Tonning\Bladebook;

use Cookie;
use Exception;
use HaydenPierce\ClassFinder\ClassFinder;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use ReflectionClass;

class BladebookComponentsFinder
{
    protected array $books = [];
    protected $files;
    protected $manifest;
    protected string $manifestPath;
    protected array $vendorStylePaths = [];
    protected array $vendorScriptPaths = [];

    public function __construct(Filesystem $files)
    {
        $this->files = $files;

        $this->manifestPath = $this->isOnVapor()
            ? '/tmp/storage/bootstrap/cache/bladebook-components.php'
            : app()->bootstrapPath('cache/bladebook-components.php');
    }

    public function isOnVapor() : bool
    {
        return ($_ENV['SERVER_SOFTWARE'] ?? null) === 'vapor';
    }

    public function registerBook(string $name, string $bladeComponentNamespace, string $namespace = 'App\\Http\\Bladebook')
    {
        $this->books[] = [
            'name' => $name,
            'bladeComponentNamespace' => $bladeComponentNamespace,
            'namespace' => $namespace,
        ];

        return $this;
    }

    public function registerStylePaths($stylePaths, string $key)
    {
        foreach (Arr::wrap($stylePaths) as $stylePath) {
            $this->vendorStylePaths[$key][] = $stylePath;
        }

        return $this;
    }

    public function registerScriptPaths($scriptPaths, $key)
    {
        foreach (Arr::wrap($scriptPaths) as $scriptPath) {
            $this->vendorScriptPaths[$key][] = $scriptPath;
        }

        return $this;
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function getCurrentBookConfig($key = null)
    {
        $config = collect($this->getBooks())->firstWhere('name', $this->getCurrentBookName());

        if (! is_null($key) && $config) {
            return $config[$key];
        }

        return $config;
    }

    public function getCurrentBookName()
    {
        if (is_null(Cookie::get('bladebook'))) {
            return $this->books[0]['name'];
        }

        return json_decode(Cookie::get('bladebook'))->book;
    }

    public function getVendorStylePaths($key) : array
    {
        return $this->vendorStylePaths[$key] ?? [];
    }

    public function getVendorScriptPaths($key) : array
    {
        return $this->vendorScriptPaths[$key] ?? [];
    }

    public function getCurrentVendorStylePaths() : array
    {
        $config = $this->getCurrentBookConfig();

        return $this->getVendorStylePaths($config['bladeComponentNamespace']);
    }

    public function getCurrentVendorScriptPaths() : array
    {
        $config = $this->getCurrentBookConfig();

        return $this->getVendorScriptPaths($config['bladeComponentNamespace']);
    }

    public function find($alias)
    {
        return $this->getManifest()[$alias] ?? null;
    }

    public function getManifest()
    {
        if (! is_null($this->manifest)) {
            return $this->manifest;
        }

        if (! file_exists($this->manifestPath)) {
            $this->build();
        }

        return $this->manifest = $this->files->getRequire($this->manifestPath);
    }

    public function build()
    {
        $this->manifest = $this->getClassNames()
            ->mapWithKeys(function ($class) {
                return [$class::getName() => $class];
            })->toArray();

        $this->write($this->manifest);

        return $this;
    }

    protected function write(array $manifest)
    {
        if (! is_writable(dirname($this->manifestPath))) {
            throw new Exception('The '.dirname($this->manifestPath).' directory must be present and writable.');
        }

        $this->files->put($this->manifestPath, '<?php return '.var_export($manifest, true).';', true);
    }

    public function getClassNames()
    {
        $components = collect();

        foreach ($this->books as $book) {
            $bookComponents = collect(ClassFinder::getClassesInNamespace($book['namespace'], ClassFinder::RECURSIVE_MODE))
                ->filter(function (string $class) {
                    return is_subclass_of($class, BladebookComponent::class) &&
                        ! (new ReflectionClass($class))->isAbstract();
                });

            $components = $components->merge($bookComponents);
        }

        return $components;
    }
}
