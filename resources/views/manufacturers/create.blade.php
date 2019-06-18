

@extends('base')

@section('title', __('Create manufacturer'))

@section('main')

 {{
 Form::model($manufacturer, [
 'method' => 'POST',
 'route' => 'manufacturers.store'
 ])
 }}
 
 @include('manufacturers.partials.form')

 {{
 Form::submit(
 __('Save manufacturer'),
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
