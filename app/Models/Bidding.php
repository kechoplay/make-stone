<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidding extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bidding';
    protected $guarded = [];
    public $timestamps = true;

    CONST STATUS_BIDDING_START = 1;
    CONST STATUS_BIDDING_CLOSE = 2;
}
