<html>
    <head>
        <title></title>
      <script src="assets/js/jquery/jquery.min.js"></script>

    </head>
    <body>
        <h1>Hi</h1>
            <?php

            $timestamp = time();
            $student_code = 'STU-'.str_shuffle(substr($timestamp, 0, 6));
            echo $student_code;
            $my_code = "STU-341960";
            ?>
            <form action="upload-file.php" enctype="multipart/form-data" method="POST">
            <input type="text" value="<?php echo $my_code; ?>" name="student_num">

            Upload file here: 
            <input type="file" name="file" id="image">
            <button>Upload</button>
            </form>

            <?php
            //To make the files downloadable
            // $files = scandir($my_code);
            // for( $i = 2; $i < count($files); $i++){
                ?>
                <!-- <p> <a download="<?php  //echo $my_code .'/'. $files[$i]; ?>" href="<?php //echo $my_code .'/'. $files[$i]; ?>"> <?php  //echo $files[$i]; ?> </p> -->
            <?php
            // };
            ?>
            <form id="login-form" action="form.php" method='post'>
                <!-- <div class="form-group">
                    <label for="username" class="control-label text-success">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label text-success">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div> -->
                <input type="checkbox" name="course_list[]" value="One" id="">One<br>
                <input type="checkbox" name="course_list[]" value="Two" id="">Two<br>
                <input type="checkbox" name="course_list[]" value="Three" id="">Three<br>
                <input type="checkbox" name="course_list[]" value="Four" id="">Four<br>
                <input type="checkbox" name="course_list[]" value="Five" id="">Five<br>
                
                <centre><input type="submit" class="btn-sm btn-block btn-wave col-md-4 btn-success" name="submit" value="Submit"></centre>
            </form>
            <script>
                // $('#login-form').submit(function(e){
                //     e.preventDefault()
                //     $('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
                //     if($(this).find('.alert-danger').length > 0 )
                //         $(this).find('.alert-danger').remove();
                //     $.ajax({
                //         url:'login/login.php?action=login',
                //         method:'POST',
                //         data:$(this).serialize(),
                //         error:err=>{
                //             console.log(err)
                //     $('#login-form button[type="button"]').removeAttr('disabled').html('Login');

                //         },
                //         success:function(resp){
                //             if(resp == 1){
                //                 location.reload('index.php?page=home');
                //             }else{
                //                 $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
                //                 $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
                //             }
                //         }
                //     })
                // })
            </script> 
    </body>
</html>