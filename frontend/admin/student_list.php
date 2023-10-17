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
                    <div class="section-wrapper">
                    <label class="section-title">STUDENT LIST</label>
                    <p class="mg-b-20 mg-sm-b-40"></p>

                    <div class="table-responsive">
                        <table class="table mg-b-0">
                        <thead>
                            <tr>
                            <th>S/N</th>
                            <th>STUDENT NAME</th>
                            <th>STUDENT CODE</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
                            <th>LEVEL</th>
                            <th>DEPARTMENT</th>
                            </tr>
                        </thead>
                        <tbody id=tbody>
                           
                        </tbody>
                        </table>
                    </div><!-- table-responsive -->
                    </div><!-- section-wrapper -->
                    </div>


                </article>
                
            </section>
                <?php include "../dashboard/footer.php"; ?>
            </section>
        <!-- content -->
        <script>
             let api_url = "http://localhost/campus_drive/";

            $(document).ready(()=>{
                let tbody = document.getElementById('tbody');
                $.ajax({
                    url: api_url+"students/read.php",
                    type: 'GET',
                    crossDomain: true,
                    data: {},
                    success: function (res){
                        let data = res.data
                        let status = res.status
                        if(status == 200){
                            // alert("success");
                            console.log(res);
                            for(i = 0; i < data.length; i++){
                                let tr = document.createElement('tr');

                                let td = `<tr>
                                    <td>${i+1}</td>
                                    <td>${data[i].student_name}</td>
                                    <td>${data[i].student_code}</td>
                                    <td>${data[i].email}</td>
                                    <td>${data[i].phone}</td>
                                    <td>${data[i].level}</td>
                                    <td>${data[i].department}</td></tr>
                                `
                                tr.innerHTML += td;
                                tbody.appendChild(tr);
                            }
                        }else{
                            alert(res.message);
                            console.log(res)
                        }
                    }
                })
            })
        </script>
    </body>
</html>