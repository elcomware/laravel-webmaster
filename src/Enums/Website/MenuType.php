<?php

namespace Elcomwares\WebMaster\Enums\WebSite;

enum MenuType: string
{
    case MainMenu = 'main_menu';
    case SubMenu = 'sub_menu';
    case DirectLink = 'direct_link';
    case SectionLink = 'section-link';

    public static function getSitMenus():array
    {
        return [
          self::MainMenu->value,
          self::DirectLink->value,
          self::SubMenu->value,
          self::SectionLink->value,
        ];
    }

    public static function getMenuLabels():array
    {

        return [
            self::MainMenu->name =>'Main Menu',
            self::SubMenu->name =>'Sub Menu',
            self::DirectLink->name =>'Direct Link',
            self::SectionLink->name =>'Section Link',

        ];

    }

}
