<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $fillable = ["titre", "fichier", "matiere_id"];

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }

    public function setFichierAttribute($password){
        $this->attributes['fichier'] = request()->fichier->store('files');
    }
}
