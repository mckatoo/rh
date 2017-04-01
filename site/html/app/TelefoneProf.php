<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TelefoneProf extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $table = 'telefones_prof';

    /**
    * Relacionamento
    */
    public function professor()
    {
        return $this->belongsTo('App\Professor','professores_id');
    }
}
