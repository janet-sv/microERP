<?php

namespace App\Http\Controllers\Logistic;

use Illuminate\Http\Request;
use App\Http\Requests\Logistic\ProductCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Logistic\ProductCategory\ProductCategory;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = ProductCategory::get();

        $data = [
            'title' => 'Categoría de Productos',
            'categories' => $categories,
        ];

        return view('logistic.pages.product-category.index', $data);
    }

    public function create()
    {
        return view('logistic.pages.product-category.create');
    }

    public function store(ProductCategoryRequest $request)
    {
        $message = null;
        try {
            $codeUpper = strtoupper($request['abrCode']);

            $productCategory = ProductCategory::
                                    where('code', $codeUpper)
                                    ->first();

            $message = 'El código ya existe';

            if ($productCategory) {
                return redirect()->route('logistic.product_category.create')->with('message', $message)->withInput();
            }

            $nameUpper = strtoupper($request['name']);

            $productCategory = ProductCategory::
                                    where('name', $nameUpper)
                                    ->first();

            $message = 'El nombre de la categoría ya existe';

            if ($productCategory) {
                return redirect()->route('logistic.product_category.create')->with('message', $message)->withInput();
            }

            $newProductCategory = new ProductCategory();
            $newProductCategory->code = $codeUpper;
            $newProductCategory->name = $nameUpper;
            $newProductCategory->description = $request['description'];
            $newProductCategory->save();

            $message = 'La categoría de producto se registró correctamente';

            return redirect()->route('logistic.product_category.index')->with('message', $message);

        } catch (Exception $e) {
            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.product_category.index')->with('message', $message);
        }
    }

    public function edit($id) {
        $productCategory = ProductCategory::find($id);

        if ($productCategory) {
            $data = [
                'category' => $productCategory,
            ];

            return view('logistic.pages.product-category.edit', $data);
        }

        return view('logistic.pages.product-category.index');
    }

    public function update($id, ProductCategoryRequest $request)
    {
        $message = null;
        try {

            $nameUpper = strtoupper($request['name']);

            $productCategory = ProductCategory::
                                    where('name', $nameUpper)
                                    ->where('id', '<>', $id)
                                    ->first();

            $message = 'El nombre de la categoría ya está asignado';

            if ($productCategory) {
                return redirect()->route('logistic.product_category.edit', $id)->with('message', $message)->withInput();
            }

            $productCategory = ProductCategory::find($id);

            if ($productCategory) {
                $productCategory->name = $nameUpper;
                $productCategory->description = $request['description'];
                $productCategory->save();

                $message = 'La categoría de producto se actualizó correctamente';

                return redirect()->route('logistic.product_category.index')->with('message', $message);
            }

            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.product_category.index')->with('message', $message);

        } catch (Exception $e) {
            $message = 'Ocurrió un error inesperado';
            return redirect()->route('logistic.product_category.index')->with('message', $message);
        }
    }
}
