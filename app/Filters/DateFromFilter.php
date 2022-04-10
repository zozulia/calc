<?php

namespace App\Filters;

class DateFromFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('date', '>=', $value);
    }
}
