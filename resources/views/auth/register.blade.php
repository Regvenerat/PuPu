@extends('layouts.app')
@section('title') რეგისტრაცია @endsection
@section('app')

<div class="login">
	<div class="shua">
		<div class="text-center">
			<a href="{{route('index')}}"><img src="{{url('imgs/logo.png')}}" alt="Home"></a>
		</div>
		<h1>რეგისრაცია</h1>
			<form action="{{route('register')}}" method="POST"> @csrf

				<div>
					<input type="text" name="name" :value="old('name')" required autofocus placeholder="ზედმეტსახელი">
				</div>

				<div>
					<input type="email" name="email" :value="old('email')" required placeholder="ელ ფოსტა">
				</div>

				<div>
					<input type="password" name="password" required autocomplete="new-password" placeholder="პაროლი">
				</div>

				<div>
					<input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="გაიმეორე პაროლიპაროლი">
				</div>

				<br>

				<div>
					<button class="" type="submit">რეგისტრაცია</button>
				</div>

				<div class="agdgena">
					უკვე გაქ აკაუნტი ?
				</div>
<hr>
				<div>
					<a class="button" href="{{route('login')}}">შესვლა</a>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection