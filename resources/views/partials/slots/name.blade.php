@if(isset($__slotCustomValues[$slot]) && $__slotCustomValues[$slot])
    <x-slot :name="$slot">
        {{ $__slotCustomValues[$slot] }}
    </x-slot>
@elseif(isset($__slotValues[$slot]) && $__slotValues[$slot] && $__slotValues[$slot] !== Tonning\Bladebook\Http\Slots\EmptySlot::class)
    <x-slot :name="$slot">
        {{ new $__slotValues[$slot] }}
    </x-slot>
@endif
