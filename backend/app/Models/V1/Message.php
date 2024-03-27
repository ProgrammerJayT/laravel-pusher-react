<?php

namespace App\Models\V1;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $primaryKey = "message_id";

    protected $fillable = [
        'sender_id',
        'recipient_id',
        'message',
        'read',
        'sent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id', 'user_id');
    }
}
