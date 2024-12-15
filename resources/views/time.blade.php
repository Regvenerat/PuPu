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
					<div id="timer" class="red {{App::currentLocale() == 'en' ? 'enBig' : 'kaSmall'}}">{{__('lg.gameover')}}</div>
					@if($lvl > 1)
						<a class="btt {{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}" href="{{route('finish', $lvl - 1)}}">{{__('lg.finish')}}</a>
					@else
						<a class="btt {{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}" href="{{route('index')}}">{{__('lg.finish')}}</a>
					@endif
				</div>
			</div>
			<div class="right">
				<div class="xaz mobku">
					<div class="col-4 up @if($game->first == $game->girl_id) rotka @endif">
						<div>
							<img src="{{url('storage/girl/' . $game->firstGirl->top . '.webp')}}" alt="" @if($game->first !== $game->girl_id) class="gr" @endif>
							<img src="{{url('storage/girl/' . $game->firstGirl->less . '.webp')}}" alt="" class="hidka @if($game->first == $game->girl_id) rt @endif">
						</div>
					</div>
					<div class="col-4 up @if($game->second == $game->girl_id) rotka @endif">
						<div>
							<img src="{{url('storage/girl/' . $game->secondGirl->top . '.webp')}}" alt="" @if($game->second !== $game->girl_id) class="gr" @endif>
							<img src="{{url('storage/girl/' . $game->secondGirl->less . '.webp')}}" alt="" class="hidka @if($game->second == $game->girl_id) rt @endif">
						</div>
					</div>
					<div class="col-4 up @if($game->third == $game->girl_id) rotka @endif">
						<div>
							<img src="{{url('storage/girl/' . $game->thirdGirl->top . '.webp')}}" alt="" @if($game->third !== $game->girl_id) class="gr" @endif>
							<img src="{{url('storage/girl/' . $game->thirdGirl->less . '.webp')}}" alt="" class="hidka @if($game->third == $game->girl_id) rt @endif">
						</div>
					</div>
					<div class="col-4 down @if($game->fourth == $game->girl_id) rotka @endif">
						<div>
							<img src="{{url('storage/girl/' . $game->fourthGirl->top . '.webp')}}" alt="" @if($game->fourth !== $game->girl_id) class="gr" @endif>
							<img src="{{url('storage/girl/' . $game->fourthGirl->less . '.webp')}}" alt="" class="hidka @if($game->fourth == $game->girl_id) rt @endif">
						</div>
					</div>
					<div class="col-4 down @if($game->fifth == $game->girl_id) rotka @endif">
						<div>
							<img src="{{url('storage/girl/' . $game->fifthGirl->top . '.webp')}}" alt="" @if($game->fifth !== $game->girl_id) class="gr" @endif>
							<img src="{{url('storage/girl/' . $game->fifthGirl->less . '.webp')}}" alt="" class="hidka @if($game->fifth == $game->girl_id) rt @endif">
						</div>
					</div>
					<div class="col-4 down @if($game->sixth == $game->girl_id) rotka @endif">
						<div>
							<img src="{{url('storage/girl/' . $game->sixthGirl->top . '.webp')}}" alt="" @if($game->sixth !== $game->girl_id) class="gr" @endif>
							<img src="{{url('storage/girl/' . $game->sixthGirl->less . '.webp')}}" alt="" class="hidka @if($game->sixth == $game->girl_id) rt @endif">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<audio id="audioPlayer" autoplay>
		<source src="{{'../mp3/wrong.wav'}}" type="audio/wav">
	</audio>

	<script>
		window.onload = function() {
			var images = document.querySelectorAll('.gr');
			images.forEach(function(img) {
					img.style.filter = 'brightness(1) grayscale(1) contrast(40%)';
					img.style.transition = '1.6s';
			});
		};

		document.addEventListener("DOMContentLoaded", function() {
			var audio = document.getElementById("audioPlayer");
			audio.volume = 0.1;
		});
	</script>

@endsection