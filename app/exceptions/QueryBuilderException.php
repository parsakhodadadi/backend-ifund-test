<?php

namespace App\Exception;

use Exception;

class QueryBuilderException
{
    public function handle($request, $model, $action = 'insert')
    {
        try {
            $model->$action($request);
        } catch (Exception $exception) {
            error_log($exception->getMessage().".\r\n", 3, 'storage/log/system.log');
            return $exception->getCode();
        }
    }
}

