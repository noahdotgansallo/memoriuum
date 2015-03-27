<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Activate Your Account</h2>

		<div>
			Welcome to Memoriuum. Before you can start using your account, you must first activate it by clicking on the link below.<br/>
			<a href="{{action('UserAuthController@activate', $user->activation_code)}}">{{action('UserAuthController@activate', $user->activation_code)}}</a>
		</div>
	</body>
</html>
