<?php

namespace App\Helper;

use Carbon\Carbon;

class CategoryService
{

    public function prepareData($data)
    {
        $params['name'] = $data['category'];
        if (isset($data['id']) && !empty($data['id'])) {
            $params['updated_at'] = Carbon::now();
        } else {
            $params['created_at'] = Carbon::now();
        }
        return $params;

    }
}
