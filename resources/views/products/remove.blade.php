
{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}
{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Remove product'))
{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
 {{-- Форма предъявляется методом HTTP DELETE на веб ‑адрес: products/ID, где ID  — --}}
 {{
 Form::model($product, [
 'method' => 'DELETE',
 'route' => [
 'products.destroy',
 $product->id,
 ]
 ])
 }}
 {{-- Выводим наименование товара --}}
 {{ $product->title }}
 {{-- Кнопка предъявления формы --}}
 {{
 Form::submit(
 __('Remove product'),
 [
 'class' => 'btn btn-block btn-success',
 ]
 )
 }}
 {{ Form::close() }}
@endsection