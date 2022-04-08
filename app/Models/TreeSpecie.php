<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeSpecie extends Model
{
    use HasFactory;
    public function lot_of_trees()
    {
        return $this->hasMany(LotOfTree::class, 'id_specie');
    }
}
