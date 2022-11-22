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
            return $exception->getCode();
        }
    }
}

