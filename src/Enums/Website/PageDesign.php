<?php

namespace Elcomwares\WebMaster\Enums\WebSite;

enum PageDesign: string
{
    case SinglePage = 'single_page';
    case MultiPage = 'multi_page';

    public static function getPageDesigns(): array
    {
        return [
            self::SinglePage->value,
            self::MultiPage->value,
        ];
    }
}
