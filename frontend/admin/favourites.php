<?php include "../dashboard/header.php"; ?>

<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
    thead{
        box-shadow: -3px 10px 12px 0px rgba(194,178,178,0.64);
        -webkit-box-shadow: -3px 10px 12px 0px rgba(194,178,178,0.64);
        -moz-box-shadow: -3px 10px 12px 0px rgba(194,178,178,0.64);
    }
</style>
<body>
    <?php $page_title = "Favourites"; ?>
        <!-- navbar -->
        <?php include "../dashboard/navbar.php"; ?>
        <!-- navbar -->
        <div class='nav_breadcrumb'>
            <i class="fa fa-home"></i> <a>Home </a> > Favourites
        </div>
        <!-- sidebar -->
       <?php include "../dashboard/sidebar.php"; ?>
        <!-- sidebar -->
        <script>
            let favorite_sidebar_item = document.getElementById('favorite_sidebar_item');
            favorite_sidebar_item.classList.add('sidebar_active_item')
       </script>
        <section class="page-content">
            
            <section class="grid">
                <article class="body">
                    <div class="body-content">
                        <div class="section-wrapper">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label class="section-title current_page_title">Favourites</label>
                                    <input type="text" class="form-control" placeholder=" &#xF52A; Search File" />
                                </div>
                                <div class="col-lg-3">
                                    <label class="section-title current_page_title">&nbsp;</label><br>
                                    <!-- <input type="text" class="form-control" placeholder="Search File" /> -->
                                    <button type="button" class="btn btn-light border-dark px-4"><i class="bi bi-funnel" aria-hidden="true"></i> Filter</button>
                                </div>
                                <div class="col-lg-4 text-right form-group">
                                </div>
                                <div class="col-lg-4 text-right form-group">
                                    <!-- <button type="button" class="btn btn-light border-dark">Filter<i class="fa fa-filter" aria-hidden="true"></i></button> -->
                                    <!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#upload_modal">Upload Files</button> -->
                                </div>
                            </div>
                            <p class="mg-b-20 mg-sm-b-40"></p>

                            <div class="table-responsive table_div">
                                <table id="table" oncontextmenu="submenu.show(event)" class="table mg-b-0">
                                <thead class="">
                                    <!-- <tr> -->
                                    <!-- <th>S/N</th> -->
                                    <th>Size</th>
                                    <th>File Name</th>
                                    <th>Shared with</th>
                                    <th>Last Edited</th>
                                    <th>Action</th>
                                    <!-- </tr> -->
                                </thead">
                                <tbody oncontextmenu="submenu.show(event)" onclick="table.select(event)" id=tbody>
                                
                                </tbody>
                            </table>
                            <hr>
                            </div><!-- table-responsive -->
                        </div><!-- section-wrapper -->
                    </div>


                </article>
            </section>
            <?php //include "../dashboard/footer.php"; ?>
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
            var USERNAME = false;
                        
            const submenu = {
                show:function(e){
                    e.preventDefault();

                    table.select(e, 'rightclick');

                    let menu = document.getElementById("submenu");
                    menu.style.left = e.clientX + "px";
                    menu.style.top = (e.clientY + window.scrollY) + "px";
                    
                    //hide items not needed
                    // document.querySelector("#submenu .js-favorites-text").innerHTML = "Add to favorites";
                    // document.querySelector("#submenu .js-download-button").classList.add("hide");
                    // document.querySelector("#submenu .js-favorites-button").classList.add("hide");
                    // document.querySelector("#submenu .js-restore-button").classList.add("hide");
                    // document.querySelector("#submenu .js-preview-button").classList.add("hide");
                    
                    // let id = table.selected.getAttribute('id').replace("tr_","");			
                    // if(table.ROWS[id].favorite == 1)
                    // {
                    //     document.querySelector("#submenu .js-favorites-text").innerHTML = "Remove from favorites";
                    // }

                    // if(table.ROWS[id].file_type != 'folder')
                    // {
                    //     document.querySelector("#submenu .js-download-button").classList.remove("hide");
                    //     document.querySelector("#submenu .js-favorites-button").classList.remove("hide");
                    //     document.querySelector("#submenu .js-preview-button").classList.remove("hide");
                    // }
                    
                    // if(mode.current == 'TRASH')
                    // {
                    //     document.querySelector("#submenu .js-restore-button").classList.remove("hide");
                    // }
                    menu.classList.remove("hide");
                },

                hide:function(){
                    let menu = document.getElementById("submenu");
                    menu.classList.add("hide");
                },
            };
            const table = {
                selected : null,
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
                remove_from_favorites: function(){
                    if(!table.selected){
                        new swal('Please select a file to remove from favourites');
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
                                     
                    alert("File removed from Favourites")
                    window.location.reload(1);
                },
                refresh: function(){
                    
                    //recreate table
                    let myform = new FormData();

                    myform.append('data_type', 'get_favourites');
                
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
                                
                                if(obj.success && obj.data_type == "get_favourites"){
                                    let tbody = document.getElementById('tbody');
                                    tbody.innerHTML = "";
                                    if(!USERNAME){
                                    USERNAME = obj.username;
                                    document.querySelector(".username").innerHTML = obj.username;
                                }
                                    LOGGED_IN = obj.LOGGED_IN;
                                    if(!LOGGED_IN)
                                        window.location.href = '../login.php'

                                    table.ROWS = obj.rows;
                                    for (let i = 0; i < obj.rows.length; i++) {
                                        let tr = document.createElement('tr');
                                        let star = `<i class='fa fa-star-o'></i>`
                                        if(obj.rows[i].favourite == 1){
                                            let star = `<i class='fa fa-star'></i>`
                                        }
                                        tr.setAttribute('id','tr_'+i);
                                        let new_date = new Date(obj.rows[i].date_updated);
                                        const options = {day: 'numeric', month: 'short', year: 'numeric'};
                                        let formattedDate = new_date.toLocaleDateString('en-US', options);
                                        
                                        tr.innerHTML = `
                                        <td>${obj.rows[i].file_name} ${star}</td>
                                        <td>${obj.rows[i].file_size}</td>
                                        
                                            
                                            <td>${formattedDate}</td>
                                            <td></td>
                                            <td><i style="color: var(--text-color);" class="fa fa-ellipsis-h" onclick="submenu.show(this)" aria-hidden="true"></i>
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
            
            table.refresh();
            window.addEventListener("click",function(){
                submenu.hide();
            });

            var ROWS = [];
            var LOGGED_IN = false;
            var mode = {
                current: 'Favourite',
                set: function(m){
                //     mode.current = m;
                    document.querySelector('current_page_title').innerHTML = mode.current;
                //     // let selected =
                }
            }
        </script>
         <script src="../lib/popper.js/js/popper.js"></script>
         <script src="../lib/bootstrap/js/bootstrap.js"></script>
        
    </body>
</html>