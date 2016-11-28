@php
	$barrios = \App\Models\Barrio::where("ciudad_id", "=" ,Illuminate\Support\Facades\Input::get('ciudad_id'))->distinct()->pluck("nombre","id")->toArray();
@endphp
<div class="col-md-10 col-md-offset-1 well">
		
	{!! Form::open(['method' => 'GET', 'url' => url('busqueda'), 'class' => 'form']) !!}
		<div class="col-md-12">
			<div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
				<label for="search"> Buscar:</label>
			    {!! Form::text('search', Illuminate\Support\Facades\Input::get('search'), ['class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('search') }}</small>
			</div>
		</div>	
		
		<div id="more-form" style="display: none;">
			
			<div class="col-md-6">
				<div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
					<label for="tipo_venta"> Transacción </label>
					{!! Form::select('tipo_venta', ["" => "", "Venta"=> "Venta", "Arriendo" => "Arriendo"], Illuminate\Support\Facades\Input::get('tipo_venta'), ["class" => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
					<label for="tipo"> Tipo </label>
					{!! Form::select('tipo',["" => ""] +\App\Models\Residencia::distinct()->pluck("tipo","tipo")->toArray(), Illuminate\Support\Facades\Input::get('tipo'), ["class" => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
					<label for="ciudad_id"> Ciudad </label>
					{!! Form::select('ciudad_id',["" => ""] +\App\Models\Ciudad::distinct()->pluck("nombre","id")->toArray(), Illuminate\Support\Facades\Input::get('ciudad_id'), ["class" => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
					<label for="barrio_id"> Barrio </label>
					{!! Form::select('barrio_id',["" => ""] + $barrios, Illuminate\Support\Facades\Input::get('barrio_id'), ["class" => 'form-control']) !!}
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group{{ $errors->has('min_precio') ? ' has-error' : '' }}">
					<label for="min_precio"> Precio Mínimo </label>
					{!! Form::number('min_precio',Illuminate\Support\Facades\Input::get('min_precio'), ["class" => 'form-control']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group{{ $errors->has('min_precio') ? ' has-error' : '' }}">
					<label for="max_precio"> Precio Máximo </label>
					{!! Form::number('max_precio',Illuminate\Support\Facades\Input::get('max_precio', 100000000), ["class" => 'form-control']) !!}
				</div>
			</div>

		</div>
	    <div class="btn-group col-md-12">
	    	<button type="button" onclick="toggleMoreForm()" class="btn">Más</button>
	        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
	    </div>

	{!! Form::close() !!}
	<script>
		function toggleMoreForm(){
			$("#more-form").toggle('fast');
		}
	</script>
</div>
