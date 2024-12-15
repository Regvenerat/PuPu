@extends('layouts.head')
@section('title') Kama @endsection
@section('ogtitle') KAMA @endsection
@section('ogdescription') იპოვე ძუძუს პატრონი @endsection
@section('ogimage') {{url('img/logo.png')}} @endsection
@section('head')

	<div class="index">
		<div class="name">
			<h1 class="{{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}">{{__('lg.adultgame')}}</h1>
			<img class="img2" src="{{url('img/web/18.png')}}" alt="+18">
			<h2 class="red {{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}">{{__('lg.warning')}}</h2>
			<div class="red {{App::currentLocale() == 'en' ? 'enSmall' : 'kaSmall'}}">
				{{__('lg.warning1')}}
				<br>
				{{__('lg.warning2')}}
				<br>
				{{__('lg.warning3')}} <b>"{{__('lg.startgame')}}"</b> {{__('lg.warning4')}}
			</div>
			<h2 class="{{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}">{{__('lg.howto')}}</h2>
			<div class="{{App::currentLocale() == 'en' ? 'enSmall' : 'kaSmall'}}">
				{{__('lg.howto1')}}
				<br>
				{{__('lg.howto2')}}
			</div>
			<form action="{{route('nameing')}}" method="POST"> @csrf
				<input class="{{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}" type="text" name="UserName" id="UserName" placeholder="{{__('lg.yourname')}}" autofocus required autocomplete="off">
				<button type="submit" class="{{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}">{{__('lg.startgame')}}</button>
			</form>
		</div>


	</div>

@endsection