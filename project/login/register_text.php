<?php
header('Content-type:text/html;charset=utf-8');
$link = mysqli_connect('localhost', 'root', '827827Hy.');
if (!$link) {
    die("连接失败" . mysqli_connect_error());
}
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'user');
$username = $_POST['username'];
$password = $_POST['password'];
$pwd=$_POST['pwd'];
$gender=$_POST['gender']; 
$phone=$_POST['phone'];
$sql = "INSERT INTO users values('{$username}','{$gender}','{$password}','{$pwd}','{$phone}')";
$res = mysqli_query($link, $sql);
 
if (!$res) {
    die("cannot insert " . mysqli_error($link));
}else{
    header('Location:/project/login/login.html');
echo "注册成功<br>";
echo "<a href='login.html'>登录</a>";
}
mysqli_close($link);
?>