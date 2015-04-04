<?php

class UserAuthController extends BaseController{

	public function register()
	{
		$input = Input::all();

		try {
			$user = Sentry::register($input, false);
			$code = $user->getActivationCode();
			
			$data = array('user' => $user);

			/*Mail::send('emails.activate', $data, function($message) use ($data)
			{
			    $message->to($data['user']->email, $data['user']->first_name.' '.$data['user']->last_name)->subject('Welcome to Memoruum!');
			
			});
			*/

			return ApiResponse::response(1, null, 'Please check your email for the activation link');

		} catch (Exception $e) {

			return ApiResponse::response(0, $e->getMessage());
			
		}


	}

	public function activate($code)
	{
		$user = User::where('activation_code', '=', $code)->first();
		if(!is_null($user))
		{
			$user->activated = true;
			$user->save();

			return ApiResponse::response(1, null, 'Congratulations, you are now registered with Memoriuum. You are now able to login');
		} else{
			return ApiResponse::response(0, 'Your account was not activated');
		}
	}

	public function login()
	{
		$input = Input::all();
		try {
			$user = Sentry::authenticate($input);

			return ApiResponse::response(1, null);

		} catch (Exception $e) {
			return ApiResponse::response(1, $e->getMessage());	
		}
	}

	public function logout()
	{
		Sentry::logout();
		return ApiResponse::response(1, null);
	}
}