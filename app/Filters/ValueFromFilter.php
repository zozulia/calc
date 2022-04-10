<?php

namespace App\Filters;

class ValueFromFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('value', '>=', $value);
    }
}
