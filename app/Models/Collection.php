<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Card;

class Collection extends Model
{
    use HasFactory;
    protected $table = 'collections';
    protected $fillable = ['name', 'user_id', 'active'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
