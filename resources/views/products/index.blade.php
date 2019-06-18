
{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}
{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
{{-- В секции title родительского шаблона будет выведен перевод фразы: Products --}}
@section('title', __('Products'))
{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
 <p>
 {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
 @can('create', new \App\product)
 {{
 Html::secureLink(
 route('products.create'),
 __('Create product'))
 }}
@else
  Создание не выполнено
@endcan
 </p>
 <div class="table-responsive">
 <table class="table table-hover table-striped">
 <tr>
 <th>{{ __('Title') }}</th>
 <th>{{ __('Price') }}</th>
 <th>
 <span class="glyphicon glyphicon-pencil" aria-hidden="true">
 </span>
 </th>
 <th>
 <span class="glyphicon glyphicon-remove" aria-hidden="true">
 </span>
 </th>
 </tr>
 @foreach ($products as $product)
 <tr>
 <td>{{ $product->title }}</td>
 <td>{{ $product->price }}</td>
 <td>
@can('update', $product)
 {{ Html::secureLink(
 route('products.edit', $product->id),
 __('Edit product')
 ) }}
 @endcan
 </td>
 <td>{{ Html::secureLink(
 route('products.remove', $product->id),
 __('Remove product')
 ) }}</td>
 </tr>
 @endforeach
 </table>
 </div>
@endsection