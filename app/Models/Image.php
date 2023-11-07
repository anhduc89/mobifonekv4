<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';
    // protected $guarded = [];
    protected $fillable = ['name','file_name','path','type','status'];
}
