<?php

namespace App\Http\Controllers;

use App\Models\TreeSpecie;
use Illuminate\Http\Request;

class ApiTreeSpecieController extends Controller
{
    //
    public function getAll()
    {
        try {
            return response()->json(TreeSpecie::get());
        } catch (Exception $e) {
            return response()->json(
                array('ok' => false, 'sms' => 'error al obtener las especies')
            );
        }
    }

    public function getById($id)
    {
        try {
            $tree_specie = TreeSpecie::where('id', '=', $id)->get();
            return response()->json($tree_specie);
        } catch (Exception $e) {
            return response()->json(
                array('ok' => false, 'sms' => 'error al obtener la especie')
            );
        }
    }
}
