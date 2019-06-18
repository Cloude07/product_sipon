<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;
use App\Manufacturer;

public function testInsertingIntoDB()
{
    // Создаём в ОЗУ экземпляр класса Manufacturer (Производитель).
    $manufacturer = new Manufacturer();
    // Указываем название производителя.
    $manufacturer->title = 'ИП Борджиа Чезаре Родригович';
    // Записываем в БД информацию о производителе.
    $manufacturer->save();

    // Создаём в ОЗУ новый экземпляр класса Product (Товар).
    $product = new Product();
    // Указываем наименование товара.
    $product->title = 'Пицца «Маргарита»';
    // Указываем цену товара.
    $product->price = 250.99;
    // Указываем производителя.
    $product->manufacturer_id = $manufacturer->id;
    // Записываем в БД информацию о товаре.
    $product->save();

    // Утверждаем, что в БД должна была появиться запись о товаре.
    // $product->getTable() возвращает имя таблицы БД ⁠— по умолчанию products.
    // $product->toArray() возвращает массив атрибутов и их значений.
    $this->assertDatabaseHas($product->getTable(), $product->toArray());
}
}
