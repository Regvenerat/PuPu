@extends('layouts.head')
@section('title') Kama @endsection
@section('ogtitle') KAMA @endsection
@section('ogdescription') იპოვე ძუძუს პატრონი @endsection
@section('ogimage') {{url('img/logo.png')}} @endsection
@section('head')

	<div class="game">
		<div class="xaz">
			<div class="left">
				<div class="cont">
					<div class="lvl">{{$lvl}} / {{$sul}}</div>
					<img src="{{url('storage/girl/' . $game->girl->tits . '.webp')}}" alt="">
					<div id="timer" class="tmCol">{{$time}}</div>
					<a class="btt cancel {{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}" href="{{route('index')}}"><b>{{__('lg.cancel1')}}</b></a>
				</div>
			</div>
			<div class="right">
				<div class="xaz mobku">
					<div class="col-4 up">
						<a href="{{route('selecting', ['id' => $game->id, 'sel' => $game->first])}}">
							<img src="{{url('storage/girl/' . $game->firstGirl->top . '.webp')}}" alt="Image">
						</a>
					</div>
					<div class="col-4 up">
						<a href="{{route('selecting', ['id' => $game->id, 'sel' => $game->second])}}">
							<img src="{{url('storage/girl/' . $game->secondGirl->top . '.webp')}}" alt="Image">
						</a>
					</div>
					<div class="col-4 up">
						<a href="{{route('selecting', ['id' => $game->id, 'sel' => $game->third])}}">
							<img src="{{url('storage/girl/' . $game->thirdGirl->top . '.webp')}}" alt="Image">
						</a>
					</div>
					<div class="col-4 down">
						<a href="{{route('selecting', ['id' => $game->id, 'sel' => $game->fourth])}}">
							<img src="{{url('storage/girl/' . $game->fourthGirl->top . '.webp')}}" alt="Image">
						</a>
					</div>
					<div class="col-4 down">
						<a href="{{route('selecting', ['id' => $game->id, 'sel' => $game->fifth])}}">
							<img src="{{url('storage/girl/' . $game->fifthGirl->top . '.webp')}}" alt="Image">
						</a>
					</div>
					<div class="col-4 down">
						<a href="{{route('selecting', ['id' => $game->id, 'sel' => $game->sixth])}}">
							<img src="{{url('storage/girl/' . $game->sixthGirl->top . '.webp')}}" alt="Image">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<audio id="audioPlayer" autoplay>
		<source src="{{'../mp3/' . $mp3 }}" type="audio/mp3">
	</audio>

	<script>
		let count = {{$time}};
		const timer = setInterval(function() {
			count--;
			document.getElementById('timer').innerText = count;
			if (count <= 0) location.reload();
		}, 1000);
		document.addEventListener("DOMContentLoaded", function() {
			var audio = document.getElementById("audioPlayer");
			audio.volume = 0.3;
		});
	</script>

@endsection