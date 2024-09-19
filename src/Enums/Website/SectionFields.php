<?php

namespace Elcomwares\WebMaster\Enums\WebSite;

enum SectionFields: int
{
    case TextBox = 1;
    case TextArea = 2;
    case Number = 3;
    case PhoneNumber = 4;
    case EmailAddress = 5;
    case Date = 6;
    case DateTime = 7;
    case Select = 8;
    case Radio = 9;
    case MultiSelect = 10;
    case Checkbox = 11;
    case PhotoFile = 12;
    case AttachFile = 13;
    case VideoFile = 14;
    case YoutubeVideoLink = 15;
    case VimeoVideoLink = 16;
    case FixedTextOrDivide = 17;

    public static function getSectionFields(): array
    {
        return [
            self::TextBox->value,
            self::TextArea->value,
            self::Number->value,
            self::PhoneNumber->value,
            self::EmailAddress->value,
            self::Date->value,
            self::DateTime->value,
            self::Select->value,
            self::Radio->value,
            self::MultiSelect->value,
            self::Checkbox->value,
            self::PhotoFile->value,
            self::AttachFile->value,
            self::VideoFile->value,
            self::YoutubeVideoLink->value,
            self::VimeoVideoLink->value,
            self::FixedTextOrDivide->value,
        ];
    }
}
