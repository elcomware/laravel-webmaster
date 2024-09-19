<?php

namespace Elcomwares\WebMaster\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WebMasterModel extends model
{
    /**
     * @var int|mixed|string|null
     */
    public mixed $created_by;

    /**
     * @var int|mixed|string|null
     */
    public mixed $last_edited_by;

    /**
     * @var int|mixed
     */
    public mixed $version;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (WebMasterModel $model) {
            if (Auth::check()) {
                $model->created_by = Auth::id();
                $model->last_edited_by = Auth::id();
            }
            $model->version = 1;
        });

        static::updating(function ($model) {
            if (Auth::check()) {
                $model->last_edited_by = Auth::id();
            }
            $model->version++;
        });
    }
}
