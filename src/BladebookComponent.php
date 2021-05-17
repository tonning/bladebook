<?php

namespace Tonning\Bladebook;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Symfony\Component\VarExporter\VarExporter;
use Tonning\Bladebook\Http\Slots\EmptySlot;
use Tonning\Bladebook\Http\Slots\Slot;

abstract class BladebookComponent extends Component
{
    public string $__activeTab = 'preview';

    public string $__code = '';

    public array $__slotValues = [];

    public array $__slotCustomValues = [];

    private bool $atLeastOnePropertyHasBeenSet = false;

    public function mount()
    {
        $this->__code = method_exists($this, 'codeSnippet') ? $this->codeSnippet() : $this->snippet();

        $this->selectFirstSlots();

        if (method_exists($this, 'mounted')) {
            $this->mounted();
        }
    }

    public function updated($propertyName)
    {
        if (property_exists($this, 'rules')) {
            $this->validate();
        }

        if (Str::contains($propertyName, '__slotValues')) {
            unset($this->__slotCustomValues[Str::after($propertyName, '__slotValues.')]);
        }

        $this->__code = method_exists($this, 'codeSnippet') ? $this->codeSnippet() : $this->snippet();
    }

    public function snippet() : string
    {
        $component = $this->getComponentStringable()->kebab()->replace('.-', '.');

        $bladeComponentNamespace = $this->getBladeComponentNamespace();

        $code = "<x-{$bladeComponentNamespace}::{$component}";

        foreach ($this->getOptions() as $key => $option) {
            $hiddenKey = "_{$key}";

            if (property_exists($this, $hiddenKey) && empty($this->$hiddenKey)) {
                continue;
            }

            if ($this->$key) {
                if ($option['type'] == 'bool') {
                    $code .= PHP_EOL . "    {$key}";
                } elseif ($option['type'] == 'array' && ! empty($this->$hiddenKey) && property_exists($this, $hiddenKey)) {
                    $code .= PHP_EOL . '    :' . $key . '="' . PHP_EOL . $this->indent(8, VarExporter::export($this->$hiddenKey)) . PHP_EOL . '    "';
                } else {
                    $code .= PHP_EOL . '    ' . ($key == 'content' ? 'value' : $key) . "=\"{$this->$key}\"";
                }
            }
        }

        if ($this->checkIfAtLeaseOneOptionHasBeenSet()) {
            $code .= PHP_EOL;
        }

        $code .= '>';

        foreach ($this->__slotValues as $key => $slotValue) {
            if (isset($this->__slotCustomValues[$key]) && $this->__slotCustomValues[$key]) {
                $code .= PHP_EOL;

                if ($key !== Slot::MAIN_SLOT) {
                    $code .= '    <x-slot="' . $key . '">' . PHP_EOL;
                }

                $code .= $this->indent($key === Slot::MAIN_SLOT ? 4 : 8, $this->__slotCustomValues[$key]);

                if ($key !== Slot::MAIN_SLOT) {
                    $code .= PHP_EOL . '    </x-slot>';
                }
            } elseif (isset($this->__slotValues[$key]) && $this->__slotValues[$key] && $this->__slotValues[$key] !== EmptySlot::class) {
                $code .= PHP_EOL;

                if ($key !== Slot::MAIN_SLOT) {
                    $code .= '    <x-slot="' . $key . '">' . PHP_EOL;
                }

                $code .= $this->indent($key === Slot::MAIN_SLOT ? 4 : 8, (new $this->__slotValues[$key])->toHtml());

                if ($key !== Slot::MAIN_SLOT) {
                    $code .= PHP_EOL . '    </x-slot>';
                }
            }
        }

        if ($this->checkIfAtLeaseOneOptionHasBeenSet() || ! empty($this->__slotValues)) {
            $code .= PHP_EOL;
        }

        $code .= "</x-{$bladeComponentNamespace}::{$component}>";

        return $code;
    }

    public function render()
    {
        $component = $this->getComponentStringable();

        $name = $component
            ->afterLast('.')
            ->kebab()
            ->replace('-', ' ')
            ->title();

        $breadcrumbs = [];

        $component
            ->kebab()
            ->replace('.-', '.')
            ->split('/[\.]/')
            ->reduce(function ($carry, $item) use (&$breadcrumbs) {
                $carry = $carry . '/' . $item;

                $breadcrumbs[] = [
                    'title' => Str::of($item)->kebab()->replace('-', ' ')->title(),
                    'url' => Str::start($carry, '/fabrick'),
                ];

                return $carry;
            });

        View::share('name', $name);
        View::share('breadcrumbs', $breadcrumbs);
        View::share('code', $this->__code);
        View::share('options', $this->getOptions());
        View::share('slots', $this->getSlots());

        return view("{$this->getBladeComponentNamespace()}::bladebook.{$component->lower()}")
            ->extends('book::layouts.app');
    }

    private function getOptions() : array
    {
        $options = [];

        $publicProperties = array_filter((new \ReflectionClass($this))->getProperties(), function ($property) {
            return $property->isPublic() && ! $property->isStatic() && ! Str::startsWith($property->getName(), '_') && $property->getDeclaringClass()->getName() == $this::class;
        });

        foreach ($publicProperties as $publicProperty) {
            $options[$publicProperty->getName()] = [
                'type' => $this->publicPropertyHasOptions($publicProperty->getName()) ? 'array' : $publicProperty->getType()->getName(),
                'label' => (string) Str::of($publicProperty->getName())->kebab()->replace('-', ' ')->title(),
            ];

            if ($this->publicPropertyHasOptions($publicProperty->getName())) {
                $options[$publicProperty->getName()]['options'] = $this->getPropertyOptionValue($publicProperty->getName());
            }

            if (property_exists($this, 'helpers') && array_key_exists($publicProperty->getName(), $this->helpers)) {
                $options[$publicProperty->getName()]['help'] = $this->helpers[$publicProperty->getName()];
            }
        }

        return $options;
    }

    private function publicPropertyHasOptions($property) : bool
    {
        return method_exists($this, $property . 'Options');
    }

    private function getPropertyOptionValue(string $property)
    {
        $method = $property . 'Options';

        return $this->$method();
    }

    private function getSlots() : array
    {
        if (! property_exists($this, 'slots')) {
            return [];
        }

        $all = [];

        foreach ($this->slots as $key => $slots) {
            $all[$key] = [
                'label' => Str::of($key)->snake(' ')->title(),
                'examples' => collect($slots)->mapWithKeys(fn ($class) => [$class => $class::getName()]),
            ];
        }

        return $all;
    }

    public function indent(int $spaces, string $content) : string
    {
        return collect(explode(PHP_EOL, $content))->map(fn ($line) => Str::repeat(' ', $spaces) . $line)->implode(PHP_EOL);
    }

    protected function checkIfAtLeaseOneOptionHasBeenSet() : bool
    {
        if ($this->atLeastOnePropertyHasBeenSet === true) {
            return true;
        }

        collect($this->getOptions())->each(function ($option, $key) {
            $hiddenKey = "_{$key}";

            if ($option['type'] == 'array' && (property_exists($this, $hiddenKey))) {
                if (! empty($this->$hiddenKey)) {
                    $this->atLeastOnePropertyHasBeenSet = true;

                    return false;
                }
            } elseif ($this->$key) {
                $this->atLeastOnePropertyHasBeenSet = true;

                return false;
            }
        });

        return $this->atLeastOnePropertyHasBeenSet;
    }

    /**
     * @TODO: Use book configurations instead of hardcoded.
     *
     * @return \Illuminate\Support\Stringable
     */
    protected function getComponentStringable() : \Illuminate\Support\Stringable
    {
        $component = Str::of(get_class($this))->after('Helix\\Fabrick\\Http\\Bladebook\\')->replace('\\', '.');

        return $component;
    }

    private function selectFirstSlots()
    {
        if (! property_exists($this, 'slots')) {
            return;
        }

        foreach ($this->slots as $key => $class) {
            $this->__slotValues[$key] = $class[0];
        }
    }

    private function getBladeComponentNamespace()
    {
        foreach (config('bladebook.books') as $book) {
            if (Str::after($this::class, $book['namespace']) !== $book['namespace']) {
                return $book['bladeComponentNamespace'];
            }
        }

        throw new \Exception('Bladebook book not found');
    }
}
