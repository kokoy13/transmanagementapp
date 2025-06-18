<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function payment():HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function packet():BelongsTo
    {
        return $this->belongsTo(Packet::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    protected $guarded = [];
}
