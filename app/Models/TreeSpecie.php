<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeSpecie extends Model
{
    use HasFactory;
    protected $fillable = [
        'scientific_name',
        'common_name',
        'family',
        'description',
        'price',
        'image',
    ];

    public function lot_of_trees()
    {
        return $this->hasMany(LotOfTree::class, 'id_specie');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class, 'id_specie');
    }
}
