<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','price','pic_url','availability','hotel_id'];

    public function room(){
        return $this->belongsTo(Hotel::class);
    }
}
