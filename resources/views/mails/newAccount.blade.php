<h3>
	Hola {{$user->name}}
</h3>
<h5> Bienvenido a  <b>{{config("app.name")}}</b></h5>
<p>
	Gracias por contactar con nosotros y ser tu eleccion para compras/arriendos de propiedades.
</p>
<p>
	Accede a nuestro sistema con las siguientes credenciales: <br>
	<b>EMAIL:</b> {{$user->email}}
	<b>PASSWORD:</b> {{$password}}
</p>
<table>
	<tbody>
		<tr>
			<td style="width: 25%">{{config("app.name")}}</td>
			<td style="width: 50%">
				<img src="{{ $message->embed(public_path('img/logo.png')) }}" alt="Logo" style="height: 70%">
			</td>
		</tr>
	</tbody>
</table>