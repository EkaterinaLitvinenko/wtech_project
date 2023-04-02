<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Book;


class Order extends Model
{
    use HasFactory;

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
