					<div id="content">
						<div id="box1">
							<?php
							if(isset($_GET['error'])){
								echo "<b><i>$_GET[error]</b></i>";
							}
							else{
									header("Location: /main");
							}
							?>
						</div>
						<br class="clear" />
