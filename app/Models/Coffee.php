<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $table = 'coffees';

    public function cats()
    {
        return $this->belongsToMany(Cat::class);

    }

    public function scopeGetNameId($query,$name)
    {
        return $query->whereName($name)
            ->pluck('id')
            ->toArray();
    }
    public function scopeGetTypeId($query,$type)
    {
        return $query->whereTypeName($type)
            ->pluck('id')
            ->toArray();
    }

    public function scopeGetNameTypeId($query,$type,$name)
    {
        return $query->whereTypeName($type)
            ->whereName($name)
            ->pluck('id')
            ->toArray();
    }
}
