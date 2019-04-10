<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attorney extends Model
{
    protected $fillable = ['attorney_number', 'first_name', 'middle_name', 'last_name', 'dob'];

    public function products(){
        return $this->hasMany(AttorneyClient::class);
    }

    public function scopefirst_name($query, $first_name)
    {   
        if (trim($first_name) != "") {
            $query->where('first_name', "LIKE", "%$first_name%");
        }
    }
}


