<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DnDClass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'taken'];

    /**
     * Get the users that belong to this DnD class.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'dn_d_class_id');
    }
}