<?php

namespace ADMehdi\Events;

use Illuminate\Queue\SerializesModels;
use ADMehdi\Models\Setting;

class SettingUpdated
{
    use SerializesModels;

    public $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
}
