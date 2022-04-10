<?php

namespace App\Filters;

class AccountFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('account_id', '=', $value);
    }
}
