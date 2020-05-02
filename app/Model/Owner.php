<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
