<?php

namespace App\Http\Controllers;

use App\Models\TreeSpecie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TreeSpeciesController extends Controller
{
    //
    public function getIndex()
    {
        $tree_species = TreeSpecie::all();
        return view('tree_specie.index', array('tree_species' => $tree_species));
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
        return view('tree_specie.edit', array('tree_specie' => $tree_specie));
    }

    public function postCreate(Request $request)
    {
        $uploaded_file = $request->file('image');
        $filename = $uploaded_file->hashName();

        Storage::disk('tree_species')->put(
            $filename,
            file_get_contents($uploaded_file)
        );

        $tree_specie = new TreeSpecie;
        $tree_specie->scientific_name = $request['scientific_name'];
        $tree_specie->common_name = $request['common_name'];
        $tree_specie->family = $request['family'];
        $tree_specie->description = $request['description'];
        $tree_specie->image = $filename;
        $tree_specie->save();
        return redirect()->route('tree_specie.getIndex');
    }

    public function putEdit(Request $request)
    {
        $uploaded_file = $request->file('image');
        if (isset($uploaded_file)) {
            $filename = $uploaded_file->hashName();

            Storage::disk('tree_species')->put(
                $filename,
                file_get_contents($uploaded_file)
            );
        }

        $tree_specie = TreeSpecie::findOrFail($request['id']);
        $tree_specie->scientific_name = $request['scientific_name'];
        $tree_specie->common_name = $request['common_name'];
        $tree_specie->family = $request['family'];
        $tree_specie->description = $request['description'];
        $tree_specie->image = isset($filename) ? $filename : $tree_specie->image;
        $tree_specie->save();
        return redirect()->route('tree_specie.getShow', ['id' => $request['id']]);
    }

    public function delete(Request $request)
    {
        $tree_specie = TreeSpecie::findOrFail($request['id']);
        $tree_specie->delete();
        return redirect()->route('tree_specie.getIndex');
    }
}
