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
                        <h5>Add Student</h5>
                        
                        <form id="add_student">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="form-control-label" for="student_name">Name: <span class="tx-danger">*</span></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter your name" name="student_name" id="student_name">
                                    </div><!-- form-group -->
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="email">Email: <span class="tx-danger">*</span></label>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email">
                                    </div><!-- form-group -->
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="phone">Phone number: <span class="tx-danger">*</span></label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Enter your phone number" name="phone" id="phone">
                                    </div><!-- form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label" for="department">Department: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="department" id="department" data-placeholder="Choose department">
                                            <option label="Choose Department" selected disabled></option>
                                        </select>
                                    </div><!-- form-group -->
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mg-b-10-force">
                                        <label class="form-control-label">Level: <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="level" id="level" data-placeholder="Choose level">
                                            <option label="Choose level" selected disabled></option>
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
             let api_url = "http://localhost/campus_drive/";
             let student_name = document.getElementById("student_name")
             let email = document.getElementById("email")
             let phone = document.getElementById("phone")
             let level = document.getElementById("level")
             let department = document.getElementById("department")

            $(document).ready(function () {
                // =====load levels======
                $.ajax({
                url: api_url+"students/get_level.php",
                type: "GET",
                crossDomain: true,
                data: {},
                success: function (response) {
                    let data = response
                    data = data.data
                    console.log(data)
                    
                    for (i = 0; i < data.length; i++) {
                        let option = document.createElement("option")

                        option.value = data[i].level
                        option.text = data[i].level

                        // console.log(option.value)
                        level.add(option)
                        }
                    },
                    error: function (error) {
                        console.log(error)
                        console.log("Could not load levels")
                    },
                })
                // =====load levels======
                // =====load depts======
                $.ajax({
                url: api_url+"students/get_department.php",
                type: "GET",
                crossDomain: true,
                data: {},
                success: function (response) {
                    let data = response
                    data = data.data
                    // console.log(data)
                    
                    for (i = 0; i < data.length; i++) {

                        let option = document.createElement("option")
                        
                        option.value = data[i].department
                        option.text = data[i].department
                        department.add(option)
                        }
                    },
                    error: function (error) {
                        console.log(error)
                        console.log("Could not load departments")
                    },
                })
                // =====load department======
            })

            //  submit form--------------------------
         
            function addCourse(event){
                event.preventDefault();
              
                let data = {
                    "student_name": student_name.value,
                    "email": email.value,
                    "level": level.value,
                    "department": department.value,
                    "phone": phone.value
                }
                // alert(email)
                $.ajax({
                    url: api_url+"students/create.php",
                    type: 'POST',
                    crossDomain: true,
                    data:JSON.stringify(data),
                    success: function(response){
                        let res = response
                        let status = res.status 
                        // console.log(res)
                        if(status == "201"){
                            alert('Student created successfully');
                            location.replace("http://localhost/campus_drive/frontend/admin/course_list.php");
                            // window.location.href = "http://google.com";
                        }else{
                            alert(res.message);
                            console.log(res);
                            console.log(data);
                        }
                    }

                })
            }
            //  submit form-------------------------
        </script>
    </body>
</html>