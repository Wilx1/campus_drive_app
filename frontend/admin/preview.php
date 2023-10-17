<?php include "../dashboard/header.php"; ?>

<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
    thead{
        box-shadow: -3px 10px 12px 0px rgba(194,178,178,0.64);
        -webkit-box-shadow: -3px 10px 12px 0px rgba(194,178,178,0.64);
        -moz-box-shadow: -3px 10px 12px 0px rgba(194,178,178,0.64);
    }
    .preview_content{
        width: 100%;
        height: 100%;
        background-color: #fff;
    }
</style>
<body>
    <?php $page_title = "Favourites"; ?>
        <!-- navbar -->
        <?php include "../dashboard/navbar.php"; ?>
        <!-- navbar -->
        <!-- sidebar -->
       <?php include "../dashboard/sidebar.php"; ?>
        <!-- sidebar -->
       
        <section class="page-content">
            <div class="preview_content">

            <div class="table-responsive table_div_preview">
                <table id="table" oncontextmenu="submenu.show(event)" class="table mg-b-0">
                <thead class="">
                    <!-- <tr> -->
                    <!-- <th>S/N</th> -->
                    <th>File Name</th>
                    <th>Favorite</th>
                    <th>File Type</th>
                    <th>Date updated</th>
                    <th>Size</th>
                    <!-- </tr> -->
                </thead">
                <tbody id="table-body">
                
                </tbody>
                
            </table>
            <div class="js-preview-card" style="padding:10px;text-align:center;">
                <i class="bi bi-eye"></i> Preview unavailable
            </div>
        </div>

              
                   <!-- <div style="text-align: center;">Loading file, please wait...</div> -->
       
                <?php //include "../dashboard/footer.php"; ?>

            </div>
        </section>
        <!--sub menu-->
        <div id="submenu" class="submenu hide" style="position: absolute;" >
            
            <div onclick="table.preview_file()" class="js-preview-button class_46" >
                <i class="fa fa-eye class_17"></i>
                <div class="class_9"  >
                    Preview
                </div>
            </div>
            <div onclick="table.download_file()" class="js-download-button class_46" >
                <i class="fa fa-cloud-download-fill class_17"></i>
                <div class="class_9">
                    Download
                </div>
            </div>
            <div class="class_46" >
                <i class="fa fa-pencil-square class_17"></i>
                <div class="class_9">
                    Edit
                </div>
            </div>
            <div class="class_46" >
                <i class="fa fa-folder class_17"></i>
                <div class="class_9">
                    Move
                </div>
            </div>
            <div onclick="table.delete_row()" class="class_46" >
                <i class="fa fa-trash class_17"></i>
                <div class="class_9"  >
                    Delete
                </div>
            </div>
            <!-- <div onclick="table.restore_row()" class="js-restore-button class_46" >
                <i class="fa fa-arrow class_17"></i>
                <div class="class_9"  >
                    Restore
                </div>
            </div> -->
            
            <div class="class_46" onclick="action.show_share_file()" >
                <i class="fa fa-share-alt class_17"></i>
                <div class="class_9"  >
                    Share
                </div>
            </div>
            <div onclick="table.remove_from_favorites()" class="js-favorites-button class_46" >
                <i class="fa fa-star class_17"></i>
                <div class="js-favorites-text class_9"  >
                    Remove from favorites
                </div>
            </div>
        </div>
        <!--end sub menu-->
        <!-- BASIC MODAL -->
        <div id="upload_modal" class="modal fade effect-rotate-bottom">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Upload File</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <!-- <h5 class="lh-3 mg-b-20"><span class="tx-inverse hover-primary">Why We Use Electoral College, Not Popular Vote</span></h5> -->
                    <label class="drop-zone" ondrop="upload.drop(event)" ondragover="upload.dragOver(event)" ondragleave="upload.dropZone.removeHighlight()">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        Drag and drop files here or click to upload.
                        <input onchange="upload.send(this.files)"type="file"  class="hide" multiple>
                        
                    </label>    
                    <p style="margin-left: 10px;">Uploaded Files</p>                
                    <div class="js-prog-holder hde class_13" style="position: static;height: auto;" >
                        <div class="class_14" >
                            <div class="js-prog class_15" ></div>
                        </div>
                        <div class="js-prog-text class_9 class_17"  >
                            1%
                        </div>
                        <button onclick="upload.cancel()" class="class_42"  >
                            Cancel Upload
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <!-- <button type="button" onclick="upload.send()" class="btn btn-block btn-dark bg-black-8" data-dismiss="modal">Close</button> -->
                </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        <!-- content -->
        <script>
            var LOGGED_IN = false;
            var USERNAME = false;
            var tbody = document.querySelector("#table-body");
        
            const action = {

            uploading: false,
            cancelled: false,

            get_file: function()
            {
                let params = get_url_params();
                tbody.innerHTML = `<tr><td colspan="10" style="text-align:center">Loading file... please wait!</td></tr>`;

                let obj = {};
                obj.data_type = 'preview_file';
                obj.slug = typeof params['id'] === 'undefined' ? "" : params['id'];
                action.send(obj);
            },

            send: function(obj)
            {

                if(action.uploading){
                    alert("Please wait for the upload to complete!");
                    return;
                }

                action.uploading = true;
                action.cancelled = false;
                let myform = new FormData();
                
                for (key in obj) {
                    myform.append(key,obj[key]);
                }

                let xhr = new XMLHttpRequest();

                xhr.addEventListener('error',function(e){
                    alert("An error occured! Please check your connection");
                });

                xhr.addEventListener('readystatechange',function(){

                    if(xhr.readyState == 4)
                    {
                        if(xhr.status == 200)
                        {
                            
                            action.handle_result(xhr.responseText)

                        }else{
                            console.log(xhr.responseText);
                            alert("An error occured! Please try again later");
                        }

                        action.uploading = false;
                    }
                });

                xhr.open('post','../../inc/api.php',true);
                xhr.send(myform);

            },

            handle_result: function(result)
            {
                console.log(result);
                let obj = JSON.parse(result);
                
                //display usename
                if(!USERNAME){
                    USERNAME = obj.username;
                    document.querySelector(".username").innerHTML = obj.username;
                }

                if(obj.success)
                {
                    //populate table
                    tbody.innerHTML = "";

                    let tr = document.createElement('tr');
                    tr.setAttribute('id','tr_0');
                    tr.setAttribute('type','file');

                    let star = '';
                    star = '<i class="bi bi-star class_34"></i>';
                    if(obj.row.favorite == 1)
                        star = '<i class="bi bi-star-fill class_34" style="color:rgb(255, 21, 226)"></i>';
                
                    let download_link = "";
                    download_link = `
                    <a href="../../inc/download.php?id=${obj.row.id}">
                        <i class="bi bi-cloud-download-fill class_34"></i>
                    </a>`;


                    tr.innerHTML = `
                        <td style="max-width: 200px;" >${obj.row.file_name}</td>
                        <td>${star}</td>
                        <td style="max-width: 200px;">${obj.row.file_type}</td>
                        <td>${obj.row.date_updated}</td>
                        <td>${obj.row.file_size}</td>
                        <td>
                            ${download_link}
                        </td>
                    `;
                    tbody.appendChild(tr);

                    //display a preview if possible
                    let previewable = ['image/jpeg','video/mp4','audio/mpeg'];
                    console.log(obj.row.file_type)
                    if(previewable.includes(obj.row.file_type))
                    {
                        let str = "";
                        if(obj.row.file_type == 'image/jpeg')
                        {
                            str = `<img src="../../inc/${obj.row.file_path}" style="max-width:50%;object-fit: contain; box-sizing:border-box;">`;
                            console.log(obj.row.file_path)
                        }else
                        if(obj.row.file_type == 'video/mp4')
                        {
                            str = `
                            <video controls style="width:50%;">
                                <source src="../../inc/${obj.row.file_path}">
                            </video>`;
                        }else
                        if(obj.row.file_type == 'audio/mpeg')
                        {
                            str = `
                            <audio controls style="width:50%;">
                                <source src="../../inc/${obj.row.file_path}">
                            </audio>`;
                        }

                        document.querySelector('.js-preview-card').innerHTML = str;

                    }

                }else{
                    tbody.innerHTML = `<tr><td colspan="10" style="text-align:center">No files found!</td></tr>`;
                }


            },	

            };

            function get_url_params()
            {
            let url = window.location.search;

            url = url.trim();
            url = url.split('?');
            url = typeof url[1] === 'undefined' ? url[0] : url[1];

            url = url.split('&');
            let params = {};
            for (var i = 0; i < url.length; i++) {
                
                let parts = url[i].split("=");
                let key = parts[0];
                let value = typeof parts[1] === 'undefined' ? true : parts[1];

                params[key] = value;
            }

            return params;
            }

            action.get_file();
        </script>
        <script src="../lib/popper.js/js/popper.js"></script>
         <script src="../lib/bootstrap/js/bootstrap.js"></script>
        
    </body>
</html>