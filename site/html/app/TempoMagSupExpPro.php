<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TempoMagSupExpPro extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'tempo_mag_sup_exp_pro';

    /**
    * Relacionamentos
    */
    public function arquivos()
    {
        return $this->hasMany('App\ArquivoTempoMag');
    }
}
