<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'dna', 'name', 'description', 'image', 'edition', 'date', '	compiler'
    ];

    public function attributes(){
        return $this->hasMany(Attribute::class, 'name',  'name');
    }
}
