
{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}
{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product -
@section('title', __('Edit manufacturer'))
{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
 {{-- Форма предъявляется методом HTTP PUT на веб ‑адрес: manufacturer/ID, где ID  — пер --}}
 {{
 Form::model($manufacturer, [
 'method' => 'PUT',
 'route' => [
 'manufacturers.update',
 $manufacturer->id,
 ]
 ])
 }}
 {{-- Включаем шаблон resources/views/manufacturers/partials/form.blade.php --}}
 @include('manufacturers.partials.form')
 {{-- Кнопка предъявления формы --}}
 {{
 Form::submit(
 __('Update manufacturer'),
 [
 'class' => 'btn btn-block btn-success',
 ]
 )
 }}
 {{ Form::close() }}
@endsection