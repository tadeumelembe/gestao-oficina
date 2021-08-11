<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'surname',
        'phoneNumber',
        'email',
        'status'
    ];

    // public function jobCards(){

    //     return $this->hasMany('App\Models\JobCard',);

    // }

    public function actividades()
    {
        return $this->belongsToMany('App\Models\Actividade','actividade_funcionario' );
    }

}

