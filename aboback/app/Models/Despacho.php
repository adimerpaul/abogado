<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    use HasFactory;
    protected $fillable=[
        "fecha",
        "hora",
        "tipo",
        "juzgado",
        "juez",
        "webid",
        "nurej",
        "proceso",
        "demandante",
        "ci",
        "representante",
        "proforma_id",
        'tramite_id',
        'cliente_id',
    ];
    public function requisitos(){
        return $this->belongsToMany(Requisito::class);
    }

    public function agendas(){
        return $this->hasMany(Agenda::class)->with('user');
    }

    public function demandados(){
        return $this->belongsToMany(Demandado::class);
    }

    public function tramite(){
        return $this->belongsTo(Tramite::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function proforma(){
        return $this->belongsTo(Proforma::class)->with('tramite')->with('detalleproformas');
    }
}
