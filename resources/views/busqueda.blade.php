@extends('layout')

@section('content')
	@include('partials.header')
	@include('partials.form-buscar')
	@include('partials.services', ['residencias' => $residencias])
	@include('partials.footer')
@stop