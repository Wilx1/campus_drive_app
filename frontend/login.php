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
    <!-- <script src="js/sweetalert2.all.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Campus Drive</title>

    <!-- Vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="css/slim.css">

  </head>
  <style>
    .hide{
      display: none;
    }
    .signin-title-primary{
      font-size: 24px;
      font-weight: bold;
    }

  </style>
  <body>

    <div class="signin-wrapper">

      <div class="signin-box">
        <h1 class="slim-logo text-center"><img src="img/logo.svg" alt="Campus drive logo"></h1>
        <h4 class="signin-title-primary">Log In</h4>
        <small class="signin-title-secondary">Please input your details to access your account</small>

        <div class="form-group bd text-center my-3 py-2" style="vertical-align: middle;">
        <!-- <i class="fa fa-google" aria-hidden="true"></i> Login with Google -->
        <svg width="17px" height="17px" viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>

        </defs>
          <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Color-" transform="translate(-401.000000, -860.000000)">
                  <g id="Google" transform="translate(401.000000, 860.000000)">
                      <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05">

      </path>
                      <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335">

      </path>
                      <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853">

      </path>
                      <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4">

      </path>
                  </g>
              </g>
          </g>
      </svg>
        <span>Login with Google</span>
        </div><!-- form-group -->
        <div class="form-group text-center">
        OR
        </div><!-- form-group -->
        
            <form onsubmit="login.submit(event)" id="login_form" method="POST">
            <div class="js-error-banner hide" style="background-color:#ffb7b7; color: #7b0000;padding: 10px;text-align: center;">
              Please fix the login errors below!
            </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
                    <small class="error error-email hide" style="color: red;display: block;"></small>
                </div><!-- form-group -->
                
                <div class="form-group mb-2">
                    <input type="password" class="form-control" placeholder="Enter password" name="password" id="password">
                    <small class="error error-password hide" style="color: red;display: block;"></small>
                </div><!-- form-group -->
                <small class=""><a href="" data-toggle="modal" data-target="#modaldemo1">Forgot password</a></small>
                <input type="submit" name="submit" formmethod="post"  class="mt-3 btn btn-block bg-black-8 text-white">
                <!-- <button type="submit" name="submit" class="mt-3 btn btn-block bg-black-8 text-white">Submit</button> -->
            </form>
        </div><!-- signin-box -->
    </div><!-- signin-wrapper -->

    <div id="modaldemo1" class="modal fade effect-rotate-bottom">
      <div class="modal-dialog modal-sm modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="put" id="forgot_password_form">
            <div class="modal-body pd-25">
              <h5 class="lh-3 mg-b-4 text-center">Change Password</h5>
              <p class="text-center"><small>You are required to change your password to  strong one that only you would know</small></p>
              
              <div class="form-group mg-b-20">
              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
              </div><!-- form-group -->
          
              <div class="form-group  mg-b-20">
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password">
              </div><!-- form-group -->
                          
              <button type="submit" class="text-white js-button btn btn-block bg-black-8">Submit</button>
            </div>
          </form>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
    <script>
         let api_url = "../courses/forgot_password.php";
        //  let api_url = "../login/login.php";
        $('#forgot_password_form').submit(function(event){
            event.preventDefault();
            let new_password = document.getElementById('new_password').value;
            let confirm_password = document.getElementById('confirm_password').value;

            let data = {
                "confirm_password": confirm_password
            }
            // alert(email)
            $.ajax({
                url: api_url,
                type: 'PUT',
                crossDomain: true,
                data:JSON.stringify(data),
                success: function(response){
                    let res = response
                    let status = res.success 
                    if(response.success == "1"){
                        new swal('Password changed successfully', info);
                        window.location.reload(1);
                    }else{
                        new swal(res.message, error);
                        console.log(res);
                        console.log(data);
                    
                    }
                }

            })
            
        })

        const login = {

        uploading: false,

        submit: function(e){

          e.preventDefault();

          if(login.uploading){
            alert("Already uploading. please wait...");
            return;
          }

          let button = document.querySelector(".js-button");
          button.innerHTML = `Saving...`;

          let myform = new FormData();
          myform.append('data_type','user_login');

          //get all inputs
          let inputs = e.currentTarget.querySelectorAll("input,select,teaxtarea");
          for (var i = 0; i < inputs.length; i++) {
    myform.append(inputs[i].name,inputs[i].value.trim());
  }

  login.uploading = true;
  let xhr = new XMLHttpRequest();
  xhr.addEventListener('readystatechange',function(){

    if(xhr.readyState == 4)
    {
      login.uploading = false;
      let button = document.querySelector(".js-button");
       button.innerHTML = `LOGIN`;

      if(xhr.status == 200)
      {
        //console.log(xhr.responseText);

        let obj = JSON.parse(xhr.responseText);
        document.querySelector(".js-error-banner").classList.add("hide");

        if(obj.success && obj.data_type == "user_login")
        {
          // alert("Login successful");
          new swal({
            title: "Login successful",
            text: "Welcome to Campus Drive!",
            icon: "success",
            buttons: true,
          })
          .then((login) => {
            if (login) {
              
              window.location.href = 'dashboard/index.php';
            } 
          });

        }else{

          //errors
          let form = document.querySelector("form");
          
          //empty old error messages
          let errors = document.querySelectorAll(".error");
          document.querySelector(".js-error-banner").classList.remove("hide");

          for (var i = 0; i < errors.length; i++) {
            errors[i].innerHTML = "";
            errors[i].classList.add("hide");

          }

          //show new errors
          for(key in obj.errors){

            let item = document.querySelector(".error-"+key);
            item.innerHTML = obj.errors[key];
            item.classList.remove("hide");
          }
        }

      }else{
        console.log(xhr.responseText);
      }

    }
  });

  xhr.open('post','../inc/api.php',true);
  xhr.send(myform);

},

}
    </script>
    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>

    <script src="js/slim.js"></script>

  </body>
</html>
