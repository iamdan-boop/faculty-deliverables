<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'folder',
        'file_url'
    ];

    public function packages()
    {
        return $this->belongsTo(Package::class);
    }
}
