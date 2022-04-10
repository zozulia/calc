<?php

namespace App\Filters;

class ValueToFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('value', '<=', $value);
    }
}
