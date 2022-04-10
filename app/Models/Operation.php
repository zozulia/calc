<?php

namespace App\Models;

use App\Filters\OperationFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};

class Operation extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'notes', 'account_id', 'contragent_id', 'value', 'date'
    ];

    public function scopeFilter(Builder $builder, $request)
    {
        return (new OperationFilter($request))->filter($builder);
    }

    public function account()
    {
        return $this->hasMany('App\Account', 'account_id', 'id');
    }
}
