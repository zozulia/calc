<?php

namespace App\Filters;

class NotesFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('operations.notes', 'LIKE', '%' . $value . '%');
    }
}
