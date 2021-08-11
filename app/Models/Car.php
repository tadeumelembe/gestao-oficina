<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'modelo',
        'marca',
        'anoFabrico',
        'matricula',
        'tipo',
        'status',
        'combustivel',
        'customer_id',
        'photo',
        'proprietario_nome',
        'proprietario_telefone',
        'proprietario_bi',
        'proprietario_email',
        'proprietario_sexo'

    ];

    public function customer(){

        return $this->belongsTo('App\Models\Customer','customer_id');

    }

    public function jobs(){

        return $this->hasMany('App\Models\JobCard');

    }

}

