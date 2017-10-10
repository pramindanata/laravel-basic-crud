@extends('layouts.master')
@section('title')
	Update Data
@endsection

@section('header')
	<h1>Update Data</h1>
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
	{!! Form::model($student,[
		'route' => ['test.update',$student->id],
		'method' => 'PATCH'
	])!!}
		<div class="form-group">
			{!! Form::label('title','Nama') !!}
			{!! Form::text('nama',$student->nama,['class' => 'form-control','autocomplete' => 'on']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('title','Kelas') !!}
			@foreach(['X','XI',"XII"] as $kelas)
				@if($student->kelas == $kelas)
					{!! Form::select('kelas',[
						'X' => 'X',
						'XI' => 'XI',
						'XII' => 'XII'
					],$kelas,['class'=>'form-control']) !!}
				@endif
			@endforeach
		</div>
		<div class="form-group">
			{!! Form::label('title','Jurusan') !!}
			@foreach(['Rekayasa Perangkat Lunak','Multimedia',"Teknik Komputer dan Jaringan"] as $jurusan)
				@if($student->jurusan == $jurusan)
					{!! Form::select('jurusan',[
						'Rekayasa Perangkat Lunak' => 'Rekayasa Perangkat Lunak',
						'Multimedia' => 'Multimedia',
						'Teknik Komputer dan Jaringan' => 'Teknik Komputer dan Jaringan',
					],$jurusan,['class'=>'form-control']) !!}
				@endif
			@endforeach
		</div>
		<div class="form-group">
			{!! Form::submit('Update',['class'=>'btn btn-default']) !!}
		</div>
	{!! Form::close() !!}
@endsection