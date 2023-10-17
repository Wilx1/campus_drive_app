<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Slim">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/slim/img/slim-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/slim">
    <meta property="og:title" content="Slim">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/slim/img/slim-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <script src="js/jquery.js"></script>
    <title>Campus Drive</title>

    <!-- Vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="css/slim.css">

    <style>
        .hide{
            display: none;
        }
    </style>
  </head>
  <body>

    <div class="signin-wrapper">

      <div class="signin-box">
        <h1 class="slim-logo text-center"><img src="img/logo.svg" alt="Campus drive logo"></h1>
        <h4 class="signin-title-primary">Sign up</h4>
        <small class="signin-title-secondary">Please input your details to create your account</small>

        <div class="form-group bd text-center mt-3 py-2">
        <i class="fa fa-google" aria-hidden="true"></i> Sign up with Google
        </div><!-- form-group -->
        <div class="form-group text-center">
        OR
        </div><!-- form-group -->
        
            <!-- <form onsubmit="signup.submit(event)" id="signup_form" enctype="multipart/form-data" method="POST"> -->
            <form id="signup_form" enctype="multipart/form-data" method="POST">
                <div class="error hide error_banner" style="color: #ffb7b7; text-align: center;">
                    Please fix the errors below!
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Name" name="username" id="username">
                </div><!-- form-group -->
                <small class="error error-username hide">Enter a valid username</small>
                
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email">
                </div><!-- form-group -->
                <small class="error error-email hide">Enter a valid email</small>
                
                <div class="form-group mb-2">
                    <input type="password" class="form-control" placeholder="Enter password" name="password" id="password">
                </div><!-- form-group -->
                <small class="error error-password hide">Enter a valid password</small>
                
                <small class=""><a href="login.php">already have an account? Sign in</a></small>
                <!-- <input type="submit" name="submit" formmethod="post"  class="button mt-3 btn btn-block bg-black-8 text-white"> -->
                <!-- <input type="submit" name="submit" class="button mt-3 btn btn-block bg-black-8 text-white"> -->
                <!-- <button type="submit" formmethod="post" onclick="signup.submit(event);" class="button mt-3 btn btn-block bg-black-8 text-white">Signup</button> -->
                <button type="submit" formmethod="post" class="button mt-3 btn btn-block bg-black-8 text-white">Signup</button>
                <!-- <button type="submit" name="submit" class="mt-3 btn btn-block bg-black-8 text-white">Submit</button> -->
            </form>
        </div><!-- signin-box -->
    </div><!-- signin-wrapper -->

    <script>
         let api_url = "../login/register.php";
        //  let api_url = "../login/login.php";
        $('#signup_form').submit(function(event){
            event.preventDefault();
            let username = document.getElementById('username').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let data = {
                "username": username,
                "email": email,
                "password": password
            }
            // alert(email)
            $.ajax({
                url: api_url,
                type: 'POST',
                crossDomain: true,
                data:JSON.stringify(data),
                success: function(response){
                    let res = response
                    let status = res.status 
                    if(status == "201"){
                        new alert('Signup Complete');
                        window.location = ('login.php');
                    }else{
                        alert(res.message);
                        console.log(res);
                        console.log(data);
                    
                    }
                }

            })
            
        })

        // const signup = {
             
        //     uploading: false,
            
        //     submit: function(){
        //             e.preventDefault();
        //             alert(7);
        //             if(signup.uploading){
        //                 alert('Already uploading, please wait...');
        //                 return;
        //             }
        //             let button = document.getElementById('button');
        //             button.innerHTML = "SIGNUP";
        //             //signup
        //             let myform = new FormData();

        //             myform.append('data_type', 'user_signup');
                    
        //             //get all inputs
        //             let inputs = e.currentTarget.querySelectorAll("input, select, textarea")
        //             for(var i = 0; i < inputs.length; i++){
        //                 myform.append(inputs[i].name, inputs[i].value.trim());
        //             }
        //             signup.uploading = true;
                
        //             let xhr = new XMLHttpRequest();
        //             xhr.addEventListener('readystatechange', function(){
        //                 // console.log(xhr)
        //                 if(xhr.readyState == 4){
        //                     signup.uploading = false;
        //                     let button = document.getElementById('button');
        //                     button.innerHTML = "Saving...";
        //                     if(xhr.status == 200){
        //                         //recreating the signup
        //                         let obj = JSON.parse(xhr.responseText); 
                                
                                
        //                         if(obj.success && obj.data_type == "user_signup"){
        //                             let button = document.getElementById('button');
        //                             button.innerHTML = "Saving...";
                                    
        //                             alert('Your account was created successfully! Log in to continue');
        //                             window.location.href = 'login.php';
                                  
        //                         }else{
        //                             let form = document.querySelector("form");

        //                             //empty old error
        //                             let errors = document.querySelectorAll('.error');
        //                             for (let i = 0; i < errors.length; i++) {
        //                                 errors[i].innerHTML = "";
        //                                 errors[i].classList.add('hide');
        //                             }
        //                             //show new error
        //                             for(key in obj.errors){
        //                                 let item = document.querySelector('.error-'+key).innerHTML = obj.errors[key]
        //                                 item.innerHTML = obj.errors[key];
        //                                 item.classList.remove("hide");
        //                             }
        //                         }
                                    
        //                     }else{
        //                         alert('An error occured.')
        //                         console.log(xhr.responseText)
        //                     }
        //                 }
        //             })
        //             xhr.open('post', '../inc/api.php', true);
        //             xhr.send(myform);
        //             //signup
              
        //         },
               
                
        //     };
    </script>
    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>

    <script src="js/slim.js"></script>

  </body>
</html>