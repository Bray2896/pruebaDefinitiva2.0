<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function microsoftUser(){
        return $this->hasOne(MicrosoftUser::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function datasets_reports(){
        return $this->hasMany(Datasetsreport::class);
    }

    public function workgroup(){
        return $this->hasOne(WorkGroup::class);
    }
}
