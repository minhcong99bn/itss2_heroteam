<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Collection;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = ['collection_id', 'one', 'two', 'three', 'four', 'default', 'custom'];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
