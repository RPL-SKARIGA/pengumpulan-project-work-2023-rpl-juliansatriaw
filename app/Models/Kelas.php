<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($kelas) {
            $kelas->users()->delete();
        });

        static::deleting(function ($kelas) {
            $kelas->tugas()->delete();
        }); 
    }
    public function scopeGetKelasByUserId($query, $userId)
    {
        return $query->where('user_id', $userId)
                     ->orWhereHas('users', function ($query) use ($userId) {
                         $query->where('users.id', $userId);
                     });
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'kelas_user', 'kelas_id', 'user_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
