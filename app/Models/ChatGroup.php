<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'user_minor_id',
    ];

    // protected $guarded = [];
    
    protected $table = 'chat_group';
    public $timestamps = false;
}
