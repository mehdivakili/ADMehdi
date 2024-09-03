<?php

namespace ADMehdi\FormFields\After;
abstract class AbstractHandler implements HandlerInterface
{
    public function visible($row, $dataType, $dataTypeContent, $options)
    {
        return true;
    }

    public function handle($row, $dataType, $dataTypeContent)
    {
        $content = $this->createContent(
            $row,
            $dataType,
            $dataTypeContent,
            $row->details
        );

        return $this->render($content);
    }

    public function getCodename()
    {
        return $this->codename;
    }
}
