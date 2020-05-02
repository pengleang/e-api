<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'detail', 'sponsor', 'price', 'duration', 'start','finish'
    ];
    public function owners(){
        return $this->hasMany(Owner::class);
    }
}
