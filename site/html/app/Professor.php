<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at','data_admissao'];
    protected $table = 'professores';
    protected $hidden = ['password'];

    /**
    * Relacionamentos
    */

    public function tempomag()
    {
        return $this->belongsTo('App\TempoMagSupExpPro','tempo_mag_sup_exp_pro_id');
    }

    public function tempoexp()
    {
        return $this->belongsTo('App\TempoExpProForaMag','tempo_exp_pro_fora_mag_id');
    }

    public function cursos()
    {
        return $this->belongsToMany('App\Curso','ministra_aula','professores_id','cursos_id')->withPivot(['id','tempo_meses','created_at']);
    }

    public function ja_ministrou()
    {
        return $this->belongsToMany('App\Curso','ja_ministrou','professores_id','cursos_id')->withPivot(['id','tempo_meses','created_at']);
    }

    public function user()
    {
        return $this->hasOne('App\User','users_id');
    }

    public function publicacao()
    {
        return $this->hasMany('App\Publicacoes','professores_id');
    }

    public function producao()
    {
        return $this->hasMany('App\Producoes','professores_id');
    }

    public function telefones()
    {
        return $this->hasMany('App\TelefoneProf','professores_id');
    }

    public function titulos()
    {
        return $this->hasMany('App\Titulos','professores_id')->orderBy('peso','desc');
    }

    public function coordenador()
    {
        return $this->hasMany('App\Curso','professores_id');
    }
}
