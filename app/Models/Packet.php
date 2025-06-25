<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $bandwidth
 * @property int $price
 * @property string|null $desc
 * @property string $rasio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $order
 * @property-read int|null $order_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet whereBandwidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet whereRasio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Packet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Packet extends Model
{
    protected $guarded = [];

    public function order():HasMany
    {
        return $this->hasMany(Order::class);
    }
}
