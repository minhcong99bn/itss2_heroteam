<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collection;

class Card extends Model
{
    use HasFactory;
    protected $table = 'cards';
    protected $fillable = ['front', 'back', 'collection_id', 'level', 'default'];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
