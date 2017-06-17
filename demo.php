
<?php

require_once('app/db-connect.php');

if(isset($_GET['txt']))
{
  $va = $_GET['txt'];

$sql = "insert into hello (tt) values ('$va')";
if(mysqli_query($con,$sql)){
  echo 'success';
}
else{
  echo 'failure';
}
}
mysqli_close($con);

?>
