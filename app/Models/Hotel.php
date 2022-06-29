<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    // To allow mass asignable, for example using create method
    protected $fillable = ['name','email','address','phone','pic_url','description','policy'];

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function facilities(){
        return $this->belongsToMany(Facility::class,'facilities_hotels');
    }
}
