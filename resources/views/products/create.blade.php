

@extends('base')

@section('title', __('Create product'))

@section('main')

 {{
 Form::model($product, [
 'method' => 'POST',
 'route' => 'products.store'
 ])
 }}


 @include('products.partials.form')

 {{
 Form::submit(
 __('Save product'),
 [
 'class' => 'btn btn-block btn-success',
 ]
 )
 }}
 {{ Form::close() }}

 @if ($errors->any())     
 <div class="alert alert-danger">         
 <ul>             
    @foreach ($errors->all() as $error)                 
        <li>{{ $error }}</li>             
    @endforeach         
 </ul>     
 </div> 
 @endif


@endsection
