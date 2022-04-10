<?php

namespace App\Filters;

class DateToFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('date', '<=', $value);
    }
}
