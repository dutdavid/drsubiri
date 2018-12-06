
<?php
require_once "includes/db_connect.php";
?>


<div class="div-1">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
.form-textbox, .form-textarea, .form-radio-other-input, .form-checkbox-other-input, .form-captcha input, .form-spinner input {
background-color: rgba(46, 97, 132, 0.5) !important;
}
#signin,#signuppanel{
  z-index: 80;
  background: rgba(0, 0, 0, 0.6);
  border: none!important;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
}
</style>
<body style="background: url('https://tec.mx/sites/default/files/2017-12/Footbal_Men_Two_Legs_492484_1920x1080.jpg');background-repeat: no-repeat!important;background-size: cover; height: 100% !important;" class="img-responsive">

<div class="bg">
</div>
  <br>
  <br>
  <br>
  <br>
  <br>
    <br>
    <style type="text/css" media="all">

</style>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="">                    
            <div class="panel panel-info" id="signin">
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form method = "POST" action = "data_process/processes.php" autocomplete = "off" accept-charset="UTF-8">
                                    
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username"  placeholder="username">                                        
                                    </div>
                                
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                   
                                    <div class="input-group" style="color: white;">
                                      <div class="checkbox">
                                        <label>
                                           Remember me
                                        </label>
                                        <input id="login-remember" type="checkbox" name="remember">
                                      </div>
                                    </div>

                                    <div style="margin-top:10px" class="form-group">
                                        <!-- Button -->

                                        <div class="col-sm-12 controls">

                                         <button id="btn-login" class="btn btn-success" name="login" type="submit"><a href="home.php"> Login </a> </button>
                                    
                                        </div>
                                    </div>
                               

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        
                                      <div class="input-group" style="color: white;">

                                            Don't have an account?
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info" id="signuppanel">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" action="data_process/processes.php" class="form-horizontal" role="form" method = "POST" enctype="multipart/form-data" >
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                  
                                
                                <div class="form-group" style="color: #fff;">
                                    <label for="people_name" class="col-md-3 control-label">Full Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="YourName" placeholder="Full Name">
                                    </div>
                                </div>

                                <div class="form-group" style="color: #fff;">
     <label for="people_username" class="col-md-3 control-label">Choose Role</label>
    <select class="form-control form-control-md" name="userRole"  id="userRole" required />
        <option value = "" > Choose Role </option>
        <option value = "Admin" > Admin </option>
        <option value = "User" > Author </option>
        
        
        </select>
  </div>


                <div class="form-group" style="color: #fff;">
                                    <label for="people_username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="UserName" placeholder="Username">
                                    </div>
                                </div>
                <div class="form-group" style="color: #fff;">
                                    <label for="people_email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        
                                        <input type="text" class="form-control" name="Email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                               
                                    
                              
                                <div class="form-group" style="color: #fff;">
                                    <label for="people_password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    </div>

                                    <div class="form-group" style="color: #fff;">
                                    <label for="people_password" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="ConfPass" placeholder="Password">
                                    </div>
                                    </div>
                  
                                <div class="form-group" style="color: #fff;">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" name="signup"class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                        <span style="margin-left:8px;">or</span>  
                                    </div>
                                </div>
                                
                               
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    </body>