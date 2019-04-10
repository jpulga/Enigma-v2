<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttorneyClient extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'dob'];

    public function attorney(){
        return $this->hasMany(Attorney::class);
    }

    public function scopefirst_name($query, $first_name)
    {   
        if (trim($first_name) != "") {
            $query->where('first_name', "LIKE", "%$first_name%");
        }
    }
}
