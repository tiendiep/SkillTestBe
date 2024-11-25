<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user'; 
    protected $fillable = [ 'name', 'gender', 'date'];

  
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}






