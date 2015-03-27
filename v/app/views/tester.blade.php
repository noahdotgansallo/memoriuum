<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST" action="{{action('UserAuthController@login')}}">

	<!--<input type="text" placeholder="fn" name="first_name">
	<input type="text" placeholder="ln" name="last_name">
	<input type="text" placeholder="un" name="username">
	-->
	<input type="email" placeholder='em' name="email">
	<input type="password" placeholder="pw" name="password">
	<input type="submit">
	
</form>

</body>
</html>
