@extends('layouts.head')
@section('title')
	@if(Request::segment(2)) {{__('lg.with' . Request::segment(2))}}
	@else Mozo.ge - {{__('lg.allpros')}}
	@endif
@endsection
@section('ogtitle') MOZO @endsection
@section('ogdescription') ყველა სუპერმარკეტის აქცია ერთ საიტზე ! @endsection
@section('ogimage') {{url('img/logo.png')}} @endsection
@section('head')

		{{-- მობილურის სლაიდერი --}}
	<section class="onlymob slider">
		@foreach ($markets as $market)
			<a href="{{route('market', $market->name)}}">
				<div class="card">
					<img src="{{url('img/market/' . $market->name . '.png')}}" alt="{{$market->name}}">
				</div>
			</a>
		@endforeach
	</section>

		{{-- ძებნა --}}
	{{-- @livewire('search') --}}

		{{-- რეკლამა TOP --}}
	<div class="adTop onlymob">
		<a href="{{route('store-index')}}">
			<img src="{{url('storage/ads/store.png')}}" alt="Mozo Store">
		</a>
	</div>

		{{-- სათაური --}}
	<div class="sataur">
		<h1>
			<img class="protest" src="{{url('img/svg/protest_amplifier.svg')}}" alt="protest">
			@if(Request::segment(2))
				{{__('lg.' . Request::segment(2))}}{{__('lg.ss')}}
			@else
				{{__('lg.active')}}
			@endif
			{{__('lg.promos')}}
		</h1>
		@if($promos->count())
			<div class="sada">
				{{$promos->total()}}
			</div>
		@endif
	</div>

	@if($promos->count() == 0)
		<div class="nopromos">
			{{__('lg.nopromosnow')}}
		</div>
	@endif

		{{-- BOX --}}
	@php($i = 1)
	@foreach ($promos as $promo)
		<div class="box">
				{{-- ზედა --}}
			<div class="zeda">
				<table>
					<tr>
						<td rowspan="2">
							<a href="{{route('market', $promo->market->name)}}">
								<img class="avatar" src="{{url('img/market/' . $promo->market->name . '.png')}}" alt="{{$promo->market->name}}">
							</a>
						</td>
						<td class="name">
							{{__('lg.' . $promo->market->name)}}
							@auth
								@if(Auth::user()->id < 4)
									<span>{{$promo->created_at->diffForhumans()}}</span>
								@endif
							@endauth
						</td>
					</tr>
					<tr>
						<td class="finish">
							{{__('lg.finishes')}}
							@if($promo->thend < \Carbon\Carbon::now()->addDay()) <b>{{__('lg.today')}}</b>
							@elseif($promo->thend < \Carbon\Carbon::now()->addDays(2)) <b>{{__('lg.tomorrow')}}</b>
							@else	<b>{{$promo->thend->diffForhumans()}}</b>
							@endif
						</td>
					</tr>
				</table>
			</div>
				{{-- ფოტო ვიდეო --}}
			@if($promo->video == 1)
				<div class="MyVideo">
					<i id="Mplay" class="bi bi-play-circle-fill"></i>
					<video id="Mvideo" onclick="this.paused ? this.play() : this.pause();" oncontextmenu="return false;">
						<source src="{{url('storage/promo/' . $promo->name)}}" type="video/mp4">
						Browswr Problem !
					</video>
					<script>
						var vid = document.getElementById("Mvideo");
						vid.onplay = function() {
							document.getElementById("Mplay").style.opacity = "0";
						};
						vid.onpause = function() {
							document.getElementById("Mplay").style.opacity = ".5";
						};
					</script>
				</div>
			@elseif($promo->video == 2)
					{{-- ბევრი ფოტო --}}
				<div id="myCarousel{{$promo->id}}" class="carousel slide" data-interval="false">

						{{-- გადამრთველი --}}
					@if($multyImages->where('promo_id', $promo->id)->count() > 1)
						<ol class="carousel-indicators">
							@for ($i = 0; $i < $multyImages->where('promo_id', $promo->id)->count(); $i++)
								<li data-target="#myCarousel{{$promo->id}}" class="@if($i == 0) active @endif" data-slide-to ="{{$i}}"></li>
							@endfor
						</ol>
					@endif
					{{-- @if($multyImages->where('promo_id', $promo->id)->count() > 1)
						<div class="carousel-indicators">
							@foreach ($multyImages->where('promo_id', $promo->id) as $index => $image)
								<img data-target="#myCarousel{{$promo->id}}" data-slide-to="{{ $index }}" src="{{ url('storage/promo/multy/' . $image->name . '.webp') }}" alt="{{ $image->name }}">
							@endforeach
						</div>
					@endif --}}

						<!-- თვით ფოტო -->
					<div class="carousel-inner">
						@foreach ($multyImages->where('promo_id', $promo->id) as $image)
							<div class="item @if($image->name == $multyImages->where('promo_id', $promo->id)->first()->name) active @endif">
								<img src="{{url('storage/promo/multy/' . $image->name . '.webp')}}" alt="{{$image->name}}" id="my-image">
							</div>
						@endforeach
					</div>

					<!-- Left and right controls -->
					@if($multyImages->where('promo_id', $promo->id)->count() > 1)
						<a class="left carousel-control" href="#myCarousel{{$promo->id}}" data-slide="prev">
							<i class="bi bi-chevron-left"></i>
						</a>
						<a class="right carousel-control" href="#myCarousel{{$promo->id}}" data-slide="next">
							<i class="bi bi-chevron-right"></i>
						</a>
					@endif
				</div>
			@else
				<a href="{{route('promo', $promo->id)}}"><div class="zoom"><img src="{{url('storage/promo/' . $promo->name . '.webp')}}" alt="{{$promo->name}}"></div></a>
			@endif
				{{-- ქვედა --}}
			<div class="kveda">
				<table>
					<tr><td colspan="3" class="pustpust @if($propros->where('promo_id', $promo->id)->count() == 0) hide @endif"></td></tr>
					@foreach ($propros->where('promo_id', $promo->id) as $propro)
						<tr><td colspan="3" class="pust"></td></tr>
						<tr>
							<td class="drosha">
								<div class="xaz">
									@if($propro->product_id)
										<div class="icon">
											<div class="modka">
												<img src="{{url('storage/product/' . $propro->product->icon . '.webp')}}"
													alt="{{$propro->product->icon}}"
													data-toggle="modal"
													data-target="#mod{{$propro->id}}">
											</div>
												<!-- Modal -->
											<div class="modal fade" id="mod{{$propro->id}}" tabindex="-1">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
															<div class="text-right" data-dismiss="modal"><i class="fa fa-times"></i></div>
														<div class="modal-body text-center">
															<img src="{{url('storage/product/' . $propro->product->icon . '.webp')}}" alt="{{$propro->product->icon}}">
															<h3>{{ $propro->{"name_" . App::currentLocale()} }}</h3>
															<table class="mb-2">
																<tr>
																	<td class="wp33 text-left"><s>{{$propro->oldprice}} ₾</s></td>
																	<td class="wp33 text-center"><b>{{$propro->newprice}} ₾</b></td>
																	<td class="wp33 text-right">
																		<span class="procka">{{ number_format(($propro->oldprice - $propro->newprice) * 100 / $propro->oldprice) }} %</span>
																	</td>
																</tr>
															</table>
														</div>
													</div>
												</div>
											</div>

											<div class="wrapper">
												<img src="{{url('storage/product/' . $propro->product->icon . '.webp')}}" alt="{{$propro->product->icon}}">
												<div class="tooltip">
													<img src="{{url('storage/product/' . $propro->product->icon . '.webp')}}" alt="{{$propro->product->icon}}">
													<h3>{{ $propro->{"name_" . App::currentLocale()} }}</h3>
													<table class="mb-2">
														<tr>
															<td class="wp33 text-left"><s>{{$propro->oldprice}} ₾</s></td>
															<td class="wp33 text-center"><b>{{$propro->newprice}} ₾</b></td>
															<td class="wp33 text-right">
																<span class="procka">{{ number_format(($propro->oldprice - $propro->newprice) * 100 / $propro->oldprice) }} %</span>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</div>
										<div class="lbl">
											<label>
												{{ $propro->{"name_" . App::currentLocale()} }}
											</label>
										</div>
									@else
										<div class="lblno">
											<label>
												{{ $propro->{"name_" . App::currentLocale()} }}
											</label>
										</div>
									@endif
								</div>
							</td>
							<td class="wp0 text-right">
								<i><b class="gel">{{$propro->newprice}}</b><b>₾</b></i>
								<p>{{$propro->oldprice}} ₾</p>
							</td>
							{{-- <td class="wp0">
								@auth
									<input type="checkbox" wire:click="check({{$propro->id}})"
										@foreach ($myBasket as $myb)
											@if($myb->propro_id == $propro->id) checked @endif
										@endforeach
									/>
								@else
									<i class="bi bi-square fs22" data-toggle="modal" data-target="#regmod"></i>
										<!-- Modal -->
									<div class="modal fade" id="regmod">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header xaz">
													<div class="col-10">
														<h3 class="modal-title" id="exampleModalLabel">{{__('lg.attention')}}</h3>
													</div>
													<div class="col-2">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<i class="bi bi-x-lg"></i>
														</button>
													</div>
												</div>
												<div class="modal-body">
													{{__('lg.pleaseregistertoadd')}}
												</div>
												<div class="modal-footer">
													<button type="button" class="btn csl" data-dismiss="modal">{{__('lg.dowant')}}</button>
													<a href="{{route('login')}}" class="button">{{__('lg.register')}}</a>
												</div>
											</div>
										</div>
									</div>
								@endauth
							</td> --}}
						</tr>
						<tr><td colspan="3" class="pust"></td></tr>
					@endforeach
					<tr><td colspan="3" class="pustpust @if($propros->where('promo_id', $promo->id)->count() == 0 or $promo->note_ka) hide @endif"></td></tr>
				</table>
				@if($promo->note_ka)
					<div class="note">
						{!! nl2br(e($promo->{'note_' . App::currentLocale()})) !!}
					</div>
				@endif
			</div>
			<hr>
				{{-- გაზიარება --}}
			<div class="share xaz">
				<div class="xaz col-10">
					<div>
						<span>{{__('lg.share')}}:</span>
					</div>
					{{-- <div data-href="https://mozo.ge/promo/{{$promo->id}}" data-layout="" data-size="">
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fmozo.ge/promo/{{$promo->id}}%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
							<i class="bi bi-facebook blue fs28 mx-3"></i>
						</a>
					</div> --}}
					<div>
						<a href="{{route('fb', $promo->id)}}">
						{{-- <a href="fb-messenger://share/?link=https://mozo.ge/promo/{{$promo->id}}&app_id=your-app-id-here"> --}}
							<i class="bi bi-messenger"></i>
						</a>
					</div>
					<div>
						<a href="{{route('whatsapp', $promo->id)}}">
						{{-- <a href="whatsapp://send?text=Look at it! https://mozo.ge/promo/{{$promo->id}}" data-action="share/whatsapp/share" target="_blank"> --}}
							<i class="bi bi-whatsapp"></i>
						</a>
					</div>
					<div>
						<a href="{{route('viber', $promo->id)}}">
							{{-- <a href="viber://forward?text=Look at it! https://mozo.ge/promo/{{$promo->id}}"> --}}
								<img src="{{url('img/icon/svg/viber.svg')}}" alt="Viber">
							{{-- </a> --}}
						</a>
					</div>
				</div>
				<div class="col-2">
					@livewire('love', ['promo' => $promo])
				</div>
			</div>
		</div>

			{{-- რეკლამა შიგადაშიგ --}}
		@if($i%11 == 0)
			<div class="adloop">
				<img src="{{url('storage/ads/loop/' . substr($i / 3 , -1) . '.jpg')}}" alt="Jagermeister">
			</div>
		@endif
		@php($i++)
	@endforeach

	<div class="text-center">
		{{ $promos->onEachSide(1)->links('vendor/pagination/index') }}
	</div>

		{{-- მაღაზიის შესახებ --}}
	@if(Request::segment(2))
		<div class="aboutMarket">
			<h2>
				{{__('lg.contactinformation')}}
			</h2>
			<div>
				<img src="{{url('img/icon/contact/phone.png')}}" alt="phone">
				<a href="tel:{{$thisMarket->phone}}">{{$thisMarket->phone}}</a>
			</div>
			<div>
				<img src="{{url('img/icon/contact/mail.png')}}" alt="mail">
				<a href="mailto:{{$thisMarket->email}}">{{$thisMarket->email}}</a>
			</div>
			<div>
				<img src="{{url('img/icon/contact/web.png')}}" alt="web">
				<a href="{{$thisMarket->web}}" target="_blank">{{$thisMarket->web}}</a>
			</div>
			<div>
				<img src="{{url('img/icon/contact/address.png')}}" alt="address">
				{{$thisMarket->address}}
			</div>
			<div>
				<img src="{{url('img/icon/contact/fb.png')}}" alt="fb">
				<a href="{{$thisMarket->fb}}">{{$thisMarket->fb}}</a>
			</div>
			<div class="xaz">
				<div class="bol-1">
					<img src="{{url('img/icon/contact/about.png')}}" alt="about">
				</div>
				<div class="abt bol-2">
					{!! nl2br($thisMarket->about) !!}
				</div>
			</div>
		</div>
	@endif



	{{-- @livewire('basket') --}}

{{-- <div class="ads">
	<a href=""><img src="{{url('storage/ads/10.jpg')}}" alt="01"></a>
</div> --}}

@include('layouts.poll')

@endsection