<?php

namespace ADMehdi\Events;

use Illuminate\Queue\SerializesModels;
use ADMehdi\Database\Schema\Table;

class TableAdded
{
    use SerializesModels;

    public $table;

    public function __construct(Table $table)
    {
        $this->table = $table;

        event(new TableChanged($table->name, 'Added'));
    }
}
