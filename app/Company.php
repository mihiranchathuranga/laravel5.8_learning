<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //mass assignment turn off
    protected $guarded = [];
    //company can have many customers
    public function customers()
    {
    	return $this->hasMany(Customer::class);
    }
}
