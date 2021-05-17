@if(isset($__slotCustomValues[Tonning\Bladebook\Http\Slots\Slot::MAIN_SLOT]) && $__slotCustomValues[Tonning\Bladebook\Http\Slots\Slot::MAIN_SLOT])
    {{ $__slotCustomValues[Tonning\Bladebook\Http\Slots\Slot::MAIN_SLOT] }}
@elseif(isset($__slotValues[Tonning\Bladebook\Http\Slots\Slot::MAIN_SLOT]) && $__slotValues[Tonning\Bladebook\Http\Slots\Slot::MAIN_SLOT])
    {{ new $__slotValues[Tonning\Bladebook\Http\Slots\Slot::MAIN_SLOT] }}
@endif
