<?php
    include('header.php');
    include('functions.php');
    include('connection.php');
    $formEmail=$formPass=$loginError="";

    
    if(isset($_SESSION['loggedInUser'])){
        
        if($_SESSION['loggedInUserType']=="doctor"){
         
       header('Location: http://' . $_SERVER['HTTP_HOST'] .'/pms/admin/');
    
 
            
        }
        else{
          header('Location: http://' . $_SERVER['HTTP_HOST'] .'/pms/');
    
        }
              
       
   
    }
   
    

    if(isset($_SESSION['lockCheckEmail'])){
   
        $loginEmail = $_SESSION['lockCheckEmail'];
    }
    

     if (isset($_COOKIE['time_limit'])) {
        $num_tries = $_COOKIE['auth_attempts'];
        $expire_time = $_COOKIE['time_limit'];
    } 
    else { 
        setcookie('auth_attempts', 1,  time()+90); 
        setcookie('time_limit', time()+90, time()+90);   
        $num_tries = @$_COOKIE['auth_attempts'];  
        $expire_time = @$_COOKIE['time_limit']; 
    }
        
      if ($num_tries > 3) {
        $lockout_time = time() + 100; 
     
        mysqli_query($conn,"UPDATE users SET lock_user = $lockout_time WHERE email='$loginEmail'");
          
          setcookie('auth_tries', '', time()-3600);
            setcookie('time_limit', '', time()-3600);
        die(print("<div class='alert alert-danger'>You have failed to log in 3 times in 1.5 minutes!  You must wait two minutes before attempting to log in again.</div>"));
          
    }


    if(isset($_POST['login'])) {
        
    
       
        
        $formEmail=validateFormData($_POST['email']);
        $formPass =validateFormData($_POST['password']);
        
        $checklock = mysqli_query($conn,"SELECT lock_user FROM users WHERE email='$formEmail' or contact ='$formEmail' ");
     
        $row = mysqli_fetch_assoc($checklock);
        $checklock_result = $row['lock_user'];
        
       
        
        if ($checklock_result > time()) {  
            die(print("<div class='alert alert-danger'>You must wait two minutes to attempt to log in again!</div>")); 
        } 
        
        else  {
        $query="SELECT * FROM users WHERE email='$formEmail' or contact ='$formEmail'";
      
        $result = mysqli_query($conn, $query);
        if ($result==false)
            echo "No data found ";
        
        
        if(mysqli_num_rows($result)>0) {
            while($row=mysqli_fetch_assoc($result)) {
                $user_id =$row['user_id'];
                $firstName =$row['firstName'];
                $lastName =$row['lastName'];
              
                $user_type =$row['user_type'];
                $pass = $row['password'];
            }
            
            if($formPass==$pass) {
                $_SESSION['loggedInUser'] = $firstName;
                
               
                $_SESSION['loggedInUser_id'] = $user_id;
                
                $_SESSION['loggedInUserType'] = $user_type;
            
            setcookie('auth_tries', '', time()-3600);
            setcookie('time_limit', '', time()-3600);
               
                if($_SESSION['loggedInUserType']=="doctor"){
                     header('Location: http://' . $_SERVER['HTTP_HOST'] .'/pms/admin/');
    
                }
        
                else if($_SESSION['loggedInUserType']=="patient"){
                    header('Location: http://' . $_SERVER['HTTP_HOST'] .'/doctor/');
    
                }
                
                
            }
             else {
                 
                 $_SESSION['lockCheckEmail'] = $formEmail;
                 
                 $loginError = "<div class='alert alert-danger'>Wrong username/Password combination. Try again.</div>" ;
                    $num_tries++; 
             setcookie('auth_attempts', $num_tries, $expire_time); 
      
           
                 
             }
        }
         
        else {
             
            
            $loginError = "<div class='alert alert-danger'>No such user in database. Please try again. <a class ='close' data-dismiss='alert'>&times;</a></div>" ;
              
            
            
            }
           
        }
    
    }

   
    //$password = password_hash("pasha", PASSWORD_DEFAULT);
    //echo $password;
?>
<div class="container">
      <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
        <h1 class="page-header">Log In</h1>
        
        <?php echo $loginError; ?>
        <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
          
            <div class="form-group">
                <label class="">Email or Phone</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email or phone" id="login_email" value="<?php echo $formEmail?>" >
            </div>
            <div class="form-group">
                <label class="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" id="login_password">
            </div> 
            <button class="btn btn-primary col-sm-2" type="submit" name="login">Login</button>
            
        </form>
        <br> <br> <br> <br>
        id: admin  <br> pass: admin
                </div>
            </div>
</div>
<br>
<br>
<br>
<br>


<br>
<br>
<br>
<?php include('footer.php') ?>