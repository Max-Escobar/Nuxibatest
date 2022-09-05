<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users DB</title>
</head>

<body>
<?php
$api_url = 'https://jsonplaceholder.typicode.com/users';
$users_data = json_decode(file_get_contents($api_url), true);
echo '<pre>';
session_start();

for($i=0;$i<10;$i++){
  print_r($users_data[$i]["id"].' '.$users_data[$i]["name"].' ');
  echo '<form method="post"><input type="submit" name="btn-'.$i.'" value="More info"></form>';
}
for($i=0,$print=false;$i<10 && $print==false;$i++){
  if(isset($_POST['btn-'.$i])){
    print_r('User id: '. $users_data[$i]["id"].'<br>-Name: '.$users_data[$i]["name"].'<br>-Username: '.$users_data[$i]["username"].'<br>-Email: '.$users_data[$i]["email"].
    '<br>-Address:<br>Street: '.$users_data[$i]["address"]["street"].'<br>Suite: '.$users_data[$i]["address"]["suite"].'<br>City: '.$users_data[$i]["address"]["city"].'<br>Zipcode: '.$users_data[$i]["address"]["zipcode"].
    '<br>-Geo:<br>Lat: '.$users_data[$i]["address"]["geo"]["lat"].'<br>Lng: '.$users_data[$i]["address"]["geo"]["lng"].
    '<br>-Phone: '.$users_data[$i]["phone"].'<br>-Website: '.$users_data[$i]["website"].
    '<br>-Company:<br>Name: '.$users_data[$i]["company"]["name"].'<br>Catch Phrase: '.$users_data[$i]["company"]["catchPhrase"].'<br>Bs: '.$users_data[$i]["company"]["bs"].'<br>');
    echo '<a name="btnp-'.$i.'" href="posts.php">Posts</a>';
    echo '<br>';
    echo '<a name="btnt-'.$i.'" href="todos.php">To Dos</a>';
    $print = true;
    $_SESSION['i']=$i;
  }
}

  

?>
</body>
</html>

