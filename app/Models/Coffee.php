<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    public function cats()
    {
        return $this->belongsToMany(Cat::class)
            ->using(CatCoffee::class);
    }

    public  function type($id){
      return  $this->find($id)->get('type_name');
    }
}
