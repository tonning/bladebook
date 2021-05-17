<?php

namespace Tonning\Bladebook;

use Exception;
use HaydenPierce\ClassFinder\ClassFinder;
use Illuminate\Filesystem\Filesystem;
use ReflectionClass;

class BladebookComponentsFinder
{
    protected $books;
    protected $files;
    protected $manifest;
    protected $manifestPath;

    public function __construct(Filesystem $files, $manifestPath, $books)
    {
        $this->files = $files;
        $this->books = $books;
        $this->manifestPath = $manifestPath;
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
