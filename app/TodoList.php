<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $guarded = [];
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }
    public function getCreatedAtAttribute($value)
    {
        $carbonDate = new Carbon($value);
        return $carbonDate->diffForHumans();
    }
}
