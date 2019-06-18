<?php

namespace App\Http\Controllers;

use App\Product;
use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Извлекаем из БД коллекцию товаров,
 // отсортированных по возрастанию значений атрибута title
 $products = Product::orderBy('title', 'ASC')->get();
 // Использовать шаблон resources/views/products/index.blade.php, где…
 return view('products.index')->withProducts($products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Форма добавления продукта в БД.
 // Создаём в ОЗУ новый экземпляр (объект) класса Product.
 $product = new Product();
$manufacturers = Manufacturer::orderBy('id')->pluck('title','id');
 // Использовать шаблон resources/views/products/create.blade.php, в котором…

 return view('products.create',[
    'manufacturers' => $manufacturers,
    'product'=> $product,
]);

    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // Добавление продукта в БД
    // Принимаем из формы значения полей с name, равными title, price.
    $attributes = $request->only(['title', 'price', 'manufacturer_id']);
    $attributes['user_id']=$request->user()->id;
    $product = Product::create($attributes);

 // Создаём всплывающее сообщение об успешном сохранении в БД:
 // первый аргумент  — произвольный ID сообщения, второй  — перевод
 // (см. resources/lang/ru/messages.php).
 $request->session()->flash(
 'message',
 __('Created', ['title' => $product->title])
 );
 
 // Перенаправляем клиент HTTP на маршрут с именем products.index
 // (см. routes/web.php).
 return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // Форма редактирования продукта в БД.
		// Использовать шаблон resources/views/products/edit.blade.php, в котором…
     
        $manufacturers = Manufacturer::orderBy('id')->pluck('title','id');
 // Использовать шаблон resources/views/products/create.blade.php, в котором…

 return view('products.edit',[
    'manufacturers' => $manufacturers,
    'product'=> $product,
]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Редактирование продукта в БД.
 // Принимаем из формы значения полей с name, равными title, price.
 $attributes = $request->only(['title', 'price']);
 // Обновляем кортеж в БД.
 $product->update($attributes);
 // Создаём всплывающее сообщение об успешном обновлении БД
 $request->session()->flash(
 'message',
 __('Updated', ['title' => $product->title])
 );
 // Перенаправляем клиент HTTP на маршрут с именем products.index
 // (см. routes/web.php).
 return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
       // Удаляем товар из БД.
 $product->delete();
 // Создаём всплывающее сообщение об успешном удалении из БД
 $request->session()->flash(
 'message',
 __('Removed', ['title' => $product->title])
 );
 // Перенаправляем клиент HTTP на маршрут с именем products.index
 // (см. routes/web.php).
 return redirect(route('products.index'));
    }
	
	 public function remove(Product $product)     
	 {         
	 // Использовать шаблон resources/views/products/remove.blade.php, где…
	// …переменная $producs  — это объект товара.
	return view('products.remove')->withProduct($product);
    $this->authorizeResource(Product::class); 
    
     }
     
     public function __construct()
    {
 $this->authorizeResource(Product::class);
    }

}
