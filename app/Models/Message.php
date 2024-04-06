<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message'
    ];

    public $with = [
      'sender:id,name',
      'receiver:id,name'
    ];

    protected $hidden = [
        'sender_id',
        'receiver_id',
        'updated_at'
    ];


    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class,'sender_id','id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class,'receiver_id','id');
    }

}
