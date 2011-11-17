<?php

namespace OAuth2;

class Provider_Unmagnify extends Provider {  
	
	public $name = 'unmagnify';

	public function url_authorize()
	{
		return 'http://www.unmagnify.com/oauth2/authorize';
	}

	public function url_access_token()
	{
		return 'http://www.unmagnify.com/oauth2/token';
	}

	public function get_user_info($token)
	{
		$url = 'http://www.unmagnify.com/me?'.http_build_query(array(
		 	'access_token' => $token,
		));

		// Create a response from the request
		return array(
			// 'nickname' => $user->login,
			// 'name' => $user->name,
			// 'email' => $user->email,
			'urls' => array(
				// 'Unmagnify' => 'http://unmagnify.com/'.$user->login,
			),
			'credentials' => array(
				'uid' => $user->id,
				'provider' => $this->name,
				'token' => $token,
			),
		);
	}
}