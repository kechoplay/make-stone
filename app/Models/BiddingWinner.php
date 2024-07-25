<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiddingWinner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bidding_winner';
    protected $guarded = [];
    public $timestamps = true;
}
