@extends('layouts.app')
@section('ikonka') {{ url('img/logo.png') }} @endsection
@section('app')

		{{-- კომპისთვის --}}
	<header class="onlypc">
		<a href="{{route('index')}}"><img class="logo" src="{{url('img/logo.svg')}}" alt="Mozo.ge"></a>
			{{-- პროფილი --}}
		@auth
			@if(Auth::user()->id < 4)
				<a href="{{route('adm_promos')}}">
					<div class="shesvla">
						<img class="avatar" src="{{url('img/adm/admin.png')}}" alt="Admin">
						<b>ადმინკა</b>
					</div>
				</a>
			@elseif(Auth::user()->market_id)
				<a href="{{route('adm_index')}}">
					<div class="shesvla">
						<img class="avatar" src="{{url('img/adm/admin.png')}}" alt="Operator">
						<b>ჩემი მაღაზია</b>
					</div>
				</a>
			@else
				<a href="{{route('gul')}}">
					<div class="shesvla">
						@if(Auth::user()->avatar)
							<img class="avatar" src="{{url('storage/avatar/' . Auth::user()->avatar . '.webp')}}" alt="{{Auth::user()->name}}">
						@else
							<img class="avatar" src="{{url('img/avatar/' . substr (Auth::user()->id, -1) . '.webp')}}" alt="{{Auth::user()->name}}">
						@endif
						<b>{{Str::upper(Auth::user()->name)}}</b>
					</div>
				</a>
			@endif
		@else
			<a href="{{route('login')}}">
				<div class="shesvla">
					<i class="bi bi-box-arrow-in-right"></i> <b>{{__('lg.login')}}</b>
				</div>
			</a>
		@endauth

			{{-- მაღაზიები --}}
		<hr>
		<h2>{{__('lg.markets')}}</h2>
		<div>
			<ul>
				@foreach ($markets as $market)
					<a href="{{route('market', $market->name)}}">
						<li>
							<div class="xazmo @if(Request::segment(2) == $market->name) xazmoaqct @endif">
								<img src="{{url('img/market/' . $market->name . '.png')}}" alt="{{$market->name}}">
								{{__('lg.' . $market->name)}}
								<hr>
							</div>
						</li>
					</a>
				@endforeach
			</ul>
		</div>

		<hr>

		<div class="foo">
			2023 𝕄ozo.ge
			<p>vol: 1-18</p>
		</div>
	</header>

		{{-- მობილურისთვის --}}
	<header class="onlymob">
		<div class="col-7">
			<a href="{{route('index')}}"><img class="logo" src="{{url('img/logo.svg')}}" alt="Mozo.ge"></a>
		</div>
		<div class="col-5 text-right">
			@auth
				<div>
					<table>
						<tr>
							<td colspan="2" class="ls2"><a href="{{ route('gul') }}"><b>{{Str::upper(Auth::user()->name)}}</b></a></td>
							<td rowspan="2" class="wp0">
								<a href="{{ route('gul') }}">
									@if(Auth::user()->avatar)
										<img class="avatar" src="{{url('storage/avatar/' . Auth::user()->avatar . '.webp')}}" alt="{{Auth::user()->name}}">
									@else
										<img class="avatar" src="{{url('img/avatar/' . substr (Auth::user()->id, -1) . '.webp')}}" alt="{{Auth::user()->name}}">
									@endif
								</a>
							</td>
							<td class="wp0">
								@if(Auth::user()->id < 4)
									<a href="{{route('adm_promos')}}"><img class="avatar" src="{{url('img/adm/admin.png')}}" alt="Admin"></a>
								@elseif(Auth::user()->market_id)
									<a href="{{route('adm_index')}}"><img class="avatar" src="{{url('img/adm/admin.png')}}" alt="Operator"></a>
								@endif
							</td>
						</tr>
						{{-- <tr>
							<td><i class="bi bi-cart4"></i> {{$myBasket->count()}}</td>
							<td class="gel"><i>{{$myBasket->sum('price')}} ₾</i></td>
						</tr> --}}
					</table>
				</div>
			@else
				<a href="{{route('login')}}" class="shedy"><i class="bi bi-box-arrow-in-right"></i></a>
			@endauth
		</div>
	</header>

	<main>

		@yield('head')

	</main>

	<footer>
		<div class="text-center"><h2>{{__('lg.ad')}}</h2></div>
		<div class="ads">
			{{-- <a href=""><img src="{{url('storage/ads/01.jpg')}}" alt="01"></a> --}}
			{{-- <a href=""><img src="{{url('storage/ads/02.jpg')}}" alt="01"></a> --}}
			<a class="onlypc" href="{{route('store-index')}}"><img src="{{url('storage/ads/store2.png')}}" alt="Mozo Store"></a>
			<a class="onlypc" href="{{route('ad2')}}" target="_blank"><img src="{{url('storage/ads/merige1.png')}}" alt="MERI.GE"></a>
		</div>
		<div class="foo">
			<p><a href="{{route('aboutus')}}">{{__('lg.aboutus')}}</a></p>
			<p><a href="{{route('ad')}}">{{__('lg.ad')}}</a></p>
			<p><a href="{{route('terms')}}">{{__('lg.termsandconditions')}}</a></p>
			<p><a href="{{route('policy')}}">{{__('lg.privacypolicy')}}</a></p>
			
			<div class="flags">
				<a class="@if(App::currentLocale() == 'ka') egaa @endif" href="{{route('locale', 'ka')}}">KA</a>
				<a class="@if(App::currentLocale() == 'ru') egaa @endif" href="{{route('locale', 'ru')}}">RU</a>
				<a class="@if(App::currentLocale() == 'en') egaa @endif" href="{{route('locale', 'en')}}">EN</a>
			</div>

			<p><b>{{__('lg.contact')}}</b></p>
			<div class="pb-2"><a href="tel:+995555551301"><i class="bi bi-telephone"></i>555 55 13 01</a></div>
			<div><a href="mailto:info@mozo.ge"><i class="bi bi-envelope"></i>info@mozo.ge</a></div>
			<p class="pt-3">
				<a href="https://www.facebook.com/mozogesale" target="_blank"><i class="big bi-facebook"></i></a>
				<a href=""><i class="big bi-instagram"></i></a>
				<a href=""><i class="big bi-telegram"></i></a>
				<a href=""><i class="big bi-whatsapp"></i></a>
			</p>

		</div>

		<div class="foo onlymob pb-4">
			2023 𝕄ozo.ge
		</div>
	</footer>

@endsection