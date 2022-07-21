<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;

    protected $table = "foto";
    protected $primaryKey = "id_foto";
    protected $fillable = ['id_foto','judul' ,'image_path'];
}
