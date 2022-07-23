<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting_podcast extends Model
{
    use HasFactory;

    protected $table = "voting_podcast";
    protected $primaryKey = "id_voting_podcast";
    protected $fillable = ['id_voting_podcast', 'id_podcast','ip'];
}
