<?php

namespace App\Models;

use Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "numtel",
        "cin",
        "password",
        "formation",
        "adresse",
        "specialite",
        "date_naissance",
        "role"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin(){
        return Auth::user()->role == "admin";
    }
    public function isFormateur(){
        return Auth::user()->role == "formateur";
    }
    public function isEleve(){
        return Auth::user()->role == "eleve";
    }

    public function setPasswordAttribute($password){
        if(request()->password != ""){
            $this->attributes['password'] = Hash::make($password);
        }
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
