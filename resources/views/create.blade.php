@extends('layouts.master')
@section('title')
	Create Data
@endsection

@section('header')
	<h1>Create Data</h1>
@endsection

@section('content')
	@foreach(['success','danger'] as $type)
		@if(Session::has('alert-'.$type))
			@component('components.alert')
				@slot('alertType')
					{{$type}}
				@endslot
				@slot('msg')
					{{Session::get('alert-'.$type)}}
				@endslot
			@endcomponent
		@endif
	@endforeach
	{!! Form::open([
		'route' => 'test.store'
	])!!}
		<div class="form-group">
			{!! Form::label('title','Nama') !!}
			{!! Form::text('nama','',['class' => 'form-control','autocomplete' => 'on']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('title','Kelas') !!}
			{!! Form::select('kelas',[
				'X' => 'X',
				'XI' => 'XI',
				'XII' => 'XII'
			],null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('title','Jurusan') !!}
			{!! Form::select('jurusan',[
				'Rekayasa Perangkat Lunak' => 'Rekayasa Perangkat Lunak',
				'Multimedia' => 'Multimedia',
				'Teknik Komputer dan Jaringan' => 'Teknik Komputer dan Jaringan',
			],null,['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('Submit',['class'=>'btn btn-default']) !!}
		</div>
	{!! Form::close() !!}
@endsection