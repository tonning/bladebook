<?php

namespace Tonning\Bladebook\Http\Slots;

class ParagraphSlot extends Slot
{
    public static function getName() : string
    {
        return 'Paragraph';
    }

    public function toHtml() : string
    {
        return <<<Lipsum
                Dictumst maecenas sociosqu tincidunt nullam integer tristique vestibulum, purus phasellus massa volutpat vulputate vitae. Habitasse congue ligula laoreet penatibus vel massa blandit, accumsan potenti etiam ut ipsum tellus, justo hendrerit ornare morbi mus et. Velit potenti massa porttitor curabitur platea pretium himenaeos sollicitudin, pharetra aenean eros elementum dui netus ad, ex id ridiculus taciti litora luctus quam. Eros erat ante mi volutpat aenean dignissim sit, lacus etiam sociosqu litora gravida lacinia elementum porttitor, dictumst tellus mauris varius sapien feugiat. Nisl id lobortis consequat ipsum velit dignissim libero, taciti condimentum integer posuere urna ac erat facilisis, aptent vitae justo sociosqu conubia ut. Cras consequat volutpat euismod sociosqu neque tortor primis sit, eleifend maecenas finibus facilisis laoreet ligula nisl, dapibus mi natoque varius per vulputate vestibulum.
                Lipsum;
    }
}
