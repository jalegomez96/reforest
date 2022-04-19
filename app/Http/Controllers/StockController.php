<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\TreeSpecie;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getIndex()
    {
        $tree_species = TreeSpecie::all();
        return view('stock.index', array('tree_species' => $tree_species));
    }

    public function getShow($id)
    {
        $tree_specie = TreeSpecie::findOrFail($id);
        return view('tree_specie.show', array('tree_specie' => $tree_specie));
    }

    public function getCreate()
    {
        return view('tree_specie.create');
    }

    public function getEdit($id)
    {
        $tree_specie = TreeSpecie::findOrFail($id);
        return view('stock.edit', array('tree_specie' => $tree_specie));
    }

    public function putEdit(Request $request)
    {
        $stock = Stock::findOrFail($request['id']);
        $stock->quantity = $request['quantity'];
        $stock->save();
        return redirect()->route('stock.getIndex');
    }
}
