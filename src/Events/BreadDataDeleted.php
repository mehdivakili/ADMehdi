<?php

namespace ADMehdi\Events;

use Illuminate\Queue\SerializesModels;
use ADMehdi\Models\DataType;

class BreadDataDeleted
{
    use SerializesModels;

    public $dataType;

    public $data;

    public function __construct(DataType $dataType, $data)
    {
        $this->dataType = $dataType;

        $this->data = $data;

        event(new BreadDataChanged($dataType, $data, 'Deleted'));
    }
}
