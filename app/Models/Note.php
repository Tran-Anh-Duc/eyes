<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static findOrFail($id)
 * @method static where(string $string)
 */
class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        ];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
