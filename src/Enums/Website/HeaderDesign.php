<?php

namespace Elcomwares\WebMaster\Enums\WebSite;

enum HeaderDesign: string
{
    case HeaderFix = 'header_fix';
    case HeaderMovable = 'header_movable';
    case HeaderCustom = 'header_custom';

    public static function getHeaders(): array
    {
        return [
            self::HeaderFix->value,
            self::HeaderMovable->value,
            self::HeaderCustom->value,
        ];

    }
}
