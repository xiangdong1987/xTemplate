	<div class="col-sm-9">
		<table class="table table-bordered table-striped">
			<thead>
			<tr>
				<th colspan="<?php echo $colspan * 2 ?>"><?php echo $title ?></th>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 0;
			foreach ($field as $v):
				if ($i % $colspan == 0) {
					echo "<tr>";
				}
				?>
				<th<?php if (isset($v[\App\Grid::F_width])) {
					echo ' style="width: ' . $v[\App\Grid::F_width] . '; overflow-x: hidden;"';
				} ?>><?php echo $v['title'] ?></th>
				<th>
					<code><?php echo $show[$v[\App\Grid::F_name]] ?></code>
				</th>
				<?php
				if ($i++ % $colspan == $colspan - 1) {
					echo "</tr>";
				}
			endforeach;
			if (($i - 1) % $colspan != $colspan - 1) {
				for (; ; $i++) {
					echo "<th> </th><th> </th>";
					if ($i % $colspan == $colspan - 1) {
						echo "</tr>";
						break;
					}
				}
			}
			?>
			</tbody>
		</table>
		<?php if ($pager) {
			$this->display('include/page.php', $pager);
		} ?>
	</div>
