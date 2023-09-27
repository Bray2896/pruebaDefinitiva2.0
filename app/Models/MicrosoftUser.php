<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicrosoftUser extends Model
{
    use HasFactory;

    protected $table = 'microsoft_user';

    protected $fillable= ['tenant_id', 'client_id', 'client_secret', 'cliente_id'];
 
     public function cliente()
     {
         return $this->hasOne(Cliente::class);
     }
}
