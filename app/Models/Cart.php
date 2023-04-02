<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


use App\Models\Book;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;


    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class)->withPivot(['quantity']);
    }

    public function user(): HasOne{
        return $this->hasOne(User::class);
    }

}
