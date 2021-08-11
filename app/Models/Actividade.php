<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actividade extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'dataInicio',
        'dataFim',
        'area',
        'preco',
        'status',
        'jobCard_id',
        'antesPhoto',
        'depoisPhoto'
    ];

    public function consumiveis(){

        return $this->hasMany('App\Models\Consumivel');
    }

    public function jobCard(){

        return $this->belongsTo('App\Models\JobCard','jobCard_id');
    }


    public function funcionarios()
    {
        return $this->belongsToMany('App\Models\Funcionario','actividade_funcionario' );
    }

}

