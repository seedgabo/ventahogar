<h3>
	Un nuevo usuario se ha registrado al sistema
</h3>
<p>
	<b>Usuario:</b> {{$user->name}} <br>
	<b>Telefono:</b> {{$user->phone}} <br>
	<b>Email:</b> {{$user->email}} <br>
</p>
<label> Mensaje : </label>
<p>{{ $msg }}</p>

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