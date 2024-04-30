<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link href="../css/uniregister.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,700&family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" >
  </head>
  <body>
	<div>
    
		<div class="navbar">
		<span >
			 <a href="../index.php"><img class="logo"  src="../images/logo.png" alt="UniBridgeLogo" height="100px" width="100px"></a>
		</span>
		<span class="links">
					
					<a href="../index.php" class="navbar-item">Home</a>
					<!-- <a href="./uniregister.html" class="navbar-item">Register</a> -->
					
		</span>

    
  	<div class="container">
      <form id="form" method="post" action="../university/uniregister.php" >
        
    		<div class="box">
          <label for="firstName" class="fl fontLabel"> 

		  </label>
    			<div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
    			<div class="fr">
    					<input type="text" name="uniName" required placeholder="University/College Name"
              class="textBox" >
    			</div>
    			<div class="clr"></div>
    		</div>
    	
			<div class="box">
          <label for="email" class="fl fontLabel">  </label>
    			<div class="fl iconBox"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input id="email" type="email" required name="email" placeholder="Email address" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
			 
		
    	
    		<div class="box">
          <label for="password" class="fl fontLabel">  </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input id="password" type="Password" required name="password" placeholder="Password" class="textBox">
    			</div>

				
    			<div class="clr"></div>
    		</div>
			<div class="box">
				<label for="password" class="fl fontLabel"> </label>
					  <div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
					  <div class="fr">
							  <input id="cpassword" type="Password" required name="cpassword" placeholder=" Confirm Password" class="textBox">
					  </div>
	  
					  
					  <div class="clr"></div>
				  </div>
    
    	
    		
    		<div class="box" style="background: transparent">
    			<input onsubmit="validatePassword()" type="Submit" name="Submit" class="submit" value="SUBMIT">
    		</div>
    		
      </form>
  </div>
  
 
  </body>
   
  <script>
	
	function validatePassword(){
	  var password = null;
	  password = document.getElementById("password");
	  var confirm_password = null;
	  confirm_password= document.getElementById("cpassword");
	  var minNumberofChars = 8;
      var maxNumberofChars = 16;
	  var re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
	  
	  if(password.value.length < minNumberofChars || password.value.length > maxNumberofChars){
		
		password.setCustomValidity("Passwords should be between 8 to 16 characters long.");
	  } else if(!re.test(password.value)){
		
		password.setCustomValidity("Passwords should contain atleast one number and one special character.");
	  }else if(password.value !== confirm_password.value) {
		confirm_password.setCustomValidity("Passwords don't match.");
	  } else {
		password.setCustomValidity("");
		confirm_password.setCustomValidity("");
		document.getElementsByClassName("submit").submit;
		
		
	  }
	}
	</script>
</html>
