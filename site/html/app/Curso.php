<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'cursos';
    protected $fillable = ['curso'];

    public function professores()
    {
        return $this->belongsToMany('App\Professor','ministra_aula','cursos_id','professores_id')->withPivot(['id','tempo_meses','created_at']);
    }

    public function coordenador()
    {
        return $this->belongsTo('App\Professor','professores_id');
    }
    
    public function ja_ministrou()
    {
        return $this->belongsToMany('App\Professor','ja_ministrou','cursos_id','professores_id')->withPivot(['id','tempo_meses','created_at']);
    }

    public function publicacao_curso()
    {
        return $this->belongsToMany('App\Publicacoes','publicacao_curso','cursos_id','publicacao_id')->withPivot(['id','created_at']);
    }

    public function producao_curso()
    {
        return $this->belongsToMany('App\Producoes','producao_curso','cursos_id','producao_id')->withPivot(['id','created_at']);
    }
}
