<?php
include("dbcon.php");
function query($query){

    global $conn;

    $result = mysqli_query($conn, $query);
    if($result){
        if(!is_bool($result) && mysqli_num_rows($result) > 0){
            $res = [];
            while ($row = mysqli_fetch_assoc($result)){
                $res[] = $row;
            }
            return $res;
        }
    }
    return false;
}
function get_drive_space($user_id){
    $query = "SELECT sum(file_size) as sum FROM docs WHERE user_id = '$user_id'";
    $row = query($query);
    if($row){
        return $row[0]['sum'];
    }
    return 0;
}
function query_row($query)
{
	global $conn;

	$result = mysqli_query($conn, $query);
	if($result)
	{
		if(!is_bool($result) && mysqli_num_rows($result) > 0)
		{
			/*
			$res = [];
			while ($row = mysqli_fetch_assoc($result)) {
				$res[] = $row;
			}

			return $res[0];
			*/
			return mysqli_fetch_assoc($result);
		}
	}

	return false;
}
function generate_slug()
{
	$str = "";

	$a = range(0, 9);
	$b = range('a', 'z');
	$c = range('A', 'Z');

	$array = array_merge($a,$b,$c);
	$array[] = '_';
	$array[] = '-';

	$array_length = count($array) - 1;
	$str_length = rand(10,50);

	for ($i=0; $i < $str_length; $i++) { 
		$key = rand(0,$array_length);
		$str .= $array[$key];
	}
	return $str;
}
function get_icon($type, $ext = null)
{

	$icons = [

		'image/jpeg' => '<i class="bi bi-card-image class_39"></i>',
		'audio/mpeg' => '<i class="bi bi-soundwave class_39"></i>',
		'video/x-matroska' => '<i class="bi bi-film class_31"></i>',
		'video/mp4' => '<i class="bi bi-film class_31"></i>',
		'folder' => '<i class="bi bi-folder class_39"></i>',
		'application/octet-stream' => [
			'psd'=>'<i class="bi bi-filetype-psd class_39"></i>',
			'pdf'=>'<i class="bi bi-earmark-pdf-fill class_39"></i>',
			'sql'=>'<i class="bi bi-filetype-sql class_39"></i>',
		],
		'text/plain' => '<i class="bi bi-filetype-txt class_39"></i>',
		'application/vnd.openxmlformats-officedocument.word' => '<i class="bi bi-file-earmark-word class_40"></i>',
	];

	if($type == 'application/octet-stream')
	{
		return $icons[$type][$ext] ?? '<i class="bi bi-question-square-fill class_39"></i>';
	}

	return $icons[$type] ?? '<i class="bi bi-question-square-fill class_39"></i>';

}
function get_date($date)
{
	return date("jS M Y",strtotime($date));
}

// $query = "select * from docs";
// $rows = query($query);
// if($rows){
//     foreach ($rows as $key => $row){
//         $slug = generate_slug();
//         $id = $row['id'];
//         $query = "update docs set slug = '$slug' where id = '$id' limit 1";
//         query($query);
//     }
// }

?>