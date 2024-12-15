@extends('layouts.app')
@section('title') ლოგინი @endsection
@section('app')

<div class="login">
	<div class="shua">
		<div class="text-center">
			<a href="{{route('index')}}"><img src="{{url('imgs/logo.png')}}" alt="Home"></a>
		</div>
		<h1>ავტორიზაცია</h1>
			<form action="{{route('login')}}" method="POST">
				@csrf

				<div>
					<input type="text" name="email" :value="old('email')" required autofocus placeholder="ელ ფოსტა">
				</div>

				<div>
					<input type="password" name="password" :value="old('password')" required autocomplete="current-password" placeholder="პაროლი">
				</div>

				<div>
					<input id="remember_me" name="remember" type="checkbox">
					<label for="remember_me">დამიმახსოვრე</label>
				</div>

				<div>
					<button class="" type="submit">შესვლა</button>
				</div>

				<div class="agdgena">
					@if (Route::has('password.request')) <a href="{{ route('password.request') }}">პაროლის აღდგენა</a> @endif
				</div>
					<hr>
				<div>
					<a class="button" href="{{route('register')}}">რეგისტრაცია</a>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection