<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{


    public function event()
    {
        return $this->hasOne('App\Event');
    }

}
