<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjaxModel extends Model
{
    protected $fillable = ['name','email','file'];
    use HasFactory;
}
