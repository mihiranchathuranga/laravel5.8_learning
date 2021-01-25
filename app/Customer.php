<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
	//protected $fillable = ['name','email','active']; //we can mass assign value using this way
    //laravel has a new concept called scope

    protected $guarded = [];
    //if we want to mass assign all values then we have to pass empty array for $guarded

    public function scopeActive($query){
    	return $query->where('active',1);
    }
    
    public function scopeInactive($query){
        return $query->where('active',0);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
