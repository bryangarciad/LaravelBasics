<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    //Setting mass assing availible
    protected $guarded = [];


    /*
    |SESION 14: RelationShip
    */
    public function customers(){
        return $this->hasMany(Customer::class);
    }


}
