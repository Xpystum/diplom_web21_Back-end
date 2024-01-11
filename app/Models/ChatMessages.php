<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessages extends Model
{
    use HasFactory;
    protected $table = "chatmessages";

    protected $fillable = [
        'user_id',
        'message',
    ];

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

}
