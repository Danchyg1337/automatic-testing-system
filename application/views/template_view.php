<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

	Coffeelike by nodethirtythree + Templated.org
	http://templated.org/ | @templatedorg
	Released under the Creative Commons Attribution 3.0 License.
	
	Note from the author: These templates take quite a bit of time to conceive,
	design, and finally code. So please, support our efforts by respecting our
	license: keep our footer credit links intact so people can find out about us
	and what we do. It's the right thing to do, and we'll love you for it :)
	
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>TestMe</title>
        <link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css" />
		<script language="Javascript" type="text/javascript" src="editarea_0_8_2/edit_area/edit_area_full.js"></script>
		<script language="Javascript" type="text/javascript">
		// initialisation
		editAreaLoader.init({
			id: "example_1"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "both"
			,allow_toggle: false
			,word_wrap: true
			,language: "en"
			,syntax: "python"	
		});
		
		// callback functions
		function my_save(id, content){
			alert("Here is the content of the EditArea '"+ id +"' as received by the save callback function:\n"+content);
		}
		
		function my_load(id){
			editAreaLoader.setValue(id, "The content is loaded from the load_callback function into EditArea");
		}
		
		function test_setSelectionRange(id){
			editAreaLoader.setSelectionRange(id, 100, 150);
		}
		
		function test_getSelectionRange(id){
			var sel =editAreaLoader.getSelectionRange(id);
			alert("start: "+sel["start"]+"\nend: "+sel["end"]); 
		}
		
		function test_setSelectedText(id){
			text= "[REPLACED SELECTION]"; 
			editAreaLoader.setSelectedText(id, text);
		}
		
		function test_getSelectedText(id){
			alert(editAreaLoader.getSelectedText(id)); 
		}
		
		function editAreaLoaded(id){
			if(id=="example_2")
			{
				open_file1();
				open_file2();
			}
		}
		
		function open_file1()
		{
			var new_file= {id: "to\\ é # € to", text: "$authors= array();\n$news= array();", syntax: 'php', title: 'beautiful title'};
			editAreaLoader.openFile('example_2', new_file);
		}
		
		function open_file2()
		{
			var new_file= {id: "Filename", text: "<a href=\"toto\">\n\tbouh\n</a>\n<!-- it's a comment -->", syntax: 'html'};
			editAreaLoader.openFile('example_2', new_file);
		}
		
		function close_file1()
		{
			editAreaLoader.closeFile('example_2', "to\\ é # € to");
		}
		
		function toogle_editable(id)
		{
			editAreaLoader.execCommand(id, 'set_editable', !editAreaLoader.execCommand(id, 'is_editable'));
		}
	
	</script>
    </head>
    <body>
		<div id="bg">
			<div id="outer">
				<div id="header">
					<div id="logo">
						<h1>
							<a href="#">TestMe</a>
						</h1>
					</div>
					<div id="nav">
						<ul>
							<li class="first active">
								<a href="/">Главная</a>
							</li>
							<li>
								<a href="/rand">Случайная задача</a>
							</li>
							<li>
								<a href="/comp">Соревнования</a>
							</li>
							<li>
								<a href="/about">Справка</a>
							</li>
							<?php
							if(isset($_SESSION['user'])){
								echo "<li class='last'>
										<a href='/scripts/logout.php'>Выйти</a>
									</li>";
							}
							else{							
							?>
								
							<?php
							}
							?>
							<?php
							if(isset($_SESSION['user'])){
								echo "<li class='last'>
										<a href='/user'>$_SESSION[user]</a>
									</li>";
							}
							else{							
							?>
								<li class="last">
									<a href="/login">Войти</a>
								</li>
							<?php
							}
							?>
						</ul>
						<br class="clear" />
					</div>
				</div>
				<div id="main">
					<div id="sidebar">
						<h3>
							Тестирование
						</h3>
						<p>
							Вы на сайте тестирования, ниже есть разделы.
						</p>
						<h3>
							Категории
						</h3>
						<ul class="linkedList">
							<?php
								for($t=0;$t<$data['max_cats'];$t++){
									if($t==0){
							?>
							<li class="first">
								<a href="/category?id=<?php echo $data[cats][$t][id]; ?> "> <?php echo $data[cats][$t][name]; ?></a>
							</li>
							<?php
									}
									elseif($t==$data['max_cats']){
							?>
							<li class="last">
								<a href="/category?id=<?php echo $data[cats][$t][id]; ?> "> <?php echo $data[cats][$t][name]; ?></a>
							</li>
							<?php 
									}
									else {
							?>
							<li>
								<a href="/category?id=<?php echo $data[cats][$t][id]; ?> "> <?php echo $data[cats][$t][name]; ?></a>
							</li>
							<?php
									}
								}
							?>
						</ul>
					</div>
					<?php
					include "$content_view";
					?>
					<br class="clear" />
				</div>
			</div>
		</div>
	</body>
</html>