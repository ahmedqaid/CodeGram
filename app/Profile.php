<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ['title', 'description', 'url', 'image'];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/fGEsSGRyIxAYbVf2WyVocfzY5TkObNgcnN2T0mXn.jpeg';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
