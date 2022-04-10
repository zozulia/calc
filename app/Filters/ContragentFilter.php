<?php

namespace App\Filters;

class ContragentFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('contragent_id', '=', $value);
    }
}
