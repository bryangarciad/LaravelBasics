<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /*
    |SESION 13: SCOPE
    */

    public function scopeActive($query){
        return $query->where('active', 1)->get();
    }

    public function scopeInactive($query){
        return $query->where('active', 0)->get();
    }

    // You can use this protected property to allow mass assigned
    // protected $fillable = ['id', 'Name', 'email', 'active', 'company_id'];
    //Or you can use this to allow all mass assigned
    protected $guarded = [];

    /*
    |SESION 14: RelationShip
    */
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
