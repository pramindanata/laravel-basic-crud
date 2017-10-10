@extends('layouts.master')

@section('title')
	Home
@endsection

@section('header')
	<h1>Home</h1>
@endsection

@section('content')
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datas as $data)
				<tr>
					<td>{{$data->nama}}</td>
					<td>{{$data->kelas}}</td>
					<td>{{$data->jurusan}}</td>
					<td>
						<a href="{{Route('test.edit',$data->id)}}" class="btn btn-info">Edit</a>
						<button id="delete" class="btn btn-danger delete" data-id={{$data->id}}>Hapus</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<nav arial-label="Page navigation" class="text-center">
		{{$datas->links()}}
	</nav>

	<script type="text/javascript">
		$('.delete').click(function(){
			var row = $(this).parent().parent();
			var id = $(this).attr('data-id');
			$.ajax({
				type: "DELETE",
	            url: '/test/'+id,
	            headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
	            success: function (data) {
					row.remove();
				}
			});
		});
	</script>
@endsection
