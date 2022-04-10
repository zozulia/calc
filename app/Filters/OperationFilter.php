<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class OperationFilter extends AbstractFilter
{
    protected $filters = [
        'title' => TitleFilter::class,
        'notes' => NotesFilter::class,
        'dateFrom' => DateFromFilter::class,
        'dateTo' => DateToFilter::class,
        'valueFrom' => ValueFromFilter::class,
        'valueTo' => ValueToFilter::class,
        'account_id' => AccountFilter::class,
        'contragent_id' => ContragentFilter::class,
    ];
}

