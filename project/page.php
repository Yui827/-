<?php
/*古代名医全部*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- 引入css文件 -->
	<link rel="stylesheet" href="./css/page.css">
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
		<h1>救死扶伤尽天职,嘘寒问暖众人夸</h1>	
		<form action="" method="post">
		<input type="text" name="search" value="">
		<button><img src="/project/photos/search.png"></button>
		</form>
		<div class="recommed">
			<a href="page.php">首页:</a>
			<a href="/project/doctor_classify/1.php">古代名医</a>
			<a href="/project/book_classify/1.php">中医古籍</a>
			<a href="/project/medicine_classify/1.php">中药材</a>
		</div>
	</div>
	<div class="background">
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
                $pagesize=45;
                $startpage=($page-1)*$pagesize;
                //拼写sql语句(古代名医)
                $str_doc="select * from doctor_全部 limit ".$startpage.",".$pagesize." ;";
                //拼写sql语句(中医古籍)
                $ser='select * from 全部 where name like "%'.$search.'%"';
                $str_book="select * from book limit ".$startpage.",".$pagesize." ;";
                //执行sql语句
                $result_search=mysqli_query($link,$ser);
                $result_doc=mysqli_query($link,$str_doc);
                $result_book=mysqli_query($link,$str_book);
				//执行结果转换结果集 
				?>
				<div class="list_doc">
				<div class="list_one">
				<?php
                if($search==null){
                    echo "<p>古代名医:</p>";
					while($row=mysqli_fetch_assoc($result_doc)){
						echo '<ul><li><a href="'.$row['地址链接'].'" target="_blank">'.$row['古代名医'].'</a></li></ul>';
					}
				?>
					<div class="list_a">
						<a href="/project/doctor_classify/1.php">详细</a>
					</div>
				</div>
			</div>
				<div class="list_book">
				<div class="list_two">
				<?php
                    echo "<p>中医古籍:</p>";
                    while($row=mysqli_fetch_assoc($result_book)){
						echo '<ul><li><a href="'.$row['地址链接'].'" target="_blank">'.$row['中医典籍'].'</a></li></ul>';
					}
				}
				else{
					while($row=mysqli_fetch_assoc($result_search)){
						echo '<ul><li><a href="'.$row['地址链接'].'" target="_blank">'.$row['name'].'</a></li></ul>';
					}
				}
		?>
		<div class="list_a">
			<a href="/project/book_classify/1.php">详细</a>
		</div>
		</div>
	</div>

		<div class="list_medicine">
			<div class="list_three">
			<?php
			//连接数据库
			$db_host="localhost";
			$db_name="root";
			$db_pwd="827827Hy.";
			$link=mysqli_connect($db_host,$db_name,$db_pwd);
			//选择要操作的数据库
			mysqli_select_db($link,'sql_medicine');
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
                $pagesize=300;
                $startpage=($page-1)*$pagesize;
                //拼写sql语句(中药材)
                $ser='select * from 药材名 where name like "%'.$search.'%"';
                $str_medicine="select * from medicine limit ".$startpage.",".$pagesize." ;";
                //执行sql语句
                $result_search=mysqli_query($link,$ser);
                $result_medicine=mysqli_query($link,$str_medicine);
				//执行结果转换结果集 
				?>
				<?php
                if($search==null){
                    echo "<p>中药材:</p>";
					while($row=mysqli_fetch_assoc($result_medicine)){
						echo '<ul><li><a href="'.$row['地址链接'].'" target="_blank">'.$row['药材名'].'</a></li></ul>';
					}
				}
				else{
					while($row=mysqli_fetch_assoc($result_search)){
						echo '<ul><li><a href="'.$row['地址链接'].'" target="_blank">'.$row['药材名'].'</a></li></ul>';
					}
				}
		?>
			<div class="list_a_a">
				<a href="/project/medicine_classify/1.php">详细</a>
			</div>
		</div>
		</div>
		<?php
		#echo '<div class="buttom">';
		#$prvpage=($page-1)?($page-1):1;
		#$nextpage=$page+1;
		#echo '<a href="/medicine/doctor_classify/1.php?page='.$prvpage.'">上一页</a>&nbsp;&nbsp;'.'第'.$page.'页'.'&nbsp;&nbsp;<a href="/medicine/doctor_classify/1.php?page='.$nextpage.'">下一页</a>'			
		#echo '</div>';
		?>
	</div>
</body>
</html>