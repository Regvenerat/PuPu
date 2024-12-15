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
					<div class="lvl">
						@php
							$myLVL = ($lvl == $sul) ? $lvl : 0;
						@endphp
						<a href="{{route('like', ['id' => $game->game_id, 'like' => 1, 'lvl' => $myLVL])}}" class="burta">
							<img src="{{url('img/png/like.png')}}" alt="like">
						</a>
						<div>{{$lvl}} / {{$sul}}</div>
						<a href="{{route('like', ['id' => $game->game_id, 'like' => 0, 'lvl' => $myLVL])}}" class="burta">
							<img src="{{url('img/png/dislike.png')}}" alt="dislike">
						</a>
					</div>
					<img src="{{url('storage/girl/' . $game->girl->tits . '.webp')}}" alt="girl">
					@if($lvl == $sul)
						<div id="timer" class="green {{App::currentLocale() == 'en' ? 'enBig' : 'kaSmall'}}">{{__('lg.youdiditall')}}</div>
						<a class="btt {{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}" href="{{route('finish', $lvl)}}">{{__('lg.great')}}</a>
					@else
						<div id="timer" class="green {{App::currentLocale() == 'en' ? 'enBig' : 'kaSmall'}}">{{__('lg.answeriscorrect')}}</div>
						<a class="btt next {{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}" href="{{route('next', $game->game_id)}}"><b>{{__('lg.next')}}</b></a>
					@endif
				</div>
			</div>
			<div class="right">
				<div class="xaz cont">
					<div class="col-6">
						<img src="{{url('storage/girl/' . $game->girl->top . '.webp')}}" alt="{{$game->girl_id}}">
					</div>
					<div class="col-6 dupla">
						<img src="{{url('storage/girl/' . $game->girl->less . '.webp')}}" alt="{{$game->girl_id}}">
					</div>
				</div>
			</div>
		</div>
	</div>

	<audio id="audioPlayer" autoplay>
		<source src="{{'../mp3/win.wav'}}" type="audio/wav">
	</audio>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".right .xaz .dupla").addClass("col-transition");
			$(".right .xaz .dupla").removeClass("dupla");
		});
	 </script>

@endsection