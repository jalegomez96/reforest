<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotOfTree extends Model
{
    use HasFactory;

    public function tree_specie()
    {
        return $this->belongsTo(TreeSpecie::class, 'id_specie', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_donor', 'id');
    }
}
