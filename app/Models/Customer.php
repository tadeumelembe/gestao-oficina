<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'surname',
        'phoneNumber',
        'email',
        'status',
        'type',
        'nuit',
        'city',
        'country',
        'neighborhood',
        'bi'

    ];


    public function cars(){

        return $this->hasMany('App\Models\Car');

    }


}

