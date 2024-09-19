<?php

namespace Elcomwares\WebMaster\Enums\WebSite;

enum FooterDesign: string
{
    case FooterStyle1 = 'footer_style1';
    case FooterStyle2 = 'footer_style2';
    case FooterStyle3 = 'footer_style3';


    public static function getFooters(): array
    {
        return [
            self::FooterStyle1->value,
            self::FooterStyle2->value,
            self::FooterStyle3->value,
        ];

    }

}
