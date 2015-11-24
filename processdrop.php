<?php

if(isset($_POST))
{
  $username=$_POST['get_option'];
  $db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

  if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
  }

  $sql = "
  SELECT ttlevel
  FROM MyStudents
  WHERE username = '$username'";
  if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
  }

  if($row = $result->fetch_assoc()){
    switch($row['ttlevel']){
        case 1:
            $table='year3levelone';
            break;
        case 2:
            $table='year3leveltwo';
            break;
        case 3:
            $table='year3levelthree';
            break;
        case 4:
            $table='year4levelone';
            break;
        case 5:
            $table='year4leveltwo';
            break;
        case 6:
            $table='year4levelthree';
            break;
        case 7:
            $table='year4levelfour';
            break;
        default:
            echo "Error: contact administrator";
  }
        mysqli_free_result($result);

}

$sql = "
SELECT divlevel
FROM MyStudents
WHERE username = '$username'";
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

if($row = $result->fetch_assoc()){
    switch($row['divlevel']){
        case 1:
            $div='divone';
            break;
        case 2:
            $div='divtwo';
            break;
        case 3:
            $div='divthree';
            break;
        case 4:
            $div='divfour';
            break;
        case 5:
            $div='divfive';
            break;
        case 6:
            $div='divsix';
            break;
        case 7:
            $div='divseven';
            break;
        default:
            echo "Error: contact administrator";
}
        mysqli_free_result($result);

}
$sql = "SELECT ttlevel FROM MyStudents WHERE username = '$username';";
$sql .= "SELECT COUNT(*) FROM $table WHERE username = '$username';";
$sql .= "SELECT divlevel FROM MyStudents WHERE username = '$username';";
$sql .= "SELECT COUNT(*) FROM $div WHERE username = '$username';";

if(mysqli_multi_query($db,$sql)){
    do {
        if($result = mysqli_store_result($db)){
             while($row = mysqli_fetch_row($result)) {
                $activity[] = $row;
             }
             mysqli_free_result($result);
        }
    } while(mysqli_next_result($db));
}

mysqli_close($link);
echo json_encode($activity);

} else {
echo "no data";
}

?>
