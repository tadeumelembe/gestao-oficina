<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobCard extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jobcards';

    protected $fillable = [
        'cotacao',
        'fatura',
        'status',
        'funcionario_id',
        'car_id',
        'kilometragem',
        'notas',
        'referencia',
        'dataInicio',
        'dataFim',
        'valor'
    ];

    public function car(){

        return $this->belongsTo('App\Models\Car','car_id');
    }

    public function funcionario(){

        return $this->belongsTo('App\Models\Funcionario','funcionario_id');
    }

    public function actividades(){

        return $this->hasMany('App\Models\Actividade','jobCard_id');
    }

}

