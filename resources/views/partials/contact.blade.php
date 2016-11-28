<div class="mail">
	<div class="container">
		<h3>Contacto</h3>
		{{-- <p class="dolor">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> --}}

		<div class="agileits_mail_grids">
			<div class="col-md-8 agileits_mail_grid_left">
				<form action="{{url('login')}}" method="post">
					{{ csrf_field() }}
					<h4>Nombre*</h4>
					<input type="text" name="Name" placeholder="nombre" required="">
					<h4>Email*</h4>
					<input type="email" name="Email" placeholder="email"  required="">
					<h4>Telefono*</h4>
					<input type="text" name="Phone" placeholder="telefono" required="">
					<h4>Mensaje*</h4>
					<textarea name="Message" placeholder="mensaje"></textarea>
					<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
				</form>
			</div>
			<div class="col-md-4 agileits_mail_grid_right">
				<div class="agileits_mail_grid_right_grid">
					<h4>Acerca de Nosotros</h4>
					<address>Direcicon</address>
				</div>
				<div class="agileits_mail_grid_right_grid">
					<h4>Social Media</h4>
					<ul class="social-icons">
						<li><a href="#" class="icon icon-border facebook"></a></li>
						<li><a href="#" class="icon icon-border twitter"></a></li>
						<li><a href="#" class="icon icon-border instagram"></a></li>
						<li><a href="#" class="icon icon-border pinterest"></a></li>
					</ul>
				</div>
				<div class="agileits_mail_grid_right_grid">
					<h4>Encuentranos</h4>
					<ul class="contact_info">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
