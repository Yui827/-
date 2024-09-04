<?php
    //连接数据库
    $db_host="localhost";
    $db_name="root";
    $db_pwd="827827Hy.";
    $link=mysqli_connect($db_host,$db_name,$db_pwd);
    //选择要操作的数据库
    mysqli_select_db($link,'user');
    //设置数据库的格式
    mysqli_query($link,'set name uft-8');
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username!=null && $password!=null){
    $sql="select name,password from users where name='$username' and password='$password'";
    $result=mysqli_query($link,$sql);
    if ($result === false) {
        // 查询失败，输出错误信息
        die('Query failed: ' . mysqli_error($link));
        }
        else{
            header('Location:http://192.168.221.38/project/login/login.html');
        }
        while($row=mysqli_fetch_assoc($result)){
        if($row['name']==$username&&$row['password']==$password){  
        header('Location:http://192.168.221.38/project/html/user.html');
        }else{
        header('Location:http://192.168.221.38/project/login/login.html');
        }
    }
    // 如果存在，验证密码是否正确
    /*if ($username==$row['username'] && $passwored==$row['password']) {
        header('Location: /medicine/page.php');
        exit();
    } else {
        // 用户不存在，显示错误信息
        $error_message = '用户名或密码错误';
        header('Location: /medicine/login/login.php');
        exit();
    }*/}
    else{
        echo "请输入账号密码";
    }
?>