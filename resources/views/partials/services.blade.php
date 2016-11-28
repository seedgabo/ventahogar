<div class="services">
	<div class="container">
		<h3>{{$title or 'Encuentra Tu Hogar Ideal'}}</h3>
		{{-- <p class="dolor">Casa de ensueño en </p> --}}
		<div class="text-center col-md-6 col-md-offset-3">
			
			@if(method_exists($residencias , 'links'))
			{{ $residencias->appends(Illuminate\Support\Facades\Input::all())->fragment("houses")->links() }}	
			@endif
		</div>
		<div id="houses">
			@forelse ($residencias as $res)
			<div class="w3l_services_grids">
				<div class="col-md-4 w3l_services_grid">
					<div class="hover15 column">
						<div>
							<figure><img src="{{$res->image->url or 'img/banner.jpg'}}" alt=" " class="img-responsive" /></figure>
						</div>
					</div>
					<h4><a href="{{url('ver/'.$res->id)}}">{{$res->nombre}}</a></h4>
					<p>
						{!!  $res->slogan !!}
					</p>
					<ul class="fa-ul">
						<li><i class="fa fa-square-o fa-li"></i><b>Metraje: </b> {{ $res->metraje }}</li>
						<li><i class="fa fa-shower fa-li"></i><b>Baños:</b> {{ $res->baños }}</li>
						<li><i class="fa fa-bed fa-li"></i><b>Habitaciones: </b> {{ $res->habitaciones }}</li>
						<li><i class="fa fa-automobile fa-li"></i> <b>Garaje:</b {{$res->garaje}}></li>
					</ul>
				</div>
				@if ($loop->iteration % 3 == 0)
				<div class="clearfix"></div>
				@endif
			</div>
			@empty
			@endforelse
			<div class="clearfix"> </div>
			<div class="text-center col-md-6 col-md-offset-3">
				
				@if(method_exists($residencias , 'links'))
				{{ $residencias->fragment("houses")->appends(Illuminate\Support\Facades\Input::all())->links() }}	
				@endif
			</div>
		</div>
	</div>
</div>
