<?php
session_start();

$i = $_SESSION['i'] +1;
$api_url_todos='https://jsonplaceholder.typicode.com/users/'.$i.'/todos';
$users_data_todos = json_decode(file_get_contents($api_url_todos), true);
$keys=[];
for($j=0;$j<20;$j++){
  array_push($keys,$users_data_todos[$j]["id"]);
}
$master = array_combine($keys,$users_data_todos);
rsort($master);
for($j=0;$j<20;$j++){
  print_r('userId: '.$master[$j]["userId"].'<br>id: '.$master[$j]["id"].'<br>title: '.$master[$j]["title"].'<br>completed: ');
  if($master[$j]["completed"]==1){
    echo 'true';
  }else{
    echo'false';
  }
  echo '<pre>';
}
echo '<br>';
echo '<a name="back" href="index.php">Home</a>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To Do's</title>
</head>
<body>
  <form action="" method="POST">
    <p>Title: <input type="text" name="title" value=""></p>
    <p>Completed: <input type="checkbox" name="completed" value=""></p>
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    echo 'Title: '.$_POST['title'].'<br />';
    echo 'Id: 201';
  }
  ?>