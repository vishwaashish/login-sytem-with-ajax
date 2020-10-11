<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login System</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
    <?php include("header.php");?>
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/login_style.css"/>
</head>
<body class="form-v2 page-content">
		<div class="form-v2-content">
            <div class="form-detail " >
                <div class="mb-5 mt-3 " style="text-align: center;">
                    <div class="btn-group " role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-danger" id="register">Register</button>
                        <button type="button" class="btn btn-primary" id="login">Login</button>
                    </div>
                </div>
                <form id="register_form" name="form1" method="post" >
                    <div class="alert " id="error" role="alert" style="display:none;">
                            <div><a href="#" class="close" data-dismiss="alert" aria-label="close">X</a></div>
                            <div class="error_show" id="error_show1"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="FullName" name="name" >
                    </div>
                    <div class="form-group">
                        <input type="username" class="form-control" id="username" placeholder="username" name="username" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Email@email.com" name="email" >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" placeholder="Phone Number " name="phone">
                    </div>
                    
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <div class="form-group ">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id='check'  style="width: 3%; -webkit-appearance: checkbox;">
                        <label class="form-check-label" for="gridCheck">
                            Show Password
                        </label>
                        </div>
                    </div> 
                    <input type="password" class="form-control" id="confirm_password" placeholder="confirm_password" name="confirm_password">
                    
                    <div class="mb-3"></div>
                    <input type="button" name="save" class="btn btn-primary" value="Register" id="butsave">
                </form>
                <form id="login_form" name="form1" method="post" style="display:none;">
                    <div class="alert " id="error1" role="alert" style="display:none;">
                            <div><a href="#" class="close" data-dismiss="alert" aria-label="close">X</a></div>
                            <div class="error_show" id="error_show12"></div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Username:</label>
                        <input type="username" class="form-control" id="email_log" placeholder="Email" name="username" >
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
                    </div>
                    <input type="button" name="save" class="btn btn-primary" value="Login" id="butlogin">
                </form>
            </div>
		</div>
</body>
</html>
<script src="js/fetch.js"></script>