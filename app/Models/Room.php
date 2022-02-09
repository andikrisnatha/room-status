<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id',
        'room_number',
        'room_code',
        'room_name',
        'updated_by',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('room_number', 'like', "%{$search}%")
                ->orWhere('room_code', 'like', "%{$search}%")
                ->orWhere('room_name', 'like', "%{$search}%");
        }
    }
}
