					<div id="content">
						<div id="box1">
							<h3>
								<?php
								echo $data[cat_name][0][name];
								?>
							</h3>
							<p>
								
								<?php echo $data[cat_name][0][text];?>
							</p>
							<ul class="linkedList">
							<?php
								for($t=0;$t<$data['max_tasks'];$t++){
									if($t==0){
							?>
							<li class="first">
								<a href="/task?id=<?php echo $data[tasks][$t][id]; ?> "> <?php echo $data[tasks][$t][name]; ?></a>
							</li>
							<?php
									}
									elseif($t==$data['max_cats']){
							?>
							<li class="last">
								<a href="/task?id=<?php echo $data[tasks][$t][id]; ?> "> <?php echo $data[tasks][$t][name]; ?></a>
							</li>
							<?php 
									}
									else {
							?>
							<li>
								<a href="/task?id=<?php echo $data[tasks][$t][id]; ?> "> <?php echo $data[tasks][$t][name]; ?></a>
							</li>
							<?php
									}
								}
							?>
						</ul>
						</div>
						<br class="clear" />
