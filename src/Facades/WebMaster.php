<?php

namespace Elcomwares\WebMaster\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Elcomwares\WebMaster\WebMaster
 */
class WebMaster extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Elcomwares\WebMaster\WebMaster::class;
    }
}
