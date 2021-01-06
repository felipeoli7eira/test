<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product  as ProductModel;
use Illuminate\Support\Facades\Redirect;

class Product extends Controller
{
    public function list()
    {
        $products = ProductModel::all();
        $categories = Category::all();
        return view('app.product.list', ['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('app.product.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $product = new ProductModel();

        $product->category_id = $request->input('category_id');
        $product->title       = $request->input('title');
        $product->description = $request->input('description');
        $product->price       = $request->input('price');
        $product->stock       = $request->input('stock');

        $currentDate = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
        $currentDateString = $currentDate->format('H\hi\ms\s'); # output example: 12h30min20s
        $preparedFileName = "upload_" . date('d_m_Y') . '_' . $currentDateString . '.' . $request->file('photo')->getClientOriginalExtension(); # output example: upload_12h30m20s.png

        $upload = null;

        if ( $path = $request->file('photo')->storeAs( 'storage', $preparedFileName ) )
        {
            $upload = $path;
        }
        else
        {
            $upload = 'undefined';
        }

        $product->photo = $upload;

        if ($product->save())
        {
            return Redirect::route('app.product.list')->with('success', 'Produto cadastrado');
        }
        else
        {
            return Redirect::route('app.product.list')->with('error', 'Falha ao cadastrar produto');
        }
    }

    public function update(Request $request)
    {
        $product = ProductModel::findOrFail($request->input('product_id'));

        $product->category_id = $request->input('category_id');
        $product->title       = $request->input('title');
        $product->description = $request->input('description');
        $product->price       = $request->input('price');
        $product->stock       = $request->input('stock');

        $currentDate = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
        $currentDateString = $currentDate->format('H\hi\ms\s'); # output example: 12h30min20s
        $preparedFileName = "upload_" . date('d_m_Y') . '_' . $currentDateString . '.' . $request->file('photo')->getClientOriginalExtension(); # output example: upload_12h30m20s.png

        $upload = null;

        if ( $path = $request->file('photo')->storeAs( 'storage', $preparedFileName ) )
        {
            $upload = $path;
        }
        else
        {
            $upload = 'undefined';
        }

        $product->photo = $upload;

        if ($product->save())
        {
            return Redirect::route('app.product.list')->with('success', 'Produto atualizado');
        }
        else
        {
            return Redirect::route('app.product.list')->with('error', 'Falha ao atualizar produto');
        }
    }

    public function delete(Request $request)
    {
        $product = ProductModel::findOrFail(
            $request->id
        );

        $product->delete();

        return Redirect::route('app.product.list');
    }
}
