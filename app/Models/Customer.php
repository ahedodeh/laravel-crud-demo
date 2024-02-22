<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","email","city","state","address","postal_code","type",

    ];

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
