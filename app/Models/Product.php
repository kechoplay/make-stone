<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product';
    protected $guarded = [];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function bidding()
    {
        return $this->hasOne(Bidding::class, 'product_id', 'id')->where('status', Bidding::STATUS_BIDDING_START);
    }

    public function getSubImageAttribute($value)
    {
        return empty($value) ? [] : json_decode($value, true);
    }

    public function getPriceAttribute($value)
    {
        return ($value == null || $value == '') ? 0 : number_format($value);
    }
}
