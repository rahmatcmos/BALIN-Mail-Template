@extends('balin-mail::layout')

@section('content')
	<table style="width:100%">
		<tr class="row">
			<td class="col-sm-2" style="width:20%">
				<img src="{{ $message->embed('images/balin-white.png') }}" style="max-width:200px; text-align:left;">
			</td>
			<td class="col-sm-10" valign="top" style="text-align:right;width:40%">
				<h3>Validasi Pembayaran</h3>
			</td>
		</tr>
	</table>
	<hr/>
	<br/>
	<table style="width:100%">
		<tr class="row">
			<td style="width:10%">&nbsp;</td>
			<td style="width:3%; text-align:center;">
				<div style="width:100px; margin: 0 auto; text-align:center;">
					<div style="padding: 15px;background-color: #ddd;width: 40px;margin: 0 auto;font-size: 30px">1</div>
					<p style="margin-bottom:0; text-transform:uppercase; color: #999">Checkout</p>
				</div>
			</td>
			<td style="width:3%;">&nbsp;</td>
			<td style="width:3%; text-align:center;">
				<div style="width:100px; margin: 0 auto; text-align:center">
					<div style="padding: 15px;background-color: #000; color: #fff;width: 40px;margin: 0 auto;font-size: 30px">2</div>
					<p style="margin-bottom:0; text-transform:uppercase;">Paid</p>
				</div>
			</td>
			<td style="width:3%;">&nbsp;</td>
			<td style="width:3%; text-align:center;">
				<div style="width:100px; margin: 0 auto; text-align:center">
					<div style="padding: 15px;background-color: #ddd;width: 40px;margin: 0 auto;font-size: 30px">3</div>
					<p style="margin-bottom:0; text-transform:uppercase; color: #999;">Shipping</p>
				</div>
			</td>
			<td style="width:3%;">&nbsp;</td>
			<td style="width:3%; text-align:center;">
				<div style="width:100px; margin: 0 auto; text-align:center;">
					<div style="padding: 15px;background-color: #ddd;width: 40px;margin: 0 auto;font-size: 30px">4</div>
					<p style="margin-bottom:0; text-transform:uppercase; color: #999;">Delivered</p>
				</div>
			</td>
			<td class="col-sm-1" style="width:10%">&nbsp;</td>
		</tr>
	</table>
	<br><br>
	<table class="row">
		<tr>
			<td class="wrapper last">
				<table class="twelve columns">
					<tr>
						<td>
							<br/>
							<?php
								$point 			= 0;
								foreach ($data['paid']['pointlogs'] as $key => $value) 
								{
									$point 		= $point + $value['amount'];
								}
							?>
							<p>Dear Bpk/Ibu <strong>{{$data['paid']['user']['name']}}, </strong></p>
							<p> 
								Pembayaran untuk pesanan <strong>#{{$data['paid']['ref_number']}}</strong> telah kami terima pada tanggal 
								@if($data['paid']['payment']) 
									@date_indo($data['paid']['payment']['ondate']) 
								@else 
									@date_indo($data['paid']['updated_at']) 
								@endif
							</p>
							@if($data['paid']['payment'])
								<p>
									Atas nama {{$data['paid']['payment']['account_name']}} melalui rekening {{$data['paid']['payment']['destination']}}
								</p>
							@else
								<p>
									Menggunakan point BALIN sebesar @money_indo(abs($point))
								</p>
							@endif
							<p>
								Pengiriman akan diproses selambat lambatnya 2 (dua) hari kerja setelah pembayaran di validasi.
							</p>
						</td>
						<td class="expander"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<h3>Rincian Pesanan</h3>
				<table style="width:100%; font-size:11px;">
					<thead>
						<tr>
							<th class="col-md-1 text-center" style="text-align:center;background-color:black;color:white;padding:10px;">No</th>
							<!-- <th>Item#</th> -->
							<th class="text-center col-md-4" style="text-align:left;background-color:black;color:white;padding:10px;">Item</th>
							<th class="text-center col-md-1" style="text-align:center;background-color:black;color:white;padding:10px;">Qty</th>
							<th class="text-right col-md-2" style="text-align:right;background-color:black;color:white;padding:10px;">Harga @</th>
							<th class="text-right col-md-2" style="text-align:right;background-color:black;color:white;padding:10px;">Diskon</th>
							<th class="text-right col-md-2" style="text-align:right;background-color:black;color:white;padding:10px;">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $amount = 0;?>
						@forelse($data['paid']['transactiondetails'] as $key => $value)
							<?php $amount = $amount + (($value['price'] - $value['discount']) * $value['quantity']);?>
							<tr>
								<td class="text-center" style="text-align:center;background-color:#C6C6C6;padding:5px;">{!!($key+1)!!}</td>
								<td style="text-align:left;background-color:#C6C6C6;padding:5px;"> {{$value['varian']['product']['name']}} {{$value['varian']['size']}}</td>
								<td class="text-center" style="text-align:center;background-color:#C6C6C6;padding:5px;"> {{$value['quantity']}} </td>
								<td class="text-right" style="text-align:right;background-color:#C6C6C6;padding:5px;"> @money_indo($value['price']) </td>
								<td class="text-right" style="text-align:right;background-color:#C6C6C6;padding:5px;"> @money_indo($value['discount']) </td>
								<td class="text-right" style="text-align:right;background-color:#C6C6C6;padding:5px;"> @money_indo((($value['price'] - $value['discount']) * $value['quantity'])) </td>
							</tr>
						@empty
							<tr>
								<td colspan="6"> Tidak ada data </td>
							</tr>
						@endforelse
						<tr>
							<td colspan="6">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="2" style="text-align:left;">Sub Total</td>
							<td style="text-align:right;">IDR</td>
							<td style="text-align:right;padding:5px;">@money_indo_for_email($amount)</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="2" style="text-align:left;">Ongkos Kirim</td>
							<td style="text-align:right;">IDR</td>
							<td style="text-align:right;padding:5px;">@money_indo_for_email($data['paid']['shipping_cost'])</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="2" style="text-align:left;">Diskon Voucher</td>
							<td style="text-align:right;">IDR</td>
							<td style="text-align:right;padding:5px;">@money_indo_for_email(($data['paid']['voucher_discount'] ? $data['paid']['voucher_discount'] : 0))</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="2" style="text-align:left;">Balin Point yang digunakan</td>
							<td style="text-align:right;">IDR</td>
							<td style="text-align:right;padding:5px;">@money_indo_for_email($data['paid']['discount_point'])</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="2" style="text-align:left;">Potongan Transfer</td>
							<td style="text-align:right;">IDR</td>
							<td style="text-align:right;padding:5px;">@money_indo_for_email($data['paid']['unique_number'])</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td colspan="2" style="text-align:left;">Total Bayar</td>
							<td style="text-align:right;">IDR</td>
							@if($data['paid']['amount'] < 0)
								<td style="text-align:right;padding:5px;">@money_indo_for_email(0)</td>
							@else
								<td style="text-align:right;padding:5px;">@money_indo_for_email($data['paid']['amount'])</td>
							@endif
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>
				Jika anda ada kesulitan saat memesan silahkan menghubungi layanan pelanggan kami.
				<p>Email : {{$data['balin']['email']}}</p>
			</td>
		</tr>	
	</table>
	<br/>
	<br/>
	<br/>
	<br/>
@stop
