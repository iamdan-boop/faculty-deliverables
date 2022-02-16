<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $fillable = [
        'itemName',
        'quantity'
    ];


    public function package() {
        return $this->belongsTo(Package::class);
    }

}