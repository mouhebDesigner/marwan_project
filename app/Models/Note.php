<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ["valeur","matiere_id","user_id", "semester"];

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
