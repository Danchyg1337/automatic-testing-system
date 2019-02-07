					<div id="content">
						<div id="box1">
							<?php
							if(isset($_SESSION['user'])){
								echo "<b>$_SESSION[user]</b><br><br>
								Выполненные задачи:
								";
							}
							else{
									header("Location: /main");
							?>
							
							<?php
							}
							?>
						</div>
						<br class="clear" />
