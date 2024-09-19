<?php

namespace Workbench\App\Models;

use Elcomwares\WebMaster\Models\WebMasterModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestModel extends WebMasterModel
{
    use HasFactory;

    protected $fillable = ['name'];
}
