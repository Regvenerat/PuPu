@extends('layouts.head')
@section('title') Kama @endsection
@section('ogtitle') KAMA @endsection
@section('ogdescription') იპოვე ძუძუს პატრონი @endsection
@section('ogimage') {{url('img/logo.png')}} @endsection
@section('head')

	<div class="index">
		<div class="start">
			{{-- <div><a href="{{route('admin_girls')}}">Adminka</a></div> --}}

			@if (Cookie::get('UserName'))
				<h2>
					<img class="flaga" src="https://hatscripts.github.io/circle-flags/flags/{{strtolower(Cookie::get('Flag'))}}.svg">
					{{strtoupper(Cookie::get('UserName'))}}
					<a class="change" href="{{route('nameDel')}}">
						<span class="{{App::currentLocale() == 'en' ? 'enSmall' : 'kaSmall'}}">{{__('lg.changeuser')}}</span>
					</a>
				</h2>
			@endif

			<div class="tits">
				<img class="img2" src="{{url('img/web/button1.png')}}" alt="Start">
				<img class="img1" src="{{url('img/web/button2.png')}}" alt="Start">
				<a class="{{App::currentLocale() == 'en' ? 'enBig' : 'kaBig'}}" href="{{route('start')}}">{{__('lg.newgame')}}</a>
			</div>
		</div>

		<div>
			<div class="tophh {{App::currentLocale() == 'en' ? 'enSmall' : 'kaSmall'}}">
				<div class="@if(request()->path() == '/') act @endif"><a href="{{route('index')}}">{{__('lg.local')}}</a></div>
				<div class="@if(request()->path() == 'score/Global') act @endif"><a href="{{route('score', 'Global')}}">{{__('lg.global')}}</a></div>
				<div class="@if(request()->path() == 'score/Countries') act @endif"><a href="{{route('score', 'Countries')}}">{{__('lg.countries')}}</a></div>
			</div>
			<div class="top">
				<table>
					@foreach ($tops as $top)
						<tr>
							<td class="wp0">
								@if(request()->path() == 'score/Countries')
									<img src="https://hatscripts.github.io/circle-flags/flags/{{strtolower($top->code)}}.svg">
								@else
									<img src="https://hatscripts.github.io/circle-flags/flags/{{strtolower($top->country)}}.svg">
								@endif
							</td>
							<td>
								<div class="nameList">
									{{$top->name}}
								</div>
							</td>
							<td class="text-right">
								{{$top->score}}
							</td>
						</tr>
						</div>
					@endforeach
				</table>
			</div>
		</div>
	</div>

	<div class="locale">
		<a href="{{route('locale', 'ka')}}" class="@if(App::currentLocale() == 'ka') selLoc @endif">
			<img src="https://hatscripts.github.io/circle-flags/flags/ge.svg">
		</a>
		<a href="{{route('locale', 'en')}}" class="@if(App::currentLocale() == 'en') selLoc @endif">
			<img src="https://hatscripts.github.io/circle-flags/flags/us.svg">
		</a>
	</div>

@endsection