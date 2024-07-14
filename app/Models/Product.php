<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['admin_id','name','price','description','category_id','quantity','main_image','sub_image','bidding_id'];
    protected $dates = ['deleted_at'];
    public $timestamp = true;
}
