<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use function ucwords;

class Contact extends Model
{
    protected $guarded =[ ];

    public function getNameAttribute($value)
    {
       return ucwords($value);
    }
    public function getSubjectAttribute($value)
    {
        return ucwords($value);
    }
    public function getCreatedAtAttribute($value)
    {
        $carbonDate = new Carbon($value);
        return $carbonDate->diffForHumans();
    }
}
