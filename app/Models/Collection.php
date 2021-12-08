<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Card;
use App\Models\Schedule;

class Collection extends Model
{
    use HasFactory;
    protected $table = 'collections';
    protected $fillable = ['name', 'user_id', 'active', 'level'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function schedules()
    {
        return $this->hasOne(Schedule::class);
    }
}
