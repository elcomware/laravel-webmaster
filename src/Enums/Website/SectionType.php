<?php

namespace Elcomwares\WebMaster\Enums\WebSite;

enum SectionType: string
{
    case General = 'general';
    case Photos = 'photos';
    case Videos = 'videos';
    case Audios = 'audios';
    case Private = 'private';
    case DataTable = 'data_table';
    case Documentation = 'documentation';
    case AccordionView = 'accordion_view';
    case PrivateWithSearch = 'private_with_search';
    case PublicForm = 'public_form';

    public static function getWebsiteSections(): array
    {
        return [
            self::General->value,
            self::Photos->value,
            self::Audios->value,
            self::Private->value,
            self::DataTable->value,
            self::Documentation->value,
            self::AccordionView->value,
            self::PrivateWithSearch->value,
            self::PublicForm->value,
        ];
    }
}
