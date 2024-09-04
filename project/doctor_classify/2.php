<?php
/*古代名医上古*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/doctor_classify.css">
    <title>Document</title>
</head>
<body>
<div class="nav">
<ul>
			<li>
				<a href="/project/page.php">首页</a>
			</li>
			<li>
				古代名医1
				<div class="droplist">
					<ul>
						<li><a href="/project/doctor_classify/1.php">全部</a>
						<li><a href="/project/doctor_classify/2.php">上古</a></li>
						<li><a href="/project/doctor_classify/3.php">周汉晋</a></li>
						<li><a href="/project/doctor_classify/4.php">南北朝</a></li>
					</ul>
				</div>
			</li>
			<li>
				古代名医2
				<div class="droplist">
					<ul>
						<li><a href="/project/doctor_classify/5.php">隋唐</a></li>
						<li><a href="/project/doctor_classify/6.php">宋元金</a></li>
						<li><a href="/project/doctor_classify/7.php">明代</a></li>
						<li><a href="/project/doctor_classify/8.php">清代</a></li>
					</ul>
				</div>
			</li>
			<li>
				中医典籍
				<div class="droplist">
					<ul>
						<li><a href="/project/book_classify/1.php">全部</a></li>
					</ul>
				</div>
			</li>
			<li>
				中药材1
				<div class="droplist">
					<ul>
						<li><a href="/project/medicine_classify/1.php">解表药</a></li>
						<li><a href="/project/medicine_classify/2.php">清热药</a></li>
						<li><a href="/project/medicine_classify/3.php">泻下药</a></li>
						<li><a href="/project/medicine_classify/4.php">化湿药</a></li>
						<li><a href="/project/medicine_classify//5.php">外用药</a></li>
						<li><a href="/project/medicine_classify/6.php">安神药</a></li>
						<li><a href="/project/medicine_classify/7.php">活血化瘀药</a></li>
					</ul>
				</div>
			</li>
			<li>
				中药材2
				<div class="droplist">
					<ul>
						<li><a href="/project/medicine_classify/8.php">温里药</a></li>
						<li><a href="/project/medicine_classify/9.php">理气药</a></li>
						<li><a href="/project/medicine_classify/10.php">驱虫药</a></li>
						<li><a href="/project/medicine_classify/11.php">收涩药</a></li>
						<li><a href="/project/medicine_classify/12.php">消食药</a></li>
						<li><a href="/project/medicine_classify/13.php">补益药</a></li>
						<li><a href="/project/medicine_classify/14.php">止血药</a></li>
					</ul>
				</div>
			</li>	
			<li>
				中药材3
				<div class="droplist">
					<ul>
						<li><a href="/project/medicine_classify/15.php">涌吐药</a></li>
						<li><a href="/project/medicine_classify/16.php">利水渗湿药</a></li>
						<li><a href="/project/medicine_classify/17.php">开窍药</a></li>
						<li><a href="/project/medicine_classify/18.php">祛风湿</a></li>
						<li><a href="/project/medicine_classify/19.php">化痰止咳平喘药</a></li>
						<li><a href="/project/medicine_classify/20.php">平肝息风药</a></li>
						<li><a href="/project/medicine_classify/21.php">其他</a></li>
					</ul>
				</div>
			</li>
		</ul>
	<div class="home_page">
	<a href="/project/login/login.html">
		<img src="/project/image/about2.jpg" id="picture">
	</a>
	</div>
</div>
	<div class="search">
		<h1> 爱心真挚连千里,医德崇高惠万家</h1>
		<form action="" method="post">
		<input type="text" name="search" value="搜索">
		<button><img src="/project/photos/search.png"></button>
		<div class="recommed">
			<a href="../page.php">首页:</a>
			<a href="../doctor_classify/1.php">古代名医</a>
			<a href="../book_classify/1.php">中医古籍</a>
			<a href="../medicine_classify/1.php">中药材</a>
		</div>
		</form>
		<form action="" method="post">
		<input type="text" name="page_search" value="请输入跳转页面" class="input_2">
        <button class="but_2"><img src="/project/photos/search.png"></button>
		</form>
	</div>
	<div class="background">
	<div class="p">
		<a href="/project/page.php">首页:</a>
		<a href="/project/doctor_classify/2.php">古代名医 -> 上古</a>
	</div>
		<div class="main">
		<?php
			//连接数据库
			$db_host="localhost";
			$db_name="root";
			$db_pwd="827827Hy.";
			$link=mysqli_connect($db_host,$db_name,$db_pwd);
			//选择要操作的数据库
			mysqli_select_db($link,'doctor-book');
			//设置数据库的格式
			mysqli_query($link,'set name uft-8');
			$search=$_POST['search'];
			$page_search=$_POST['page_search'];
			//默认数据
			if($page_search==null){
                $page=$_GET['page']?$_GET['page']:1;
            }else{
                $page=$page_search;
            }
                //每行数据
                $pagesize=30;
                $startpage=($page-1)*$pagesize;
                //拼写sql语句
                $sql="select * from doctor_上古 limit ".$startpage.",".$pagesize." ;";
                $str='select * from doctor_上古 where 古代名医 like "%'.$search.'%"';
                //执行sql语句
                $result=mysqli_query($link,$sql);
				if (!$result) {
					printf("Error: %s\n", mysqli_error($link));
					exit();
				}
				
                $result_search=mysqli_query($link,$str);
				if (!$result_search) {
					printf("Error: %s\n", mysqli_error($link));
					exit();
				}
				
				//执行结果转换结果集 
                if($search==null){
					while($row=mysqli_fetch_assoc($result)){
						echo '<ul><li><a href="'.$row['地址链接'].'" target="_blank">'.$row['古代名医'].'</a></li></ul>';
					}
				}
				else{
					while($row=mysqli_fetch_assoc($result_search)){
						echo '<ul><li><a href="'.$row['地址链接'].'" target="_blank">'.$row['古代名医'].'</a></li></ul>';
					}
				}
		?>
		</div>
		<div class="buttom">
		<?php
		$prvpage=($page-1)?($page-1):1;
		$nextpage=$page+1;
		echo '<a href="/project/doctor_classify/2.php?page='.$prvpage.'">上一页</a>&nbsp;&nbsp;'.'第'.$page.'页'.'&nbsp;&nbsp;<a href="/project/doctor_classify/2.php?page='.$nextpage.'">下一页</a>'			
		?>
		</div></div>
</body>
</html>