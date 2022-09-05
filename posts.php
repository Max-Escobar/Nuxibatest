<?php
session_start();

$i = $_SESSION['i'] +1;
$api_url_posts='https://jsonplaceholder.typicode.com/users/'.$i.'/posts';
$users_data_posts = json_decode(file_get_contents($api_url_posts), true);
for($j=0;$j<10;$j++){
  print_r('userId: '.$users_data_posts[$j]["userId"].'<br>Post id: '.$users_data_posts[$j]["id"].'<br>title: '.$users_data_posts[$j]["title"].'<br>body: '.$users_data_posts[$j]["body"]);
  echo '<pre>';
  $x=$j+1;
  $api_url_comments='https://jsonplaceholder.typicode.com/post/'.$x.'/comments';
  $users_data_comments = json_decode(file_get_contents($api_url_comments), true);
  //print_r($users_data_comments);
  echo'*COMMENTS*<br><br>';
  for($k=0;$k<5;$k++){
    print_r('postId: '.$users_data_comments[$k]["postId"].'<br>Comment id: '.$users_data_comments[$k]["id"].'<br>name: '.$users_data_comments[$k]["name"].'<br>email: '.$users_data_comments[$k]["email"].'<br>body: '.$users_data_comments[$k]["body"]);
    echo '<pre>';
  }
  echo '------------------------------------------------------<br>';
}
echo '<br>';
echo '<a name="back" href="index.php">Home</a>';
