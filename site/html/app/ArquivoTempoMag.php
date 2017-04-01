<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivoTempoMag extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $table = 'arquivos_tempo_mag';

    /**
    * Relationships
    */
    public function tempo()
    {
        return $this->belongsTo('App\TempoMagSupExpPro','tempo_mag_sup_exp_pro_id');
    }
}
