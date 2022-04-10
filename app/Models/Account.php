<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'mult', 'title', 'notes'
    ];

    public function owner() {
        return $this->belongsTo('App\Operation', 'account_id', 'id');
    }
}
