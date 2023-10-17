<?php include "../dashboard/header.php"; ?>

<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
   
 .table_header-container {
  display: flex;
  height: auto;
  align-items: center;
  justify-content: right;
}

.table_header-container > div:first-child {
    width: 20%;
    height: auto;
}
.table_header-container > div {
    /* background-color: DodgerBlue; */

    width: 10%;
    margin: 0 5px;
    justify-content: space-evenly;
    text-align: center;
    font-size: 25px;
} 
.table_header-container > div > input{
    font-size: 14px;
    height: 100px;
}
/* #search_file_icon{
   position: relative;
   right: 0;
   top: 0;
  } */
</style>
<body>
    <?php $page_title = "All Files"; ?>
        <!-- navbar -->
        <?php include "../dashboard/navbar.php"; ?>
        <!-- navbar -->
        <div class='nav_breadcrumb'>
        <i class="bi bi-house"></i>&emsp;
        Home &nbsp; <i class="bi bi-chevron-right"></i> &nbsp; All files
    </div>
        <!-- sidebar -->
       <?php include "../dashboard/sidebar.php"; ?>
        <!-- sidebar -->
        <script>
            let all_files_sidebar_item = document.getElementById('all_files_sidebar_item');
            all_files_sidebar_item.classList.add('sidebar_active_item')
       </script>
        <section class="page-content">
            
            <section class="grid">
                <article class="body">
                    <div class="body-content">
                        <div class="section-wrapper">
                        <label class="section-title">Recent</label>
                            <div class="table_header-container">
                                <div>
                                <input type="text" class="" placeholder="Search File" style="width: 100%; height: 36px; padding-left: 5px;" />
                                <!-- <i class="fa fa-search" id="search_file_icon"></i> -->
                                </div>
                                <div>
                                    <button type="button" class="btn btn-light border-dark" style="width: 100%; height: 100%;">
                                        <i class="bi bi-funnel" aria-hidden="true"></i>&emsp;<small>Filter</small>
                                    </button>
                                </div>
                                <div>
                                    
                                    <button type="button" style="width: 100%; height: 100%;" class="btn btn-dark" data-toggle="modal" data-target="#upload_modal" >
                                        <small>Upload Files</small>
                                    </button>
                                </div>  
                            </div>
                            <p class="mg-b-20 mg-sm-b-40"></p>

                            <div class="table-responsive table_div">
                                <table id="table" oncontextmenu="submenu.show(event)" class="table mg-b-0">
                                <thead class="">
                                    <!-- <tr> -->
                                    <!-- <th>S/N</th> -->
                                    <th>File Name</th>
                                    <th></th>
                                    <th>Size</th>
                                    <th>Shared with</th>
                                    <th>Last Edited</th>
                                    <th>Action</th>
                                    <!-- </tr> -->
                                </thead">
                                <tbody oncontextmenu="submenu.show(event)" onclick="table.select(event)" id="tbody">
                                
                                </tbody>
                              
                            </table>
                            <!-- <hr> -->
                        </div><!-- table-responsive -->
                        <div class="tfooter">
                            <button style="border: 0; background-color: #fff;" class="pointer" onclick="table.previous()">
                                Previous
                            </button>    
                            <span class="js-page-number" style="text-align: center, width: 100%;">1</span>
                            <button style="border: 0; background-color: #fff;" class="pointer" onclick="table.next()">
                                Next
                            </button>    
                        </div>
                        </div><!-- section-wrapper -->
                    </div>


                </article>
            </section>
            
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h6 class="offcanvas-title file_info_title" id="offcanvasRightLabel"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="row">
                        <img src="https://placehold.co/600x400/png" alt="" style="width: 300px; max-width: 300px; margin: 0 auto;">
                    </div>
                    <div class="row mt-4">
                        <h6>Details</h6>
                        <div class="col-lg-6 text-left my-2 file_info">File Type:</div>
                        <div class="col-lg-6 text-right my-2  file_info_right" id="file_info_type"></div>
                        <div class="col-lg-6 text-left my-2 file_info">File Size:</div>
                        <div class="col-lg-6 text-right my-2  file_info_right" id="file_info_size"></div>
                        <div class="col-lg-6 text-left my-2 file_info">Shared with:</div>
                        <div class="col-lg-6 text-right my-2  file_info_right" id="file_info_shared"> - </div>
                        <div class="col-lg-6 text-left my-2 file_info">Opened:</div>
                        <div class="col-lg-6 text-right my-2  file_info_right" id="file_info_date"></div>
                        <div class="col-lg-6 text-left my-2 file_info">Date Uploaded:</div>
                        <div class="col-lg-6 text-right my-2  file_info_right" id="file_info_uploaded"></div>
                    </div>
                </div>
            </div>
            <?php //include "../dashboard/footer.php"; ?>
        </section>
        <!--sub menu-->
        <div id="submenu" class="submenu hide" style="position: absolute; padding-top: 15px; padding-bottom: 15px;" >
            
            <div onclick="table.preview_file()" class="js-preview-button class_46" >
                <i class="bi bi-eye class_17s"></i>
                <div class="class_9"  >
                    Preview
                </div>
            </div>
            <div onclick="table.download_file()" class="js-download-button class_46" >
            <i class="bi bi-box-arrow-down"></i>
                <div class="class_9">
                    Download
                </div>
            </div>
            <!-- <div class="class_46"  data-toggle="modal" data-target="#rename_modal"> -->
            <div class="class_46"  onclick="table.show_rename_file()">
            <i class="bi bi-pencil-square"></i>
                <div class="class_9">
                    Rename
                </div>
            </div>
            <!-- <div class="class_46" >
                <i class="fa fa-folder class_17"></i>
                <div class="class_9">
                    Move
                </div>
            </div> -->
            <div onclick="table.delete_row()" id="delete_btn" class="class_46" >
            <!-- <div id="delete_btn" class="class_46" onclick="delete_file(event)"> -->
                <i class="bi bi-trash class_17s"></i>
                <div class="class_9"  >
                    Move to Trash
                </div>
            </div>
            <div onclick="table.show_file_info()" class="js-restore-button class_46" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="bi bi-info-square"></i>
                <div class="class_9"  >
                    File Information
                </div>
            </div>
            
            <div class="class_46" onclick="table.show_share_file()" >
            <i class="bi bi-share"></i>
                <div class="class_9"  >
                    Share
                </div>
            </div>
            <div id="fave">
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
                    <p style="margin-left: 10px;" class="hide">Uploaded Files</p>                
                    <div class="js-prog-holder hide class_13" style="position: static;height: auto;" >
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
        <!-- share modal -->
        <style>
            .file_info{
                color: #999999;
                font-size: 14px;
            }
            .file_info, .file_info_right{
                font-size: 14px;
                font-weight: 500;
            }
        .tfooter{
            text-align: right;
            padding: 4px;
            font-size: 13px;
        }
        .share_file_modal_heading{
            font-size: 18px;
            font-weight: bold;
            text-align: left;
        }
		.pointer {cursor: pointer;}
        .enter_email{
            height: 48px ;
            padding-left: 5px;
            border: 1px solid #EDEDED;
        }
        .file_access{
            padding: 10px 0;
        }
        .gen_access{
            font-size: 12;
            font-weight: 500;
            
        }
        #globe {
            font-size: 10px;
            justify-content: center;
            align-items: bottom;
            position: relative;
        }
        /* .inside_globe{
            position: absolute;
            bottom: 0;
            right: 0;
        } */
        #globe > .bi-globe{
            color: #4338CA;
            background-color: #ECEBFA;
            border: 1px solid #ECEBFA;
            padding: 4px;
            border-radius: 3px;
        }
		.access-email .email{
			flex:1;
			padding-left: 5px;
		}
		.access-email .close{
			flex:1;
			max-width: 50px;
			padding: 2px;
			text-align: center;
			cursor: pointer;
			background-color: #ffb6b6;
			color: #b50000;
		}
		.access-email{
			display: flex;
			/* background-color: #eee; */
			margin-top: 1px;
			margin-bottom: 1px;
			align-items: center;
		}

		.access-email-input button{
			flex:1;
			max-width: 50px;
			cursor: pointer;
		}
		.access-email-input input{
			flex:1;
		}
		.access-email-input{
			display: flex;
		}
        /* //switch=============== */
        .toggleSwitch {
        display: inline-block;
        height: 18px;
        position: relative;
        overflow: visible;
        padding: 0;
        margin-left: 50px;
        cursor: pointer;
        width: 40px;
        user-select: none;
    }
    .toggleSwitch label,
    .toggleSwitch > span {
        line-height: 20px;
        height: 20px;
        vertical-align: middle;
    }
    .toggleSwitch label {
        position: relative;
        z-index: 3;
        display: block;
        width: 100%;
    }
    .toggleSwitch input:focus ~ a,
    .toggleSwitch input:focus + label {
        outline: none;
    }
    .toggleSwitch input {
        position: absolute;
        opacity: 0;
        z-index: 5;
    }
    .toggleSwitch span span {
    display: none;
    }
    .toggleSwitch > span {
        position: absolute;
        left: -50px;
        width: 100%;
        margin: 0;
        padding-right: 50px;
        text-align: left;
        white-space: nowrap;
    }
    .toggleSwitch > span span {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 5;
        display: block;
        width: 50%;
        margin-left: 50px;
        text-align: left;
        font-size: 0.9em;
        width: 100%;
        left: 15%;
        top: -1px;
        opacity: 0;
    }
    .toggleSwitch a {
        position: absolute;
        right: 50%;
        z-index: 4;
        display: block;
        height: 100%;
        padding: 0;
        left: 2px;
        width: 18px;
        background-color: #fff;
        border: 1px solid #CCC;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }
    .toggleSwitch > span span:first-of-type {
        color: #ccc;
        opacity: 1;
        left: 45%;
    }
    .toggleSwitch > span:before {
        content: '';
        display: block;
        width: 70%;
        height: 80%;
        position: absolute;
        /* left: 50px;
        top: -2px; */
        background-color: #4338CA;
        border: 1px solid #ccc;
        border-radius: 30px;
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }
    .toggleSwitch input:checked ~ a {
        border-color: #fff;
        left: -100%;
        margin-left: -8px;
    }
    .photo_shares{
        height: 30px;
        width: 30px;
        border-radius: 50%;
        border: 1px solid black;
        /* padding: 3px; */
        margin: 2px 2px 2px 0;
    }
    .toggleSwitch input:checked ~ span:before {
        /* border-color: #0097D1;
        box-shadow: inset 0 0 0 30px #0097D1; */
        border-color: #6d6d6d;
        box-shadow: inset 0 0 0 30px #6d6d6d;
    }
    .toggleSwitch input:checked ~ span span:first-of-type {
        opacity: 0;
    }
    .toggleSwitch input:checked ~ span span:last-of-type {
        opacity: 1;
        /* color: yellow; */
    }
        /* //switch=============== */
        </style>
        <div class="js-share hide" onclick="this.classList.add('hide')" style="position:fixed;top:0px;left:0px;width:100vw;height:100vh;background-color:#00000088; padding-left: 20px; padding-right: 20px;">
            <div onclick="event.stopPropagation()" style="transform: translate(-50%,-50%);position:absolute;left:50%;top:50%;width:100%;max-width: 400px;min-height: 200px;background-color: white;padding:10px;;">
                <div onclick="document.querySelector('.js-share').classList.add('hide')" style="text-align:right"><button class="class_42" style="padding-top:4px;padding-bottom:4px;color: #6d6d6d; background-color: #fff; font-size: 20px;"><i class="bi bi-x"></i>
                </button></div>
                <span class="share_file_modal_heading"></i> Share File</span>

                <div class="js-share-filename" style="padding:10px;background-color:#eee; display: none"></div>
                <div style="padding:2px; margin-top: 10px;">
                        <!-- <small>Type an email and click add:</small><br> -->
                        <div class="access-email-input">
                            <input class="js-access-email-input enter_email" type="text" name="" placeholder="Enter email">
                            <button onclick="share.add(this.parentNode.querySelector('.js-access-email-input').value.trim())">Add</button><br>
                        </div>
                       
                        <div class="file_access mt-3">
                            <span class="gen_access ">General Access</span>
                             <!-- //===================== -->
                        <div class="row mt-4">
                            <div class="col-lg-1 mt-2" id="globe">
                            <i class="bi bi-globe inside_globe" id="bi-globe"></i>
                            </div>
                            <div class="col-lg-9" class="inside_globe">
                            Anyone with this link can view 
                            </div>
                            <div class="col-lg-2 inside_globe">
                            <label class="toggleSwitch nolabel" onclick="">
                            <input type="checkbox" />
                                <span>
                                    <span></span>
                                    <span></span>
                                </span>
                            <a></a>
                            </label>
                            </div>
                        </div>
                        <!-- //===================== -->
                            <div> 
                            
                            
                        </div>

                        </div>
                        <div class="js-access-email-holder" style="max-height: 100px; height: 100px;overflow-y: auto;">

                        </div>
                        
                    </div>
                <!-- <div style="text-align:left;padding: 10px;border: solid thin #eee;"> -->
                    <!-- <label>
                        <input class="radio js-share-mode-0" type="radio" value="0" name="share"> Dont Share
                    </label><br>
                    <label>
                        <input class="radio js-share-mode-2" type="radio" value="2" name="share"> Share to public
                    </label><br>
                    <label>
                        <input class="radio js-share-mode-1" type="radio" value="1" name="share"> Share to specific people
                    </label><br> -->
                  
                    <br>
                    
                    <!-- <label>File link:</label><br>
                    <input class="js-share-link" value="" type="text" style="width:100%;padding:1em;border: solid thin #ccc;" name="link"> -->

                <!-- </div> -->
                <button onclick="table.share_file(this)" class="class_42s next" style="width:100px;border: 0; background-color: #fff;"><i class="bi bi-link-45deg"></i>Copy Link</button>
            </div>
        </div>
        <!-- rename file modal -->
        <div class="js-rename hide" onclick="this.classList.add('hide')" style="position:fixed;top:0px;left:0px;width:100vw;height:100vh;background-color:#00000088; padding-left: 20px; padding-right: 20px;">
            <div onclick="event.stopPropagation()" style="transform: translate(-50%,-50%);position:absolute;left:50%;top:50%;width:100%;max-width: 400px;min-height: 200px;background-color: white;padding:10px;;">
                <div onclick="document.querySelector('.js-rename').classList.add('hide')" style="text-align:right"><button class="class_42" style="padding-top:4px;padding-bottom:4px;color: #6d6d6d; background-color: #fff; font-size: 20px;"><i class="bi bi-x"></i>
                </button></div>
                <span class="rename_file_modal_heading"></i> Rename File</span>

                <p class="mg-b-5">
                    <input type="text" class="txt_rename form-control" id="txt_rename" placeholder="File Name Here">
                </p>
                <p class="text-right">
                    <button type="reset" style="width: 100px;" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                        <button type="button" onclick="table.rename_file()" style="width: 100px;" class="btn btn-dark">Save</button>
                </p>
            </div>
        </div>
        <!-- rename file modal -->
        <!-- BASIC MODAL -->
        <div id="rename_modal" class="modal fade">
        
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Rename File</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <!-- <h5 class="lh-3 mg-b-20">Rename File</h5> -->
                    <p class="mg-b-5">
                        <input type="text" class="txt_rename form-control" id="txt_rename" placeholder="File Name Here">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="width: 100px;" class="btn btn-outline-dark" data-dismiss="modal">Cancel</button>
                    <button type="button" onclick="table.rename_file()" style="width: 100px;" class="btn btn-dark">Save</button>
                </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
        <!-- content -->
        <script>
            var USERNAME = false;
            //  let api_url = "http://localhost/campus_drive/";

            // $(document).ready(()=>{
            //     let tbody = document.getElementById('tbody');
            //     $.ajax({
            //         url: api_url+"courses/read.php",
            //         type: 'GET',
            //         crossDomain: true,
            //         data: {},
            //         success: function (res){
            //             let data = res.data
            //             let status = res.status
            //             if(status == 200){
            //                 // alert("success");
            //                 console.log(res);
            //                 for(i = 0; i < data.length; i++){
            //                     let tr = document.createElement('tr');

            //                     let td = `<tr id="tr">
            //                         <!-- <td>${i+1}</td> -->
            //                         <td>${data[i].course_title}</td>
            //                         <td>${data[i].course_code}</td>
            //                         <td>${data[i].lecturer}</td></tr>
            //                         <td>2nd Jan, 2023</td></tr>
            //                         <td>
            //                             <i class="fa fa-share-alt" aria-hidden="true"></i>&emsp;
            //                             <i style="color: var(--text-color);" class="fa fa-ellipsis-h" onclick="submenu.show(this)" aria-hidden="true"></i>
            //                         </td></tr>
            //                     `
            //                     tr.innerHTML += td;
            //                     tbody.appendChild(tr);
            //                 }
            //             }else{
            //                 alert(res.message);
            //                 console.log(res)
            //             }
            //         }
            //     })
            // })
            
            const submenu = {
                show:function(e){
                    e.preventDefault();

                    table.select(e, 'rightclick');

                    let menu = document.getElementById("submenu");
                    menu.style.left = e.clientX + "px";
                    menu.style.top = (e.clientY + window.scrollY) + "px";
                    console.log("table.ROWS")
                    console.log(table.ROWS)
                    let id = table.selected.getAttribute('id').replace("tr_","");			
                    let fave_text = ''
                    if(table.ROWS[id].favourite == 1)
                    {
                        fave_text = `<div onclick="table.remove_from_favorites()" class="js-favorites-button class_46" >
                            <i class="bi bi-star-fill class_17d"></i>
                            <div class="js-favorites-text class_9"  >
                                Not Important
                            </div>
                        </div>`
                        // document.getElementById('fave').innerHTML = fave_text;
                        // document.querySelector("#submenu .js-favorites-text").innerHTML = "Remove from favorites";
                    }else{
                        fave_text = `<div onclick="table.add_to_favorites()" class="js-favorites-button class_46" >
                            <i class="bi bi-star class_17d"></i>
                            <div class="js-favorites-text class_9"  >
                                Mark as Important
                            </div>
                        </div>`

                        // document.querySelector("#submenu .js-favorites-text").innerHTML = "Add to favorites";
                    }
                    document.getElementById('fave').innerHTML = fave_text;

                    menu.classList.remove("hide");
                },

                hide:function(){
                    let menu = document.getElementById("submenu");
                    menu.classList.add("hide");
                },
            };
            const table = {
                selected : null,
                selected_id: null,
                // root_path: "http://localhost/campus_drive/frontend/admin/",
                root_path: window.location.origin + "/frontend/admin/",
                page: 1,
                ROWS: [],
                previous: function()
                {
                    table.page -= 1;
                    if(table.page < 1)
                        table.page = 1;

                    table.refresh(1,table.page);
                    document.querySelector(".js-page-number").innerHTML = table.page;
                },

                next: function()
                {
                    // alert(table.root_path);
                    table.page += 1;

                    table.refresh(1,table.page);
                    document.querySelector(".js-page-number").innerHTML = table.page;
                },
                select: function (e){
                    // let old_selected_id = table.selected_id;
                    
                    table.selected = null;

                    let tbody = document.getElementById("tbody");
                    for (var i = 0; i < tbody.children.length; i++) {
                        tbody.children[i].classList.remove("selected");
                    }

                    let item = e.target;
                    while(item.tagName != 'TR' && item.tagName != 'BODY'){
                        item = item.parentNode;
                    }

                    if(item.tagName == 'TR'){

                        // if(mode == 'rightclick' || (old_selected_id == null || item.getAttribute('id') != old_selected_id))
                        // {

                            table.selected = item;
                            // table.selected_id = item.getAttribute('id');
                            table.selected.classList.add("selected");

                        //     file_info.show(item.getAttribute('id').replace("tr_",""));
                        // }else{
                        //     file_info.hide();
                        // }
                    }
                },
                send: function(obj)
                {

                    if(upload.uploading){
                        new swal("Please wait for the upload to complete!");
                        return;
                    }

                    upload.uploading = true;
                    upload.cancelled = false;
                    let myform = new FormData();
                    
                    for (key in obj) {
                        myform.append(key,obj[key]);
                    }

                    let xhr = new XMLHttpRequest();

                    xhr.addEventListener('error',function(e){
                        new swal("Error!", "An error occured! Please check your connection", "warning");
                        // alert("An error occured! Please check your connection");
                    });

                    xhr.addEventListener('readystatechange',function(){

                        if(xhr.readyState == 4)
                        {
                            if(xhr.status == 200)
                            {
                                
                                upload.handle_result(xhr.responseText)

                            }else{
                                console.log(xhr.responseText);
                                swal("Error", "An error occured! Please try again later", "error");

                                // alert("An error occured! Please try again later");
                            }

                            upload.uploading = false;
                        }
                    });

                    xhr.open('post','../../inc/api.php',true);
                    xhr.send(myform);

                },
                share_file: function(){

                let box = document.querySelector(".js-share");
                let radios = box.querySelectorAll(".radio");
                let share_mode = 0;

                for (var i = radios.length - 1; i >= 0; i--) {
                    if(radios[i].checked)
                        share_mode = radios[i].value;
                }

                box.classList.add("hide");

                //grab all share email addresses
                let inputs = document.querySelector(".js-access-email-holder").querySelectorAll("input");
                let emails = [];
                for (var i = 0; i < inputs.length; i++) {
                    emails[i] = inputs[i].value;
                }

                let obj = {};
                let id = table.selected.getAttribute('id').replace("tr_","");			
                obj.id 	= table.ROWS[id].id;
                obj.emails = JSON.stringify(emails);
                obj.data_type = 'share_file';
                obj.share_mode = share_mode;
                // obj.folder_id = FOLDER_ID;

                table.send(obj);
                },
                show_share_file: function(){

                //get selected file info
                let id = table.selected.getAttribute('id').replace("tr_","");			

                let box = document.querySelector(".js-share");
                box.classList.remove("hide");
                box.querySelector(".js-share-filename").innerHTML = table.ROWS[id].file_name;
                box.querySelector(".js-share-link").value = table.root_path + "preview.php?id="+table.ROWS[id].slug;

                box.querySelector(".js-share-mode-"+table.ROWS[id].share_mode).checked = true;

                box.querySelector(".js-share-link").focus();

                share.refresh(table.ROWS[id].emails);
                },
                show_file_info: function(){

                //get selected file info
                let id = table.selected.getAttribute('id').replace("tr_","");			

                let file_name = document.querySelector("#offcanvasRightLabel");
                let file_info_type = document.querySelector("#file_info_type");
                let file_info_size = document.querySelector("#file_info_size");
                let file_info_uploaded = document.querySelector("#file_info_uploaded");
                let file_info_date = document.querySelector("#file_info_date");
                
                file_name.innerText = table.ROWS[id].file_name;
                
                file_info_type.innerText = table.ROWS[id].file_type;
                if(table.ROWS[id].file_type == 'video/mp4')
                    file_info_type.innerText = "MP4"
                if(table.ROWS[id].file_type == 'audio/mpeg')
                    file_info_type.innerText = "MP3"
                if(table.ROWS[id].file_type == 'image/jpeg')
                    file_info_type.innerText = "JPG"
                if(table.ROWS[id].file_type == 'image/png')
                    file_info_type.innerText = "PNG"
                if(table.ROWS[id].file_type == 'application/pdf')
                    file_info_type.innerText = "PDF"
                file_info_size.innerText = table.ROWS[id].file_size;

                let date_updated = new Date(table.ROWS[id].date_updated);
                const options_0 = {day: 'numeric', month: 'short', year: 'numeric'};
                let formattedDate_1 = date_updated.toLocaleDateString('en-US', options_0);
                file_info_date.innerText = formattedDate_1;
                
                let date_created = new Date(table.ROWS[id].date_created);
                const options_1 = {day: 'numeric', month: 'short', year: 'numeric'};
                let formattedDate_2 = date_created.toLocaleDateString('en-US', options_1);
                file_info_uploaded.innerText = formattedDate_2;
                
                // console.log(file_info_uploaded.innerText);
                // file_info_date.innerText = table.ROWS[id].date_uploaded;
                

                },
                show_rename_file: function(){

                //get selected file info
                let id = table.selected.getAttribute('id').replace("tr_","");			

                let txt_rename = document.querySelector(".js-rename");
                txt_rename.classList.remove("hide");
                txt_rename.querySelector(".txt_rename").value = table.ROWS[id].file_name;
                
                },
                delete_row: function(){
                    if(!table.selected){
                        // alert('Please select a row to delete');
                        swal("Warning", "Please select a row to delete", "warning");

                        return;
                    }
                    // if(!confirm("Are you sure you want to delete this item?")){
                    //     return;
                    swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        swal("Your file has been deleted!", {
                        icon: "success",
                        });
                         // }
                    // alert("deleting")
                    let obj = {};
                    obj.data_type = "delete_row";
                    // obj.file_type = table.selected.getAttribute('type');
                    console.log(table);

                    let id = table.selected.getAttribute('id').replace("tr_","");
                    obj.id = table.ROWS[id].id;
                    // console.log("obj.id");
                    obj.id = Number(obj.id);
                    // console.log(typeof(obj.id));

                    let myform = {}// new FormData();
                    myform.obj = obj;
                    myform = JSON.stringify(myform);
                    // myform.append("obj",obj.id);

                    // myform.append('data_type', 'delete_row');
                    let xhr = new XMLHttpRequest();
                    xhr.open('put', '../../courses/trash.php', true);
                    // xhr.open('post', '../../inc/api.php', true);
                    xhr.send(myform);
                    // upload.send(obj);
                    // alert(obj);
                    // alert("Success");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);

                    // window.location.reload(4);
                    } else {
                        return;
                    }
                    });

                   
                },
                add_to_favorites: function()
                {
                   
                    // alert("deleting")
                    let obj = {};
                    obj.data_type = "delete_row";
                    // obj.file_type = table.selected.getAttribute('type');
                    console.log(table);

                    let id = table.selected.getAttribute('id').replace("tr_","");
                    obj.id = table.ROWS[id].id;
                    // console.log("obj.id");
                    obj.id = Number(obj.id);
                    // console.log(typeof(obj.id));

                    let myform = {}// new FormData();
                    myform.obj = obj;
                    myform = JSON.stringify(myform);
                    // myform.append("obj",obj.id);

                    // myform.append('data_type', 'delete_row');
                    let xhr = new XMLHttpRequest();
                    xhr.open('put', '../../courses/add_to_favorites.php', true);
                    // xhr.open('post', '../../inc/api.php', true);
                    xhr.send(myform);
                    // alert("File has been added to Favourites.")
                    new swal("File has been added to Favourites!");
                    window.location.reload(1);
                },
                remove_from_favorites: function(){
                    if(!table.selected){
                        alert('Please select a file to remove from favourites');
                        return;
                    }
                    if(!confirm("Are you sure you want to remove this item from favourites?")){
                        return;
                    }
                    let obj = {};
                    obj.id = table.ROWS[table.selected.getAttribute('id').replace("tr_", "")].id;

                    let myform = {};
                    myform.obj = obj;

                    let xhr = new XMLHttpRequest();
                    xhr.open('put', '../../courses/remove_from_favorites.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    myform = JSON.stringify(myform);
                    xhr.send(myform);
                                     
                    new swal("File removed from Favourites")
                    window.location.reload(1);
                },
                preview_file: function(){
                    let id = table.selected.getAttribute('id').replace("tr_", "");
                    window.open('preview.php?id='+table.ROWS[id].slug);
                },
                rename_file: function()
                {
                    // alert("renaming")
                    let obj = {};
                    let new_file_name = document.getElementById('txt_rename').value;
                    obj.data_type = "rename_file";
                    // obj.file_type = table.selected.getAttribute('type');
                    console.log(table);

                    let id = table.selected.getAttribute('id').replace("tr_","");
                    obj.id = table.ROWS[id].id;
                    obj.file_name = new_file_name;
                    // console.log("obj.id");
                    obj.id = Number(obj.id);
                    // console.log(typeof(obj.id));
                  
                    let myform = {}// new FormData();
                    myform.obj = obj;
                    myform = JSON.stringify(myform);
                    // myform.append("obj",obj.id);
                    console.log(obj.file_name)
                    // console.log(myform.ROWS.)
                    // myform.append('data_type', 'delete_row');
                    let xhr = new XMLHttpRequest();
                    xhr.open('put', '../../courses/rename_file.php', true);
                    // xhr.open('post', '../../inc/api.php', true);
                    xhr.send(myform);
                    new swal("File successfully renamed!");
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                },
                download_file: function()
                {
                    let id = table.selected.getAttribute('id').replace("tr_","");	
                    // alert(table.ROWS[id].id);		
                    window.location.href = "../../inc/download.php?id=" + table.ROWS[id].id;
                },
                refresh: function(MODE = 'ALL FILES', PAGE=1){
                    
                    //recreate table
                    let myform = new FormData();

                    myform.append('data_type', 'get_files');
                    myform.append('page', PAGE);
                
                    let xhr = new XMLHttpRequest();
                    //cause pop up to appear when it fails to read from db
                    // xhr.addEventListener('error', function(){
                    //     alert("An error occured! Please check your connection.")
                    // });
                    //check progress of file being uploaded
               
                    xhr.addEventListener('readystatechange', function(){
                        // console.log(xhr)
                        if(xhr.readyState == 4){
                            if(xhr.status == 200){
                                //recreating the table
                                let obj = JSON.parse(xhr.responseText); 
                                console.log(obj)
                                //display usename
                                if(!USERNAME){
                                    USERNAME = obj.username;
                                    document.querySelector(".username").innerHTML = obj.username;
                                }
                                
                                if(obj.success && obj.data_type == "get_files"){
                                    let tbody = document.getElementById('tbody');
                                    tbody.innerHTML = "";
                                    
                                    LOGGED_IN = obj.LOGGED_IN;
                                    if(!LOGGED_IN)
                                        window.location.href = '../login.php'

                                    let drive_occupied = (obj.drive_occupied / (1024 * 1024 * 1024)).toFixed(2);
                                    let drive_percent = Math.round((drive_occupied / obj.drive_total) * 100)
                                    // alert("drive_occupied = "+drive_occupied);
                                    // alert("drive_percent = "+drive_percent);
                                    table.ROWS = obj.rows;
                                    
                                    for (let i = 0; i < obj.rows.length; i++) {
                                        let tr = document.createElement('tr');
								        tr.setAttribute('id','tr_'+i);
                                        let new_date = new Date(obj.rows[i].date_updated);
                                        const options = {day: 'numeric', month: 'short', year: 'numeric'};
                                        let formattedDate = new_date.toLocaleDateString('en-US', options);
                                        let star = ""
                                        if(obj.rows[i].favourite == 1)
                                            star = '<i class="bi bi-star-fill">'
                                        else
                                            star = '<i class="bi bi-star">'

                                        tr.innerHTML = `
                                            <td>${obj.rows[i].file_name}</td>
                                            <td>${star}</td>
                                            <td>${obj.rows[i].file_size}</td>
                                            <td>${obj.rows[i].share_mode}</td>
                                            <td>${formattedDate}</td>
                                            <td><i style="color: var(--text-color);" class="bi bi-share pointer" onclick="table.show_share_file()" aria-hidden="true"></i> <i style="color: var(--text-color);" class="fa fa-ellipsis-h" onclick="submenu.show(this)" aria-hidden="true"></i>
                                            </td>
                                        `;
                                        tbody.appendChild(tr);
                                    }
                                }else{
                                    tbody.innerHTML = `
                                        <tr><td colspan="5" style="text-align: center">No file found!</td></tr>
                                    `
                                }
                                    
                            }else{
                                console.log(xhr.responseText)
                            }
                        }
                    })
                    xhr.open('post', '../../inc/api.php', true);
                    xhr.send(myform);
                    //recreate table
              
                },
                
                
            };
            //fetch data from db
            const upload = {
                cancelled: false,
                uploading: false,
                cancel: function(){
                    upload.cancelled = true;
                },
                reset_progress: function(){
                    document.querySelector(".js-prog").style.width = "0%";
                    document.querySelector(".js-prog-text").innerHTML = "0%";
                    document.querySelector(".js-prog-holder").classList.add ("hide");
                },
                dropZone : {
                    highlight: function(){
                        document.querySelector(".drop-zone").classList.add("drop-zone-highlight");
                    },
                    removeHighlight: function(){
                        document.querySelector(".drop-zone").classList.remove("drop-zone-highlight");
                    }
                },
                drop: function(e){
                    e.preventDefault();
                    upload.dropZone.removeHighlight();
                    upload.send(e.dataTransfer.files);
                    // console.log();
                },
                dragOver: function(e){
                    event.preventDefault();
                    upload.dropZone.highlight();
                },
                send: function(files){

                    if(upload.uploading){
                        alert('Please wait for the current upload to complete!');
                        return;
                    }
                    upload.uploading = true;
                    upload.cancelled = false;
                    let myform = new FormData();

                    myform.append('data_type', 'upload_files');
                    
                    for (let i = 0; i < files.length; i++) {
                        myform.append('file'+i, files[i]); 
                    }

                    document.querySelector(".js-prog").style.width = "0%";
                    document.querySelector(".js-prog-text").innerHTML = "0%";
                    document.querySelector(".js-prog-holder").classList.remove("hide");

                    let xhr = new XMLHttpRequest();
                    xhr.addEventListener('error', function(){
                        alert("An error occured! Please check your connection.")
                    });
                    //check progress of file being uploaded
                    xhr.upload.addEventListener('progress', function(e){
                        let percent = Math.round((e.loaded / e.total) * 100);
                        document.querySelector(".js-prog").style.width = percent + "%";
                        document.querySelector(".js-prog-text").innerHTML = percent + "%";

                        if(upload.cancelled){
                            xhr.abort();
                            alert("This upload was cancelled!")
                            upload.reset_progress();
                            document.querySelector('.js-prog-holder').classList.remove('hide');
                        }
                    })
                    xhr.addEventListener('readystatechange', function(){
                        // console.log(xhr)
                        if(xhr.readyState == 4){
                            if(xhr.status == 200){

                                let obj = JSON.parse(xhr.responseText);
                                if(obj.success)
                                {
                                    alert("Upload complete!");
                                    table.refresh();
                                }else{
                                    alert("Could not complete upload!");
                                    console.log(obj.errors)
                                    if(typeof obj.errors != 'undefined')
                                    {
                                        for(key in obj.errors){
                                            alert(obj.errors[key]);
                                        }
                                    }
                                }

                                upload.reset_progress();

                            }else{
                                console.log(xhr.responseText);
                                alert("An error occured! Please try again later");
                            }

                            upload.uploading = false;
                        }
                    })
                    xhr.open('post', '../../inc/api.php', true);
                    xhr.send(myform);
                    table.refresh();
                },
                handle_result: function(result){
                    alert(result)
                    let obj = JSON.parse(xhr.responseText); 
    
                    if(obj.success){
                        // alert('upload complete!');
                        table.refresh();
                    }else{
                        alert('Could not complete upload!')
                    }
                },
                
            }
            table.refresh();
            window.addEventListener("click",function(){
                submenu.hide();
            });
            var share = {

            add: function(email)
            {
                if(email == "")
                {
                    alert("Please type an email address first");
                    document.querySelector(".js-access-email-input").focus();
                    return;
                }

                let reg = new RegExp;
                reg = /^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_]+\.[a-zA-Z0-9\-\_\.]+$/g;
                if(!email.match(reg))
                {
                    alert("Please type a valid email address");
                    document.querySelector(".js-access-email-input").focus();
                    return;
                }

                let holder = document.querySelector(".js-access-email-holder");
                let div = document.createElement('div');
                div.setAttribute("class","access-email");
                div.innerHTML = `
                    <div class="photo_share"><img src="https://placehold.co/20x20" style="border-radius: 50%; "/></div>
                    <div class="email">${email}</div>
                    <div class="close" onclick="share.remove(event)"><i class="bi bi-x"></i></div>
                    <input type="hidden" value="${email}">
                `; 
                holder.insertBefore(div,holder.children[0]); 
                document.querySelector(".js-access-email-input").value = "";
                document.querySelector(".js-access-email-input").focus();
            },

            remove: function(e)
            {
                if(!confirm("Are you sure you want to remove access for this email?!"))
                {
                    return;
                }
                e.currentTarget.parentNode.remove();
            },

            refresh: function(obj)
            {
                document.querySelector(".js-access-email-holder").innerHTML = "";
                let rows = JSON.parse(obj);
                for (var i = 0; i < rows.length; i++) {
                    share.add(rows[i].email);
                }
            },

            };

            let delete_btn = document.getElementById('delete_btn');
            let api_url = "http://localhost/campus_drive/";

            // delete_btn.addEventListener('click', ()=>{
                function delete_file(event){
                    alert("success");

                // $('delete_btn').click(()=>{
                    // let id = '18';
                    let data = { id: id}
                    let tbody = document.getElementById('tbody');
                    $.ajax({
                        url: api_url+"courses/trash.php",
                        type: 'PUT',
                        crossDomain: true,
                        data: data,
                        success: function (res){
                            let data = res.data
                            let status = res.status
                            if(status == 200){
                                console.log(res.status);
                                console.log(event);
                                alert("success");
                                
                            }else{
                                alert(res.message);
                                console.log(res)
                            }
                        }
                    })
                // })
                }
            // })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
         <script src="../lib/popper.js/js/popper.js"></script>
         <script src="../lib/bootstrap/js/bootstrap.js"></script>
        
    </body>
</html>