<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting_praktikum extends Model
{
    use HasFactory;

    protected $table = "voting_praktikum";
    protected $primaryKey = "id_voting_praktikum";
    protected $fillable = ['id_voting_praktikum', 'id_praktikum','id_kategori','ip', 'is_confirm', 'random_kode'];
}