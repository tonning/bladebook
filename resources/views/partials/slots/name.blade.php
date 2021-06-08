@unless($__slotValues[$slot] === Tonning\Bladebook\Http\Slots\EmptySlot::class)
    <x-slot :name="$slot">
        {!! $this->getSlot($slot) !!}
    </x-slot>
@endunless
