<?php
session_start();
require_once "functions.php";
$info = [];
$info['success'] = false;
$info['LOGGED_IN'] = is_logged_in();
$info['data_type'] = $_POST['data_type'] ?? '';

if(!$info['LOGGED_IN'] && ($_POST['data_type'] != 'user_signup' && $_POST['data_type'] != 'user_login')){
    echo json_encode($info);
    die;
}

$info['username'] = $_SESSION['CURRENT_USER']['username'] ?? 'User';
$info['drive_occupied'] = get_drive_space($_SESSION['CURRENT_USER']['id']);
$info['drive_total'] = 1; //in gigabytes
// $info['drive_total'] = 500; //in megabytes

function is_logged_in(){
    if(!empty($_SESSION['CURRENT_USER']) && is_array($_SESSION['CURRENT_USER'])){
        return true;
    }
    return false;
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['data_type'])){

    if($_POST['data_type'] == "upload_files"){
        $folder = 'uploads/';
        if(!file_exists($folder)){
            mkdir($folder, 0777, true);
            file_put_contents($folder.".HTACCESS", "Options -Indexes");
        }
        foreach ($_FILES as $key => $file) {

            $destination = $folder.time().$file['name'];

            if(file_exists($destination))
                $destination = $folder.time().rand(0, 999).$file['name'];
            move_uploaded_file($file['tmp_name'], $destination);

            $occupied = $info['drive_occupied'];
			$drive_total = $info['drive_total'] * (1024 * 1024 * 1024);

           if ($occupied + $file['size'] <= $drive_total){

               //save file to db
               $file_type = $file['type'];
               $date_created = date("Y-m-d H:i:s");
               $date_updated = date("Y-m-d H:i:s");
               $file_name = $file['name'];
               $file_path = $destination;
               $file_size = filesize($destination);
               $user_id = $_SESSION['CURRENT_USER']['id'] ?? 0;
               $slug = generate_slug();
   
               $query = "INSERT INTO docs (file_name, file_size, file_path, user_id, file_type, date_created, date_updated, slug) VALUES ('$file_name', '$file_size', '$file_path', '$user_id', '$file_type', '$date_created', '$date_updated', '$slug')";
               
               query($query);
   
               $info['success'] = true;
           }else{
                $info['success'] = false;
				$info['errors'][] = "You don't have enough space to add that file";
           }
        }
    }else
    if($_POST['data_type'] == "user_signout"){
        if(isset( $_SESSION['CURRENT_USER']))
            unset( $_SESSION['CURRENT_USER']);
        $info['success'] = true;
    }else
    if($_POST['data_type'] == "user_signup"){
      
            //save file to db
            $email = addslashes($_POST['email']);
            $username = addslashes($_POST['username']);
            $password = addslashes($_POST['password']);
            $date_created = date("Y-m-d H:i:s");
            $date_updated = date("Y-m-d H:i:s");
          
            //validate data
            $errors = [];
            if(!preg_match("/^[a-zA-Z ]+$/", $username))
            $errors['username'] = "Invalid username. No symbols allowed";

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                $errors['email'] = "Invalid email address";
            
            if(query("select id from users where email = '$email' limit 1"))
                $errors['email'] = "That email address already exists";
    
            if(empty($password))
                $errors['password'] = "A password is required";
    
            if(strlen($password) < 8)
                $errors['password'] = "Password must be at least 8 characters long";
            
            // if($password !== $retype_password)
            //     $errors['password'] = "Passwords do not match";
    
            if(empty($errors)){

            $password = password_hash($password, PASSWORD_DEFAULT);
            
			$query = "insert into users 
			(username, email, password, date_created, date_updated) 
			 values 
			('$username', '$email', '$password', '$date_created', '$date_updated')";
			// ('$username', '$email', '$password', '$date_created', '$date_updated')";
                
                query($query);
    
                $info['success'] = true;
            }
            $info['errors'] = $errors;
    }else
    if($_POST['data_type'] == "user_login")
	{
 
		//save to database
		$email = addslashes($_POST['email']);
		$password = addslashes($_POST['password']);
		
		//validate data
		$errors = [];
		$row = query("select * from users where email = '$email' limit 1");
		if(!empty($row))
		{
			$row = $row[0];
			if(password_verify($password, $row['password'])){

				//all good
				$info['success'] = true;
				$_SESSION['CURRENT_USER'] = $row;
			}
 
		}

		$info['errors']['email'] = "Wrong email or password";
		
	}else
    if($_POST['data_type'] == "get_files"){
    
        // $user_id = 1;
        $user_id = $_SESSION['CURRENT_USER']['id'] ?? null;
        $page = $_POST['page'] ?? 1;
        $mode = 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        switch ($mode) {
            case 'ALL FILES':
                $query = "SELECT * FROM docs WHERE trash = 0 && user_id = '$user_id' ORDER BY id DESC LIMIT $limit OFFSET $offset ";
                break;
            case 'Favourites':
                $query = "SELECT * FROM docs WHERE trash = 0 && favourite = 1 && user_id = '$user_id' ORDER BY id DESC LIMIT $limit OFFSET $offset ";
                break;
            case 'Trash':
                $query = "SELECT * FROM docs WHERE trash = 1 && user_id = '$user_id' ORDER BY id DESC LIMIT $limit OFFSET $offset ";
                break;
            
            default:
                $query = "SELECT * FROM docs WHERE trash = 0 && user_id = '$user_id' ORDER BY id DESC LIMIT $limit OFFSET $offset ";
                break;
        }
        
        $rows = query($query);
        if($rows){
            foreach ($rows as $key => $row) {
                $rows[$key]['file_size'] = round($row['file_size'] / (1024 * 1024))."MB";
                if($rows[$key]['file_size'] === '0MB')
                    $rows[$key]['file_size'] = round($row['file_size'] / (1024)) . "KB";
            }
            $info['rows'] = $rows;
            $info['success'] = true;

        }
        if(!empty($rows))
		{
			foreach ($rows as $key => $row) {

				if(empty($row['file_type'])){

					$rows[$key]['file_type'] = 'folder';
					$row['file_type'] = 'folder';
					
					$rows[$key]['date_updated'] = $row['date_created'];
					$row['date_updated'] = $row['date_created'];
					
					$rows[$key]['file_size'] = 0;
					$row['file_size'] = 0;
					
					$rows[$key]['file_name'] = $row['name'];
					$row['file_name'] = $row['name'];
					
				}

				$parts = explode(".", $row['file_name']);
				$ext = strtolower(end($parts));
				$rows[$key]['icon'] = get_icon($row['file_type'], $ext);
				// $rows[$key]['date_created'] = get_date($row['date_created']);
				// $rows[$key]['date_updated'] = get_date($row['date_updated']);
				// $rows[$key]['file_size'] = round($row['file_size'] / (1024 * 1024)) . "Mb";

				//get shared to data
				$query = "select * from shared_to where file_id = '$row[id]' && disabled = 0";
				$emails = query($query);
				$rows[$key]['emails'] = empty($emails) ? "[]" : json_encode($emails);

				if(!empty($human_readable_file_types[$rows[$key]['file_type']]))
						$rows[$key]['file_type'] = $human_readable_file_types[$rows[$key]['file_type']];
	
				if($rows[$key]['file_size'] == "0Mb")
					$rows[$key]['file_size'] = round($row['file_size'] / (1024)) . "kb";
			}

			$info['rows'] = $rows;
			$info['success'] = true;
		}
        
    }else
    if($_POST['data_type'] == "preview_file")
	{
		//get file from database
		$slug = addslashes($_POST['slug']);
		$user_id = $_SESSION['CURRENT_USER']['id'] ?? 0;

		$sql = "select * from docs where slug = '$slug' limit 1";
		$info['row'] = $row = query_row($sql);
		if(!empty($row))
		{

			$parts = explode(".", $row['file_name']);
			$ext = strtolower(end($parts));
			// $row['icon'] = get_icon($row['file_type'], $ext);
			$row['date_created'] = get_date($row['date_created']);
			$row['date_updated'] = get_date($row['date_updated']);
			$file_size = round($row['file_size'] / (1024 * 1024)) . "Mb";

			if(!empty($human_readable_file_types[$row['file_type']]))
				$row['file_type'] = $human_readable_file_types[$row['file_type']];

			if($file_size == "0Mb"){

				$file_size = round($row['file_size'] / (1024)) . "kb";
			}
			$row['file_size'] = $file_size;

			$info['row'] = $row;
			$info['success'] = true;

			//check file access
			// if(!check_file_access($row))
			// {
			// 	$info['row'] = false;
			// 	$info['success'] = false;
			// }
		}


	} else
    if($_POST['data_type'] == "share_file")
	{

		$id = addslashes($_POST['id'] ?? 0);
		$share_mode = addslashes($_POST['share_mode'] ?? 0);
 		$user_id = $_SESSION['CURRENT_USER']['id'];
 		$emails = $_POST['emails'] ?? "[]";

 		//decode emails
 		$emails = json_decode($emails,true);

 		//disable all email access records
		$query = "update shared_to set disabled = 1 where file_id = '$id' ";
		query($query);

		//save file share mode
		$query = "update docs set share_mode = '$share_mode' where user_id = '$user_id' && id = '$id' limit 1";
		query($query);

		//add new access records
		foreach ($emails as $email) {

			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				continue;
			}

			$query = "select * from shared_to where email = '$email' && file_id = '$id' limit 1";
			$row = query_row($query);

			if($row)
			{
				$query = "update shared_to set disabled = 0 where id = '".$row['id']."' limit 1";
				$row = query_row($query);
			}else{
				$query = "insert into shared_to (file_id,email,disabled) values ('$id','$email',0)";
				query($query);
			}
		}

		$info['success'] = true;
		
	}else
    if($_POST['data_type'] == "user_logout")
	{
		if(isset($_SESSION['CURRENT_USER']))
			unset($_SESSION['CURRENT_USER']);

		$info['success'] = true;

	}else
    if($_POST['data_type'] == "delete_row"){

        $id = addslashes($_POST['id']);
        // $file_type = addslashes($_POST['file_type']);
        $user_id = $_SESSION['CURRENT_USER']['id'];

        $sql = "select * from docs where id = '$id' limit 1";
        $row = query_row($sql);
        if($row)
        {
            if($row['trash'] == 1)
            {
                $query = "delete from docs where id = '$id' && user_id = '$user_id' limit 1";
                // $actually_deleted = true;
            }else{
                $query = "update docs set trash = 1 where id = '$id' && user_id = '$user_id' limit 1";
            }
        }

        // $query = "UPDATE docs SET trash = 1 where id = '$id' && user_id ='$user_id' limit 1";
        query($query);
        $info['success'] = true;
    }else
    if($_POST['data_type'] == "get_favourites"){

        $query = "SELECT * FROM docs WHERE favourite = 1 ORDER BY id DESC LIMIT 15 ";
        
        $rows = query($query);
        if($rows){
            foreach ($rows as $key => $row) {
                $rows[$key]['file_size'] = round($row['file_size'] / (1024 * 1024))."MB";
                if($rows[$key]['file_size'] === '0MB')
                    $rows[$key]['file_size'] = round($row['file_size'] / (1024)) . "KB";
            }
            $info['rows'] = $rows;
            $info['success'] = true;

        }
        
    }
    if($_POST['data_type'] == "get_trash"){

        $query = "SELECT * FROM docs WHERE trash = 1 ORDER BY id DESC LIMIT 15 ";
        
        $rows = query($query);
        if($rows){
            foreach ($rows as $key => $row) {
                $rows[$key]['file_size'] = round($row['file_size'] / (1024 * 1024))."MB";
                if($rows[$key]['file_size'] === '0MB')
                    $rows[$key]['file_size'] = round($row['file_size'] / (1024)) . "KB";
            }
            $info['rows'] = $rows;
            $info['success'] = true;

        }
        
    }
    if($_POST['data_type'] == "add_to_favorites")
    {

        //check if item is already favorited
        // $id = addslashes($_POST['id'] ?? 0);
        $id = $_SESSION['CURRENT_USER']['id'] ?? null;

        $query = "select * from docs where user_id = '$user_id' && id = '$id' limit 1"; 
        $row = query($query);

        if($row)
        {
            $row = $row[0];
            $favorite = !$row['favourite'];

            $query = "update docs set favourite = '$favourite' where user_id = '$user_id' && id = '$id' limit 1";
            query($query);
        }

        $info['success'] = true;
        
    }
    if($_POST['data_type'] == "rename_file")
    {

        //check if item is already favorited
        // $id = addslashes($_POST['id'] ?? 0);
        echo("here");die;
        $id = $_SESSION['CURRENT_USER']['id'] ?? null;
        // $file_name = $_POST['name']

        $query = "select * from docs where user_id = '$user_id' && id = '$id' limit 1"; 
        $row = query($query);

        if($row)
        {
            $row = $row[0];
            $favorite = !$row['favourite'];

            $query = "update docs set name = '$favourite' where user_id = '$user_id' && id = '$id' limit 1";
            query($query);
        }

        $info['success'] = true;
        
    }
}

    echo json_encode($info)
?>