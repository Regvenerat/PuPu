@extends('layouts.app')
@section('ikonka') {{ url('img/logo.png') }} @endsection
@section('app')

	<header>
		<a href="{{route('index')}}">HOME</a>
	</header>

	<div class="admin">
		<h1>Girls - {{$girls->total()}}</h1>
		<table class="girls">
			<tr>
				<form action="{{route('admin_girlsAdding')}}" method="POST" enctype="multipart/form-data"> @csrf
					<td>
						<label for="top">
							<img id="topPreview" src="{{url('img/adm/addTop.jpg')}}" alt="Image Upload">
						</label>
						<input type="file" name="top" id="top" accept="image/*" onchange="previewImage()">
					</td>
					<td>
						<label for="tits" class="shua">
							<img id="titsPreview" src="{{url('img/adm/addTits.jpg')}}" alt="Image Upload">
						</label>
						<input type="file" name="tits" id="tits" accept="image/*" onchange="previewImage1()">
					</td>
					<td>
						<label for="less">
							<img id="lessPreview" src="{{url('img/adm/addLess.jpg')}}" alt="Image Upload">
						</label>
						<input type="file" name="less" id="less" accept="image/*" onchange="previewImage2()">
					</td>
					<td><button type="submit"><i class="bi bi-plus-circle"></i></button></td>
				</form>
			</tr>
			@foreach ($girls as $girl)
			<tr>
				<td>
					<img src="{{url('storage/girl/' . $girl->top . '.webp')}}" alt="AdultPuzzle">
				</td>
				<td>
					<img src="{{url('storage/girl/' . $girl->tits . '.webp')}}" alt="AdultPuzzle">
				</td>
				<td>
					<img src="{{url('storage/girl/' . $girl->less . '.webp')}}" alt="AdultPuzzle">
				</td>
				<td>
					<a href=""><i class="bi bi-trash3-fill red fs20 op50"></i></a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>

	<script>
		function previewImage() {
			var iMage = document.getElementById('top');
			var imagePreview = document.getElementById('topPreview');
			if (iMage.files && iMage.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					imagePreview.src = e.target.result;
				}
				reader.readAsDataURL(iMage.files[0]);
			} else {
				imagePreview.src = '#';
			}
		}
		function previewImage1() {
			var iMage = document.getElementById('tits');
			var imagePreview = document.getElementById('titsPreview');
			if (iMage.files && iMage.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					imagePreview.src = e.target.result;
				}
				reader.readAsDataURL(iMage.files[0]);
			} else {
				imagePreview.src = '#';
			}
		}
		function previewImage2() {
			var iMage = document.getElementById('less');
			var imagePreview = document.getElementById('lessPreview');
			if (iMage.files && iMage.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					imagePreview.src = e.target.result;
				}
				reader.readAsDataURL(iMage.files[0]);
			} else {
				imagePreview.src = '#';
			}
		}
	</script>





@endsection