
{{-- Это шаблон формы удаления товара из БД, свёрстанный для Bootstrap --}}
{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')
{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('title', __('Remove manufacturer'))
{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
 {{-- Форма предъявляется методом HTTP DELETE на веб ‑адрес: manufacturers/ID, где ID  — --}}
 {{
 Form::model($manufacturer, [
 'method' => 'DELETE',
 'route' => [
 'manufacturers.destroy',
 $manufacturer->id,
 ]
 ])
 }}
 {{-- Выводим наименование товара --}}
 {{ $manufacturer->title }}
 {{-- Кнопка предъявления формы --}}
 {{
 Form::submit(
 __('Remove manufacturer'),
 [
 'class' => 'btn btn-block btn-success',
 ]
 )
 }}
 {{ Form::close() }}
@endsection