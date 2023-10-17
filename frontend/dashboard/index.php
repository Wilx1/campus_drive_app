<?php include "header.php"; ?>
<link rel="stylesheet" href="../cd_style.css">
</head>
<body>
    <script>
        let drive_occupied = 0;
        // let drive_occupied = (obj.drive_occupied / (1024*1024)).toFixed(2);
        // let drive_percent = 0;
        DRIVE_TOTAL = 1;
    </script>
    <?php $page_title = "Dashboard"; ?>
        <!-- navbar -->
        <?php include "navbar.php"; ?>
        <!-- navbar -->
        <div class='nav_breadcrumb'>
        <!-- <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="mask0_416_3069" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="1" y="1" width="11" height="11">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 1.00012H11.2499V11.7526H1V1.00012Z" fill="white"/>
        </mask>
        <g mask="url(#mask0_416_3069)">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.85839 8.14563C7.46039 8.14563 7.95039 8.63213 7.95039 9.23013V10.7681C7.95039 10.8966 8.05339 10.9996 8.18539 11.0026H9.13839C9.88939 11.0026 10.4999 10.3996 10.4999 9.65863V5.29663C10.4964 5.04163 10.3749 4.80163 10.1664 4.64213L6.86989 2.01313C6.42739 1.66263 5.80839 1.66263 5.36439 2.01413L2.09039 4.64113C1.87389 4.80563 1.75239 5.04563 1.74989 5.30513V9.65863C1.74989 10.3996 2.36039 11.0026 3.11139 11.0026H4.07339C4.20889 11.0026 4.31889 10.8951 4.31889 10.7631C4.31889 10.7341 4.32239 10.7051 4.32839 10.6776V9.23013C4.32839 8.63563 4.81539 8.14963 5.41289 8.14563H6.85839ZM9.13839 11.7526H8.17639C7.62539 11.7396 7.20039 11.3071 7.20039 10.7681V9.23013C7.20039 9.04563 7.04689 8.89563 6.85839 8.89563H5.41539C5.23089 8.89663 5.07839 9.04713 5.07839 9.23013V10.7631C5.07839 10.8006 5.07339 10.8366 5.06289 10.8706C5.00889 11.3656 4.58589 11.7526 4.07339 11.7526H3.11139C1.94689 11.7526 0.999893 10.8131 0.999893 9.65862V5.30163C1.00489 4.80463 1.23389 4.34963 1.62939 4.05013L4.89689 1.42763C5.61639 0.857625 6.61889 0.857625 7.33689 1.42663L10.6279 4.05163C11.0144 4.34613 11.2434 4.80013 11.2499 5.29113V9.65862C11.2499 10.8131 10.3029 11.7526 9.13839 11.7526Z" fill="#6D6D6D"/>
        </g>
        </svg> -->
        <i class="bi bi-house"></i>&emsp;
        Home &nbsp; <i class="bi bi-chevron-right"></i> &nbsp; Dashboard
        </div>
        <!-- sidebar -->
        <?php include "../dashboard/sidebar.php"; ?>
        <!-- sidebar -->
       <script>
            let home_item = document.getElementById('home_item');
            home_item.classList.add('sidebar_active_item')
       </script>
        <section class="page-content section">
            
        <!-- <section class="section"> -->
            <!-- ========item-0======= -->
            <div class="item media-item" id="item-0">
                <div class="media_item_top">
                    <div class="icon" id="file_lines">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>
                </div>

                <div class="media_item_bottom">
                    <div class="file_desc text-white">
                        All Files
                    </div>
                    <div class="num_of_files text-white" id="all_files">
                        0 File
                    </div>
                </div>
            </div>
            <!-- ========item-0======= -->
            <!-- ========item-1======= -->
            <div class="item media-item" id="item-1">
                <div class="media_item_top">
                    <div class="icon" id="file_video">
                    <i class="bi bi-camera-video"></i>
                    </div>
                </div>

                <div class="media_item_bottom">
                    <div class="file_desc">
                        Media files
                    </div>
                    <div class="num_of_files">
                        0 File
                    </div>
                </div>
            </div>
            <!-- ========item-1======= -->
            <!-- ========item-2======= -->
            <div class="item media-item" id="item-2">
                <div class="media_item_top">
                    <div class="icon" id="fa-file">
                        <i class="bi bi-file-earmark-minus"></i>
                    </div>
                </div>

                <div class="media_item_bottom">
                    <div class="file_desc">
                        Text Files
                    </div>
                    <div class="num_of_files">
                        0 File
                    </div>
                </div>
            </div>
            <!-- ========item-2======= -->
            <!-- ========item-3======= -->
            <div class="item" id="item-3">
                <div>
                    <label class="dash-drop-zone drop-zone" ondrop="upload.drop(event)" ondragover="upload.dragOver(event)" ondragleave="upload.dropZone.removeHighlight()">
                        <i class="bi bi-cloud-upload" aria-hidden="true"></i>
                        <span class="text" style="font-size: 10px">Upload Files Here</span>
                        <input onchange="upload.send(this.files)"type="file"  class="hide" multiple>
                        
                    </label>  
                    <div class="donought_chart mt-4">
                        <span style="font-size: 10px;">My Storage Space</span>
                        <div style="margin-top: -20%;">
                            <canvas id="myChart" class="mt-0"></canvas>
                        </div>
                    </div>
                    <div class="storage-info" style="margin-top: -50px;">
                        <div class="total-space text-left">
                            <span id="total-space">0B</span>
                            <div>Total space</div>
                        </div>
                        <div class="used-space text-right">
                            <span id="used-space">0B</span>
                            <div>Used space</div>
                        </div>
                    </div>
                    <div class="file_storage mt-4">
                        <div class="file_icon"  style="flex-grow: 1">
                            <i class="bi bi-file-text"></i>
                        </div>
                        <div class="file_details text-left"  style="flex-grow: 8">
                            <div class="file_name">
                                Text Files
                            </div>
                            <div class="num_of_files">
                                90 Files
                            </div>
                        </div>
                        <div class="file_space"  style="flex-grow: 1">
                            8GB
                        </div>
                    </div>
                    <div class="file_storage mt-4">
                        <div class="file_icon"  style="flex-grow: 1; color: #4338CA;">
                            <i class="bi bi-play-circle"></i>
                        </div>
                        <div class="file_details text-left"  style="flex-grow: 8">
                            <div class="file_name">
                                Audio Files
                            </div>
                            <div class="num_of_files">
                                90 Files
                            </div>
                        </div>
                        <div class="file_space"  style="flex-grow: 1">
                            8GB
                        </div>
                    </div>
                    <div class="file_storage mt-4">
                        <div class="file_icon"  style="flex-grow: 1">
                            <i class="bi bi-play-circle-fill"></i>
                        </div>
                        <div class="file_details text-left"  style="flex-grow: 8">
                            <div class="file_name">
                                Video Files
                            </div>
                            <div class="num_of_files">
                                90 Files
                            </div>
                        </div>
                        <div class="file_space"  style="flex-grow: 1">
                            8GB
                        </div>
                    </div>
                    <div class="file_storage mt-4">
                        <div class="file_icon" style="flex-grow: 1; color: #27AE60;">
                            <i class="bi bi-camera"></i>
                        </div>
                        <div class="file_details text-left"  style="flex-grow: 8">
                            <div class="file_name">
                                Images
                            </div>
                            <div class="num_of_files">
                                90 Files
                            </div>
                        </div>
                        <div class="file_space"  style="flex-grow: 1">
                            8GB
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========item-3======= -->
            <!-- ========item-4======= -->
            <div class="item" id="item-4">&nbsp;Recent Files <br><br>
                <div class="table-responsive dash_table_div">
                    <table id="table" oncontextmenu="submenu.show(event)" class="table mg-b-0">
                    <thead class="">
                        <!-- <tr> -->
                        <!-- <th>S/N</th> -->
                        <th>File Name</th>
                        <th>Size</th>
                        <th>Shared</th>
                        <th>Last Modified</th>
                        <th></th>
                        <!-- </tr> -->
                    </thead">
                    <tbody oncontextmenu="" onclick="" id="tbody">
                       
                    </tbody>
                </table>
            </div>
            <!-- ========item-4======= -->
        <!-- </section> -->
                <?php //include "footer.php"; ?>
            </section>
        <!-- content -->
        <script src="script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // let x = 0;
    // let y = 0;
    // let usedspace = document.querySelector("#used-space").innerHTML
    // let totalspace = document.querySelector("#total-space").innerHTML
document.addEventListener('readystatechange', event=>{
    // localStorage.setItem('x', 0);
    // localStorage.setItem('y', 0);
    if(event.target.readyState === "complete"){
        action.refresh();

    }
        
})
const action = {

    refresh: function(){
        USERNAME = false;
        //recreate table
        let myform = new FormData();

        myform.append('data_type', 'get_files');
        
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
                    // if(!USERNAME){
                    //     USERNAME = obj.username;
                    //     document.querySelector(".username").innerHTML = obj.username;
                    // }
                    //update drive space
						let drive_occupied = (obj.drive_occupied / (1024*1024*1024)).toFixed(2);
						// let drive_occupied = (obj.drive_occupied / (1024*1024)).toFixed(2);
						let drive_percent = Math.round((drive_occupied / obj.drive_total) * 100);
						
						DRIVE_OCCUPIED = obj.drive_occupied;
						DRIVE_TOTAL = obj.drive_total;

                        // if(obj.rows < 1){
                        //     document.querySelector("#all_files").innerHTML = `No File`
                        // }else{
						document.querySelector("#used-space").innerHTML = `${drive_occupied}GB`
						document.querySelector("#total-space").innerHTML = `${DRIVE_TOTAL}GB`
                            if(obj.rows.length >= 1){
                                document.querySelector("#all_files").innerHTML = `${obj.rows.length} File`
                           
                                document.querySelector("#all_files").innerHTML = `${obj.rows.length} Files`

                                localStorage.setItem('x', drive_occupied);
                                localStorage.setItem('y', DRIVE_TOTAL);

                                
                                obj.success && obj.data_type == "get_files";
                                console.log("obj");
                                console.log(obj.rows.length);

                            // } else
                            //    document.querySelector("#all_files").innerHTML = `No File`
                               
                           }
                        
                        
                        if(!USERNAME){
                            USERNAME = obj.username;
                            document.querySelector(".username").innerHTML = obj.username;
                        }
                        LOGGED_IN = obj.LOGGED_IN;
                        if(!LOGGED_IN)
                            window.location.href = '../login.php'

                        // alert("drive_percent = "+drive_percent);
                        // table.ROWS = obj.rows;
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
                                        
                                        tr.innerHTML = `
                                            <td class="first_cell"><div class="div_table_icon"><i id="table_icon" class="bi bi-file table_icon"></i></div>${obj.rows[i].file_name}</td>
                                            <td>${obj.rows[i].file_size}</td>
                                            <td>Shared with</td>
                                            <td>${formattedDate}</td>
                                            <td><i style="color: var(--text-color);" class="fa fa-ellipsis-h" onclick="submenu.show(this)" aria-hidden="true"></i>
                                            </td>
                                            `;
                                            tbody.appendChild(tr);
                                            
                                            let table_icon = document.querySelector('.table_icon')
                                            if(obj.rows[i].file_type == "video/mp4"){
                                                table_icon.classList.add('bi-play-circle-fill');
                                            }
                                            else if(obj.rows[i].file_type == "image/jpeg"){
                                                table_icon.classList.add('bi-image');
                                            }
                                            else if(obj.rows[i].file_type == "audio/mpeg" || obj.rows[i].file_type == "audio/mp3"){
                                                table_icon.classList.add('bi-play-circle');
                                            }

                                            
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
    
    }
}

    let valx = localStorage.getItem('x');
    let valy = localStorage.getItem('y');

        const data = {
            labels: [
                'Total space',
                'Used space'
            ],
            datasets: [{
                label: 'Storage Information',
                data: [valy, valx],
                backgroundColor: [
                    'rgb(255, 205, 86)',
                    '#ECEBFA'
                ],
                hoverOffset: 4,
                rotation: -90,
                circumference: 180,
                responsive: true,
                maintainAspectRation: true,
                aspectRation: 1 | 2,
            }],
            
            };
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options : {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                padding: 110
            }
            });
            // alert(y)
            // ctx.canvas.parentNode.style.height = '128px';
            // ctx.canvas.parentNode.style.width = '128px';
            // localStorage.clear();
        </script>
            <script src="../lib/popper.js/js/popper.js"></script>
            <script src="../lib/bootstrap/js/bootstrap.js"></script>
    </body>
</html>