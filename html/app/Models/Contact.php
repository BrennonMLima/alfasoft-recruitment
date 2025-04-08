<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'contact', 'email','user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}