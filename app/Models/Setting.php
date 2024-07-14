<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'setting';
    protected $primaryKey = 'id';
    protected $fillable = ['admin_id','type','url','enable'];
    protected $dates = ['deleted_at'];
    public $timestamp = true;
}
