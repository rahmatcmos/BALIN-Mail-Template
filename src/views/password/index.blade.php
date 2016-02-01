@extends('balin-mail::layout')

@section('content')
	<table style="width:100%">
		<tr>
			<td width="10%"></td>
			<td width="80%">
				<img src="{{ $message->embed('images/balin-white.png') }}" style="max-width:150px; text-align:left;">
			</td>
			<td width="10%"></td>
		</tr>

		<tr>
			<td></br></br></td>
		</tr>

		<tr>
			<td width="10%"></td>
			<td width="80%">
				<p>Dear Bpk/Ibu <strong>{{$data['user']['name']}},</strong></p>

				<p>
					Klik link <a href="{{route(env('ROUTE_BALIN_RESET_PASSWORD'), $data['user']['reset_password_link'])}}"> <strong>berikut</strong></a> untuk reset password anda.
				</p>
			</td>
			<td width="10%"></td>
		</tr>

		<tr>
			<td></br></td>
		</tr>

		<tr>
			<td></br></br></td>
		</tr>
		<tr>
			<td width="10%"></td>
			<td width="80%">
				<p>
					Kind Regards, </br>
					Balin.id
				</p>
			</td>
			<td width="10%"></td>
		</tr>

	</table>
	</br>
	</br>
	</br>
@stop