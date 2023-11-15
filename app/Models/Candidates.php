<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    use HasFactory;
    protected $table = 'candidates_apply';
    // protected $guarded = [];
    public $timestamps = false;
    protected $fillable = ['status','comment'];
}
