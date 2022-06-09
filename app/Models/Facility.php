<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    // TO allow the usage of mass asssignable in this Model
    protected $fillable = ['name'];

    public function hotels(){
        return $this->belongsToMany(Hotel::class);
    }
}
