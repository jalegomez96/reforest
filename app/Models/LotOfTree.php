<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotOfTree extends Model
{
    use HasFactory;

    public function tree_specie()
    {
        return $this->hasOne(TreeSpecie::class, 'id', 'id_specie');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_donor');
    }
}
