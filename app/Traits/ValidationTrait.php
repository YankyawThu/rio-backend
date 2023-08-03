<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ValidationTrait {

    public function verify($input, $config)
    {
        $arr = config('validation.'.$config);

        $rules = $name = $message = [];

        foreach ($arr as $key => $val)
        {
            $rules[$key] = $val['rules'];
            $name[$key] = $val['name'];
            if (isset($val['messages']) && is_array($val['messages']) && !empty($val['messages']))
            {
                foreach($val['messages'] as $k => $v)
                {
                    $message[$key.'.'.$k] = $v;
                }
            }
        }

        $validator = Validator::make(
            $input->all(),
            $rules,
            $message,
            $name
        );

        return $validator;

    }
}