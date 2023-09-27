<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkGroup extends Model
{
    use HasFactory;

    protected $table = 'work_group';

    public function cliente()
     {
         return $this->hasOne(Cliente::class);
     }
}
