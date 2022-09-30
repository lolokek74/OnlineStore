<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Product\ProductCreateValidation;
use App\Http\Requests\Admin\Product\ProductUpdateValidation;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $breadcrumbs = [
            ['routeName' => 'welcome', 'name' => 'Главная странциа'],
            ['name' => 'Создание нового товара']
        ];
        return view('admin.product.createOrUpdate', compact('breadcrumbs'));
    }

    /**
     * @param ProductCreateValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCreateValidation $request)
    {
        $validate = $request->validated();
        unset($validate['photo_file']);
        # public/name.jpg
        $photo = $request->file('photo_file')->store('public');
        # Explode => / => public/name.jpg => ['public', 'name.jpg']
        $validate['photo'] = explode('/', $photo)[1];

        Product::create($validate);
        return back()->with(['success' => true]);
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        $breadcrumbs = [
            ['routeName' => 'welcome', 'name' => 'Главная странциа'],
            ['routeName' => 'admin.product.index', 'name' => 'Все продукты'],
            ['name' => $product->name],
        ];
        return view('admin.product.show', compact('product', 'breadcrumbs'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Product $product)
    {
        $breadcrumbs = [
            ['routeName' => 'welcome', 'name' => 'Главная странциа'],
            ['routeName' => 'admin.product.index', 'name' => 'Все продукты'],
            ['routeName' => 'admin.product.show', 'params' => ['product' => $product->id], 'name' => $product->name],
            ['name' => $product->name . ' | Редактирование'],
        ];
        $request->session()->flashInput($product->toArray());
        return view('admin.product.createOrUpdate', compact('product','breadcrumbs'));
    }

    /**
     * @param ProductUpdateValidation $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateValidation $request, Product $product)
    {
        $validate = $request->validated();
        unset($validate['photo_file']);
        if ($request->hasFile('photo_file')){
            # public/name.jpg
            $photo = $request->file('photo_file')->store('public');
            # Explode => / => public/name.jpg => ['public', 'name.jpg']
            $validate['photo'] = explode('/', $photo)[1];
        }
        $product->update($validate);
        return back()->with(['success' => true]);
    }

    /**
     * @param Product $product
     * @return void
     */
    public function destroy(Product $product)
    {
        //
    }
}
