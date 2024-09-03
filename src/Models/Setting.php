<?php

namespace ADMehdi\Models;

use Illuminate\Database\Eloquent\Model;
use ADMehdi\Events\SettingUpdated;

class Setting extends Model
{
    protected $table = 'settings';

    protected $guarded = [];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'updating' => SettingUpdated::class,
    ];
}
