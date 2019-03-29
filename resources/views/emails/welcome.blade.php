<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
    <title> Welcome to LaraGym Family </title>
</head>
<h1> Welcome to LaraGym </h1>
<body style="background-color: 	#acac53;margin-left: 150px;font-family: 'Germania One', cursive;">
<h2 style="color: white;"> Hey, {{$user['name']}}</h2>
<br/>
<div>
<img src="https://www.nautilusplus.com/content/uploads/2016/09/courir-gym.jpg" style="width:900px;height: 500px;border-radius: 20px;margin-bottom: 20px;"> </div>
<div style="background-color:white; font-size: 25px;width:800px;padding: 10px;border-radius: 20px; text-align: center;color:  #660000;margin-left: 25px;">
<p > You are Almost Ready to Join LaraGym, Simply Click on The Button Below To Complete Your Register  </p> Your registered email is {{$user['email']}} 
 </div>
<br/>
<button  style="background-color: #660000;padding:20px;text-align: center;border-radius: 12px;margin-top: 50px;margin-left: 350px;"> 
 <a  style="text-decoration: none;color: white;font-size: 25px;"  
  href="{{url('api/user/verify', $varUser->token)}}"> Verify Email</a>   </button>
</body>
<footer> Copyright@LaraGym 2019 </footer>
</html>
