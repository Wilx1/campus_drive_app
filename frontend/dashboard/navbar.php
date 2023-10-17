<style>
    .navbar{
        display: flex;
        flex-wrap: nowrap;
       
        /* color: blue;
        margin: 0 2px; */
    }
.flex-container {
  display: flex;
  align-items: stretch;
  /* background-color: #f1f1f1; */
}

.flex-container > div {
  background-color: white;
  margin: 0;
  line-height: 75px;
}
.flex-container > div:first-child{
    width: 220px;
    padding-left: 30px;
}
.flex-container > div:last-child{
    /* width: 20%; */
    text-align: right;
    padding-right: 50px;
}
.nav_breadcrumb{
 /* color: blue; */
 padding:5px 0 5px 252px;
 border-top: 1px solid #ECEBFA;
 font-size: 11px;
 /* height: 100%; */
 text-align: left;
vertical-align: middle;
display: table-cell;
width: 100vw;
}
.nav_breadcrumb > .bi-house {
    font-size: 14px;
}
#nav_section_2{
    padding-left: 35px;
}
/* #nav_section_3{
    width: 35px;
} */
</style>

<nav class="flex-container">
    <div id="nav_section_1" class="logo_item">
        <img src="../img/logo.svg" class="user_img" alt="Campus Drive">
    </div>
    <div id="nav_section_2" class="title text-left" style="flex-grow: 2"><?php echo "$page_title"; ?></div>
    <div id="nav_section_3" class="search_bar" style="flex-grow: 4;">
        <!-- <i class="fa fa-search"></i>
        <input type="text" placeholder="Search here" /> -->
    </div>
    <div id="nav_section_4" style="flex-grow: 1; " class="header-notification dropdown dropdown-c">
        <i class="fa fa-search"></i>
        <input type="text" placeholder="Search here..." />
        <i class="mx-2 fa fa-bell-o" style="font-size: 17px;"></i>
        <span href="#" class="logged-user" data-toggle="dropdown">
            <img src="https://placehold.co/30x30" alt="" class="profile" />
            <span class="username">Username</span> 
              <small><i class="fa fa-angle-down"></i></small>
            </span>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
                
                <a class="nav-link" onclick="nav.signout()"><i class="icon ion-forward"></i> Sign Out</a>
              </nav>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
    </div>
</nav>
<!-- <div class='nav_breadcrumb'>
    <i class="fa fa-home"></i> Home > All Files
</div> -->
<script>
    const nav = {

        signout: function(){
            let myform = new FormData();
            myform.append('data_type','user_signout');
        
            let xhr = new XMLHttpRequest();
            xhr.addEventListener('readystatechange',function(){
        
                if(xhr.readyState == 4)
                {
                    if(xhr.status == 200)
                    {
                        //console.log(xhr.responseText);
                        window.location.href = '../login.php';
                        localStorage.clear();
        
                    }else{
                        console.log(xhr.responseText);
                    }
        
                }
            });
        
            xhr.open('post','../../inc/api.php',true);
            xhr.send(myform);
        
        }
    }
  
</script>