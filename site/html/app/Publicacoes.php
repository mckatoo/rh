<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicacoes extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'publicacao';

    public function tipo()
    {
        return $this->belongsTo('App\TipoPub','tipo_Pub_id');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor','professores_id');
    }

    public function arquivos()
    {
        return $this->hasMany('App\ArquivosPublicacao');
    }

    public function publicacao_curso()
    {
        return $this->belongsToMany('App\Curso','publicacao_curso','publicacao_id','cursos_id')->withPivot(['id','created_at']);
    }
}
