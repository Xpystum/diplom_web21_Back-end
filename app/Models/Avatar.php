<?php

namespace App\Models;

use App\Http\Resources\AvatarResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Avatar extends Model
{
    use HasFactory;

    protected $table = 'avatar';

    static public function returnAvatarUrl(int $userId) : AvatarResource
    {
        return (new AvatarResource(Avatar::findOrFail(User::findOrFail($userId)->avatar_id)));
    }
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'avatar_id');
    }


}
