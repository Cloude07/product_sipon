
{{-- Этот шаблон с полями формы, свёрстанный для Bootstrap --}}
<div class="form-group">
 {{-- Метка к полю ввода наименования товара --}}
 {{-- На метке будет выведен перевод слова Title --}}
 {{ Form::label('title', __('Title')) }}
 {{-- Поле ввода наименования товара --}}
 {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
 {{-- Метка к полю ввода цены товара --}}
 {{-- На метке будет выведен перевод слова Price --}}
 {{ Form::label('price', __('Price')) }}
 {{-- Поле ввода цены товара --}}
 {{ Form::number('price', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('Производитель') }}
{{ Form::select('manufacturer_id', $manufacturers)}}
</div>