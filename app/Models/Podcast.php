<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $table = "podcast";
    protected $primaryKey = "id_podcast";
    protected $fillable = ['id_podcast','judul' ,'sound_path'];
}
