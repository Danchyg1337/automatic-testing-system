									<div id="content">
						<div id="box1">
							<h3>
								<?php
								echo $data[task][0][name];
								?>
							</h3>
							<p>
								
								<?php echo $data[task][0][text];?>
							</p>
							<p>
								<b>Входные данные</b><br>
								<?php echo $data[task][0][input];?>
							</p>
							<p>
								<b>Выходные данные</b><br>
								<?php echo $data[task][0][output];?>
							</p>
							<form action="scripts/load.php?id=<?php echo "$_GET[id]"; ?>" method="POST">
							<textarea id="example_1" name="code" rows="30" cols="103"></textarea>
							<select name="select">
								<option selected value="python">Python</option>
								<option value="c++">C++</option>
							</select><br>
							<input type="submit"></input>
							
							
							
							</form>
						</div>
						<br class="clear" />
