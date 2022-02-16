<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'courier',
        'destination',
        'delivery_date',
        'position',
        'user_id',
        'receiver_id',
        'status',
    ];


    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function packageSender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function receiver()
    {
        return $this->hasMany(User::class, 'id', 'receiver_id');
    }

    public function proofOfSender()
    {
        return $this->belongsToMany(Proof::class)->wherePivotIn('type', [0]);
    }

    public function proofOfReceiver()
    {
        return $this->belongsToMany(Proof::class)->wherePivotIn('type', [1]);
    }
}
