<?php

namespace App\Http\Controllers;

use App\Models\LotOfTree;
use App\Models\TreeSpecie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class LotOfTreeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function getIndex()
    {
        $lot_of_trees = Auth::user()->lot_of_trees;
        return view('lot_of_tree.index', array('lot_of_trees' => $lot_of_trees));
    }

    public function getAll()
    {
        $lot_of_trees = LotOfTree::all();
        return view('lot_of_tree.index', array('lot_of_trees' => $lot_of_trees));
    }

    public function getShow($id)
    {
        $lot_of_tree = LotOfTree::findOrFail($id);
        return view('lot_of_tree.show', array('lot_of_tree' => $lot_of_tree));
    }

    public function getCreate($id)
    {
        $tree_specie = TreeSpecie::findOrFail($id);
        return view('lot_of_tree.create', array('tree_specie' => $tree_specie));
    }

    public function getEdit($id)
    {
        $lot_of_tree = LotOfTree::findOrFail($id);
        return view('lot_of_tree.edit', array('lot_of_tree' => $lot_of_tree));
    }

    public function postCreate(Request $request)
    {


        $lot_of_tree = new LotOfTree;
        $lot_of_tree->id_donor = Auth::id();
        $lot_of_tree->id_specie = $request['id_specie'];
        $lot_of_tree->quantity = $request['quantity'];
        $lot_of_tree->direction = $request['direction'];
        $lot_of_tree->status = 'PPOP';
        $lot_of_tree->save();
        return redirect()->route('lot_of_tree.getIndex');
    }

    public function putEdit(Request $request)
    {
        $uploaded_file = $request->file('proof_of_payment');
        if (isset($uploaded_file)) {
            $filename = $uploaded_file->hashName();
            Storage::disk('proof_of_payments')->put(
                $filename,
                file_get_contents($uploaded_file)
            );
        }

        $lot_of_tree = LotOfTree::findOrFail($request['id']);
        $lot_of_tree->status = isset($filename) ? 'PA' : $lot_of_tree->status;
        $lot_of_tree->proof_of_payment = isset($filename) ? $filename : $lot_of_tree->proof_of_payment;
        $lot_of_tree->save();
        return redirect()->route('lot_of_tree.getIndex');
    }

    public function putApprove(Request $request)
    {

        $lot_of_tree = LotOfTree::findOrFail($request['id']);
        $lot_of_tree->status = 'A';
        $lot_of_tree->save();
        $stock = $lot_of_tree->tree_specie->stock;
        $stock->quantity = $stock->quantity - $lot_of_tree->quantity;
        $stock->save();
        return redirect()->route('lot_of_tree.getAll');
    }

    public function putDeny(Request $request)
    {

        $lot_of_tree = LotOfTree::findOrFail($request['id']);
        $lot_of_tree->status = 'D';
        $lot_of_tree->save();
        return redirect()->route('lot_of_tree.getAll');
    }

    public function delete(Request $request)
    {
        $tree_specie = LotOfTree::findOrFail($request['id']);
        $tree_specie->delete();
        return redirect()->route('lot_of_tree.getIndex');
    }
}
