<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShortUrl extends Model
{
    /** @use HasFactory<\Database\Factories\ShortUrlFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['url', 'expired_at', 'visit_count', 'short_url', 'password', 'user_id'];

    public function users(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }
}
