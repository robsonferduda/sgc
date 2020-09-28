<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificado extends Model
{
    use SoftDeletes;
    
    protected $table = 'certificado_cer';
    protected $primaryKey = 'cd_certificado_cer';
    protected $keyType = 'integer';
    protected $fillable = ['cd_evento_eve', 'id_tipo_participacao_tip', 'total_horas_cer', 'ds_conteudo_cer','fl_complemento_cer', 'complemento_cer'];

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'cd_evento_eve', 'cd_evento_eve');
    }
}