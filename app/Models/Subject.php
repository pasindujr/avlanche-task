<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'marks', 'subject_id', 'user_id')
            ->withPivot(['mark']);
    }
}
