<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasetsreport extends Model
{
    use HasFactory;

    protected $table = 'datasets_reports';

    public function cliente () {

        return $this->belongsTo(Cliente::class);
    }

    public function categoria () {

        return $this->belongsTo(Categoria::class);
    }
}
