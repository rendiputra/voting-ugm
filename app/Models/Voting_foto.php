<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting_foto extends Model
{
    use HasFactory;

    protected $table = "voting_foto";
    protected $primaryKey = "id_voting_foto";
    protected $fillable = ['id_voting_foto', 'id_foto','ip'];
}
