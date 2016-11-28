<div class="gallery">
		<div class="container">
			<h3{{$residencia->slogan}}></h3>
			<h3 class="dolor">{{$residencia->nombre}}</h3>
			<hr>
			<div class="row">
			@if (isset(json_decode($residencia->url_video)->id))
				<div class="col-md-6">
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/{{json_decode($residencia->url_video)->id}}" frameborder="0" allowfullscreen></iframe>
					<br>
					<h4>{{$residencia->descripcion}}</h4>
				</div>
			@else
				<div class="col-md-6">
					<div class="thumbnail">
						<img data-src="#" src="{{$residencia->image->url or 'images/banner.jpg'}}" alt=""  class="img-responsive">
					</div>
					<br>
					<h4>{{$residencia->descripcion}}</h4>
				</div>
			@endif
				<div class="col-md-6 well">
					<h4>
						<i class="fa fa-home"></i> {{$residencia->nombre}}
						@if($residencia->destacado)<i class="fa fa-star fa-2x pull-right text-primary"></i>@endif
					</h4>
					<h5 class="label label-warning">En {{$residencia->tipo_venta}}</h5>
					<h5 class="badge badge-primary pull-right">{{$residencia->tipo}}</h5>
					{{-- <p class="text-center">{{$residencia->descripcion}}</p> --}}
					<hr>
					<a href="" title="buy" class="btn btn-primary btn-block" > <i class="fa fa-shopping-cart"></i> Comprar</a>
					<hr>
					<div class="col-md-12 data-resi">
						<p><b>Precio:</b> COP: {{ number_format($residencia->precio,2,",",".")}}</p>
						<p><b>Ubicación:</b> {{$residencia->ciudad->nombre or ''}} - {{$residencia->barrio->nombre or ''}}</p>
						<p><b>Dirección:</b> {{ $residencia->direccion}}</p>						
						<p><b>Metraje:</b> {{ $residencia->metraje }} mts <sub>2</sub></p>						
						<p><b>Baños:</b> {{ $residencia->baños}}</p>						
						<p><b>Habitaciones:</b> {{ $residencia->habitaciones}}</p>						
						<p><b>Garaje:</b> {{ $residencia->garaje}}</p>
						@if(json_decode($residencia->otros) !== null &&  sizeof(json_decode($residencia->otros)) > 0 )
						<h5 class="text-center">Otros Datos:</h5>
					 	@forelse (json_decode($residencia->otros) as $otro)
						<p><b>{{$otro->key or '' }}:</b> {{ $otro->value or '' }} </p>
					 	@empty
					 	@endforelse
					 	@endif
					</div>
					<div class="col-md-12">
						<div id="map" style="width: 100%; height: 210px;"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="wthree_gallery_grids">
	                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							@forelse ($residencia->images as $img)
								<div class="tab_img">
									<div class="col-md-3 agile_gallery_grids">
										<a href="{{$img->url}}" class="jzBoxLink" title="Domicile">
											<div class="view view-sixth">
												<img src="{{$img->url}}" alt=" " class="img-responsive" />
												<div class="mask">
													<p>{{$residencia->slogan}}</p>
												</div>
											</div>
										</a>
									</div>
								</div>
							@empty
							@endforelse
							<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="{{asset('js/jzBox.js')}}"></script>
			<script>
			function myMap() {
			  var mapCanvas = document.getElementById("map");
			  var mapOptions = {
			    center: new google.maps.LatLng({{$residencia->latitud}}, {{$residencia->longitud}}), zoom: 10
			  };
			  var map = new google.maps.Map(mapCanvas, mapOptions);
			  var marker = new google.maps.Marker({
			    position: new google.maps.LatLng({{$residencia->latitud}}, {{$residencia->longitud}}),
			    map: map,
			    title: "{{$residencia->nombre}}"
			  });
			}
			</script>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4RG2mdn_BoLX9PBFY8aBmjm9t_kT1ea8&callback=myMap"></script>

		</div>
	</div>


