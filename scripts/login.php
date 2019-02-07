<?php
require_once "..\application\db.php";
session_start();
	if($_POST['submit']=='login'){
		$login = mysqli_query($db, "SELECT * FROM users WHERE email LIKE '$_POST[email]' AND password LIKE '$_POST[pass]'");
		if(mysqli_num_rows($login)==0){
			header("Location: /login?action=wrong");
		}
		else{
			$user_id = mysqli_fetch_assoc(mysqli_query($db, "SELECT id FROM users WHERE email = '$_POST[email]'"));
			$_SESSION['user']=$_POST['email'];
			$_SESSION['id_user']=$user_id['id'];
			header("Location: /main");
		}
	}
	else{
		$same = mysqli_fetch_assoc(mysqli_query($db, "SELECT email FROM users WHERE email = '$_POST[email]'"));
		if(!empty($same)){
			header('Location: /login?action=same');
		}
		else{
			$register = mysqli_query($db, "INSERT INTO users (email, password) VALUES ('$_POST[email]','$_POST[pass]')")or die(mysql_error());
			$user_id = mysqli_fetch_assoc(mysqli_query($db, "SELECT id FROM users WHERE email = '$_POST[email]'"));
			$_SESSION['user']=$_POST['email'];
			$_SESSION['id_user']=$user_id['id'];
			header('Location: /main');
		}
	
	}