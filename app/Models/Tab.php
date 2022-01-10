<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collection;

class Tab extends Model
{
    use HasFactory;
    protected $table = 'tabs';
    protected $fillable = ['name'];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function cards()
    {
        return $this->belongsToMany(Card::class, 'card_tabs', 'tab_id', 'card_id');
    }
}
