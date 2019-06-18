
{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}
{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
{{-- В секции title родительского шаблона будет выведен перевод фразы: Products --}}
@section('title', __('Manufacturers'))
{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
 <p>
 {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
 {{
 Html::secureLink(
 route('manufacturers.create'),
 __('Create manufacturer'))
 }}
 </p>
 <div class="table-responsive">
 <table class="table table-hover table-striped">
 <tr>
 <th>{{ __('Title') }}</th>
 <th>
 <span class="glyphicon glyphicon-pencil" aria-hidden="true">
 </span>
 </th>
 <th>
 <span class="glyphicon glyphicon-remove" aria-hidden="true">
 </span>
 </th>
 </tr>
 @foreach ($manufacturers as $manufacturer)
 <tr>
 <td>{{ $manufacturer->title }}</td>
 <td>{{ $manufacturer->price }}</td>
 <td>{{ Html::secureLink(
 route('manufacturers.edit', $manufacturer->id),
 __('Edit manufacturer')
 ) }}</td>
 <td>{{ Html::secureLink(
 route('manufacturers.remove', $manufacturer->id),
 __('Remove manufacturer')
 ) }}</td>
 </tr>
 @endforeach
 </table>
 </div>
@endsection