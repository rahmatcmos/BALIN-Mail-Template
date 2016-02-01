@extends('balin-mail::layout')

@section('content')
	<table style="width:100%">
		<tr>
			<td style="width:80%">
				<img src="{{ $message->embed('Balin/web/image/balin-white.png') }}" style="max-width:200px; text-align:left;">
			</td>
			<td style="width:20%"></td>
		</tr>
	</table>
	<hr/>
	<br/>
	<table class="row">
		<tr>
			<td class="wrapper last">
				<table class="twelve columns">
					<tr>
						<td>
							<p>Dear	Bpk/Ibu <strong>{{$data['canceled']['user']['name']}}, </strong></p>
							<p> 
								Pesanan <strong>#{{$data['canceled']['ref_number']}}</strong> sudah dibatalkan karena belum diterima pembayaran dalam waktu 1x24 jam, atau Pesanan <strong>#{{$data['canceled']['ref_number']}}</strong> sudah dibatalkan karena permintaan customer.
							</p>
							<p>
								Nikmati bonus belanja dari produk BALIN lainnya.
							</p>
						</td>
						<td class="expander"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br/>
	<br/>
	<br/>
	<br/>
@stop
