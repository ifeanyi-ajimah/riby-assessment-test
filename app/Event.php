<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $appends = ['when_created'];


    public function repo()
    {
        return $this->belongsTo('App\Repo');
    }
    

    public function getWhenCreatedAttribute()
    {
        date_format($date,"Y-m-d H:i:s");
        $dt = $this->created_at;
        $newDate = date_format($dt,"Y-m-d H:i:s");
        return $newDate;
    }


}
