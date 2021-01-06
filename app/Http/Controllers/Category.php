<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Models\Category as CategoryModel;

class Category extends Controller
{
    public function list()
    {
        $categories = CategoryModel::all();

        return view('app.category.list', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $exists = CategoryModel::withTrashed()->where('name', $request->input('name'))->get();

        if(count($exists))
        {
            CategoryModel::withTrashed()
            ->where('name', $request->input('name'))
            ->restore();
            return Redirect::route('app.category.list')->with('success', 'Cadastro restaurada');
        }

        $request->validate(
            [
                'name' => ['required', 'unique:categories']
            ],
            [
                'name.required' => 'É preciso informar um nome para a nova categoria',
                'name.unique' => 'Essa categoria já existe',
            ]
        );

        $category = new CategoryModel();
        $category->name = $request->input('name');
        $category->slug = Str::slug(
            $request->input('name')
        );

        if ($category->save())
        {
            return Redirect::route('app.category.list')->with('success', 'Cadastro efetuado');
        }
        else
        {
            return Redirect::route('app.category.list')->with('error', 'Falha ao cadastrar');
        }
    }

    public function update(Request $request)
    {
        $category = CategoryModel::findOrFail(
            $request->input('id')
        );

        $category->name = $request->input('name');
        $category->slug = Str::slug(
            $request->input('name')
        );

        $category->save();

        return Redirect::route('app.category.list');
    }

    public function delete(Request $request)
    {
        $category = CategoryModel::findOrFail(
            $request->id
        );

        $category->delete();

        return Redirect::route('app.category.list');
    }
}
