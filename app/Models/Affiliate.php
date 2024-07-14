<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affiliate extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'affiliate_link';
    protected $primaryKey = 'id';
    protected $fillable = ['admin_id','type','link'];
    protected $dates = ['deleted_at'];
    public $timestamp = true;
}
