<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pokemon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apiId',
        'image',
        'hp',
        'speed',
        'atk',
        'def',
        'special_atk',
        'special_def',
    ];

    protected $attributes = [
        'hp' => 0,
        'speed' => 0,
        'atk' => 0,
        'def' => 0,
        'special_atk' => 0,
        'special_def' => 0,
        'image' => ""
    ];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
