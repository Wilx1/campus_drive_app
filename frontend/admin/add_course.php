<?php include "../dashboard/header.php"; ?>
<link rel="stylesheet" href="style.css">
</head>
<body>
        <!-- navbar -->
        <?php include "../dashboard/navbar.php"; ?>
        <!-- navbar -->
        <!-- sidebar -->
       <?php include "../dashboard/sidebar.php"; ?>
        <!-- sidebar -->
       
        <section class="page-content">
            
            <section class="grid">
                <article class="body">
                    <div class="body-content">
                        <h5>Add Course</h5>
                        <label class="form-control-label">Course: <span class="tx-danger">*</span></label>

                        <form id="add_course">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Add Course code" name="course_code" id="course_code">
                                    </div><!-- form-group -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Add Course title" name="course_title" id="course_title">
                                    </div><!-- form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Lecturer: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="lecturer" id="lecturer" data-placeholder="Choose lecturer">
                                            <option label="Choose Lecturer" selected disabled></option>
                                            
                                        </select>
                                    </div><!-- form-group -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-layout-footer">
                                        <button class="btn btn-primary bd-0" id="add_course" onclick="addCourse(event)">Add Course</button>
                                        <input class="btn btn-secondary bd-0" type="reset">
                                        </div><!-- form-layout-footer -->
                                    </div>
                                </div>
                            </div>
                        </form>

                </article>
                
            </section>
                <?php include "../dashboard/footer.php"; ?>
            </section>
        <!-- content -->
        <script>
            //  let api_url = "http://localhost/campus_drive/";
             let api_url = "/";
             let lecturer = document.getElementById("lecturer")

             $(document).ready(function () {
                // =====load lecturers======
                $.ajax({
                url: api_url+"lecturers/read.php",
                type: "GET",
                crossDomain: true,
                data: {},
                success: function (response) {
                    let data = response
                    data = data.data
                    console.log(data)
                    
                    for (i = 0; i < data.length; i++) {
                        let option = document.createElement("option")

                        option.value = data[i].lecturer_name
                        option.text = data[i].lecturer_name

                        // console.log(option.value)
                        lecturer.add(option)
                    }
                },
                error: function (error) {
                    console.log(error)
                    console.log("Could not load lecturers")
                },
                })
                // =====load lecturers======
             })

            //  submit form--------------------------
            
            //  let api_url = "../login/login.php";
            // $('#add_course').click(function(event){
            function addCourse(event){
                event.preventDefault();
                let course_code = document.getElementById('course_code').value;
                let course_title = document.getElementById('course_title').value;
                let lecturer = document.getElementById('lecturer').value;
                let data = {
                    "course_code": course_code,
                    "course_title": course_title,
                    "lecturer": lecturer
                }
                // alert(email)
                $.ajax({
                    url: api_url+"courses/create.php",
                    type: 'POST',
                    crossDomain: true,
                    data:JSON.stringify(data),
                    success: function(response){
                        let res = response
                        let status = res.status 
                        // console.log(res)
                        if(status == "201"){
                            alert('Course created successfully');
                            // location.replace("http://localhost/campus_drive/frontend/admin/student_list.php");
                            location.replace("student_list.php");
                            // window.location.href = "http://google.com";
                        }else{
                            alert(res.message);
                            console.log(res);
                            console.log(data);
                        }
                    }

                })
            }
            // })
            //  submit form--------------------------
        </script>
    </body>
</html>