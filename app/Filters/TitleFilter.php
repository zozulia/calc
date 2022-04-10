<?php

namespace App\Filters;

class TitleFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('operations.title', 'LIKE', '%' . $value . '%');
    }
}
