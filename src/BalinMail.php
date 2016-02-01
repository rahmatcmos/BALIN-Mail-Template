<?php

namespace ThunderID\BalinMailTemplate;

use Mail;

class BalinMail
{
	public function welcome(array $user, array $store)
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
}
