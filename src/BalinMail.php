<?php

namespace ThunderID\BalinMailTemplate;

use Mail;

class BalinMail
{
	public function Welcome(array $user, array $store)
	{
		// checking user data
		if(empty($user))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		// checking store data
		if(empty($store))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		$infos 						= [];
		foreach ($store as $key => $value) 
		{
			$infos[$value['type']]	= $value['value'];
		}

		$data		= ['user' => $user, 'balin' => $infos];

		//send mail
		Mail::send('balin-mail::welcome.index', ['data' => $data], function($message) use($user)
		{
			$message->to($user['email'], $user['name'])->subject('BALIN - WELCOME MAIL');
		}); 
		
		return true;
	}

	public function ResetPassword(array $user, array $store)
	{
		// checking user data
		if(empty($user))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		// checking store data
		if(empty($store))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		$infos 						= [];
		foreach ($store as $key => $value) 
		{
			$infos[$value['type']]	= $value['value'];
		}

		$data		= ['user' => $user, 'balin' => $infos];

		//send mail
		Mail::send('balin-mail::password.index', ['data' => $data], function($message) use($user)
		{
			$message->to($user['email'], $user['name'])->subject('BALIN - RESET PASSWORD');
		}); 
		
		return true;
	}

	public function invoice(array $invoice, array $store)
	{
		// checking invoice data
		if(empty($invoice))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		// checking store data
		if(empty($store))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		$infos 						= [];
		foreach ($store as $key => $value) 
		{
			$infos[$value['type']]	= $value['value'];
		}

		$data		= ['invoice' => $invoice, 'balin' => $infos];

		//send mail
		Mail::send('balin-mail::order.invoice', ['data' => $data], function($message) use($invoice)
		{
			$message->to($invoice['user']['email'], $invoice['user']['name'])->subject('BALIN - INVOICE');
		}); 
		
		return true;
	}

	public function canceled(array $order, array $store)
	{
		// checking order data
		if(empty($order))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		// checking store data
		if(empty($store))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		$infos 						= [];
		foreach ($store as $key => $value) 
		{
			$infos[$value['type']]	= $value['value'];
		}

		$data			= ['canceled' => $order, 'balin' => $infos];

		//send mail
		Mail::send('balin-mail::order.canceled', ['data' => $data], function($message) use($order)
		{
			$message->to($order['user']['email'], $order['user']['name'])->subject('BALIN - CANCEL ORDER');
		}); 
		
		return true;
	}

	public function paid(array $order, array $store)
	{
		// checking order data
		if(empty($order))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		// checking store data
		if(empty($store))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		$infos 						= [];
		foreach ($store as $key => $value) 
		{
			$infos[$value['type']]	= $value['value'];
		}

		$data		= ['paid' => $order, 'balin' => $infos];

		//send mail
		Mail::send('balin-mail::order.paid', ['data' => $data], function($message) use($order)
		{
			$message->to($order['user']['email'], $order['user']['name'])->subject('BALIN - PAYMENT VALIDATION');
		}); 
		
		return true;
	}

	public function shipped(array $order, array $store)
	{
		// checking order data
		if(empty($order))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		// checking store data
		if(empty($store))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		$infos 						= [];
		foreach ($store as $key => $value) 
		{
			$infos[$value['type']]	= $value['value'];
		}

		$data		= ['shipped' => $order, 'balin' => $infos];

		//send mail
		Mail::send('balin-mail::order.shipped', ['data' => $data], function($message) use($order)
		{
			$message->to($order['user']['email'], $order['user']['name'])->subject('BALIN - SHIPPING INFORMATION');
		}); 
		
		return true;
	}

	public function delivered(array $order, array $store)
	{
		// checking order data
		if(empty($order))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		// checking store data
		if(empty($store))
		{
			throw new Exception('Sent variable must be array of a record.');
		}

		$infos 						= [];
		foreach ($store as $key => $value) 
		{
			$infos[$value['type']]	= $value['value'];
		}

		$data		= ['delivered' => $order, 'balin' => $infos];

		//send mail
		Mail::send('balin-mail::order.delivered', ['data' => $data], function($message) use($order)
		{
			$message->to($order['user']['email'], $order['user']['name'])->subject('BALIN - DELIVERED ORDER');
		}); 
		
		return true;
	}
}
