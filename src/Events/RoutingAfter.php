<?php

namespace ADMehdi\Events;

use Illuminate\Queue\SerializesModels;

class RoutingAfter
{
    use SerializesModels;

    public $router;

    public function __construct()
    {
        $this->router = app('router');

        // @deprecate
        //
        event('admehdi.routing.after', $this->router);
    }
}
