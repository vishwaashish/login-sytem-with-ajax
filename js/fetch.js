
$(document).ready(function() {
   
    $('#check').click(function() {
        if ($('#password').attr('type') == 'text') {
        $('#password').attr('type', 'password');
        } else {
        $('#password').attr('type', 'text');
        }
    });
  
   
	$('#login').on('click', function() {
		$("#login_form").show();
		$("#register_form").hide();
	});
	$('#register').on('click', function() {
		$("#register_form").show();
		$("#login_form").hide();
    });
   
// register
	$('#butsave').on('click', function() {
        var v = document.getElementById("error");
        emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var name = $('#name').val();
        var email = $('#email').val();
       
		var username = $('#username').val();
		var phone = $('#phone').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        setTimeout(function() { $("#error").fadeOut(1000); }, 5000);		
        if(name=="" && email=="" && phone=="" && password=="" ){
            $("#error").show();
            $('#error_show1').html('Please fill all the field!');
            v.className += " alert-danger";
        } 
        else if(! emailReg.test( email ) ){
            $("#error").show();
            $('#error_show1').html('Email is not valid!');
            v.className += " alert-danger";
        } 
        else if( password != confirm_password ){
            $("#error").show();
            $('#error_show1').html('Password is not same!');
            v.className += " alert-danger";
        }
        else if( !password.match(/([a-zA-Z])/) && password.match(/([0-9])/)){
            $("#error").show();
            $('#error_show1').html('Please use Both uppercase and lowercase!');
             v.className += " alert-danger";
        }
        else if( !password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
            $("#error").show();
            $('#error_show1').html('Please use special character!');
             v.className += " alert-danger";
        }
        else if( !password.length > 7){
            $("#error").show();
            $('#error_show1').html('Please use more than 8 Character!');
             v.className += " alert-danger";
        }
      
		else{
            
			$.ajax({
				url: "login_reg_insert.php",
				type: "POST",
				data: {
					type: 1,
					name: name,
                    email: email,
                    username: username,
					phone: phone,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#error").show();
                        $('#error_show1').html('Registration successfull Go to Login !'); 	
                         v.className += " alert-success";
                         $('#register_form').val('');					
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
                        $('#error_show1').html('Email ID already exists !');
                         v.className += " alert-danger";
                        
                    }
                    else if(dataResult.statusCode==202){
						$("#error").show();
                        $('#error_show1').html('Username already exists !');
                         v.className += " alert-danger";
                    }
                    else if(dataResult.statusCode==203){
						$("#error").show();
                        $('#error_show1').html('Not Inserted !');
                         v.className += " alert-danger";
                        
                    }
                    else if(dataResult.statusCode==204){
						$("#error").show();
                        $('#error_show1').html('Please fill all the field!');
                         v.className += " alert-danger";
                        
					}
					
				}
			});
		}
		
    });
    
    // login
	$('#butlogin').on('click', function() {
        $("#error1").hide();
        var v = document.getElementById("error1");
        var username = $('#email_log').val();
        var password = $('#password_log').val();
        setTimeout(function() { $("#error1").fadeOut(1000); }, 3000);	
        if(username=="" && password=="" ){
            $("#error1").show();
            $('#error_show12').html('Please fill all the field!');
            v.className += " alert-danger";
        } 
		else {
			$.ajax({
				url: "login_reg_insert.php",
				type: "POST",
				data: {
					type:2,
                    username: username,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "home.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error1").show();
                        $('#error_show12').html('Invalid EmailId or Password !');
                        v.className += " alert-danger";
					}
					
				}
			});
		}
		
	});
});
