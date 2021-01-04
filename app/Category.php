<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function ucwords;

class Category extends Model
{
    protected $fillable = ['name','slug','status'];

    public function setNameAttribute($value){
        return $this->attributes['name'] = ucwords($value);
    }
}
