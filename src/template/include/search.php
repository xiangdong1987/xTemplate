<?php if ($select): ?>
	<ul class="nav navbar-nav">
		<?php if ($button): ?>
			<?php echo $button ?>
		<?php endif ?>
		<?php foreach ($select as $item): ?>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown"
				   href="javascript:void(0);"> <?php
					$sel = $this->get($item['name']) . '';
					echo isset($item['data'][$sel]) ? $item['data'][$sel] : $item['title'] ?>
					<b
						class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<?php if (isset($_GET[$item['name']]) && $_GET[$item['name']] !== ''): ?>
						<li>
							<a href="<?php echo $this->getQueryString($item['name']), $item['name'], '=' ?>"><?php echo $item['title'] ?></a>
						</li>
					<?php endif ?>
					<?php
					foreach ($item['data'] as $k => $v):
						if ($sel === "$k") {
							continue;
						}
						?>
						<li>
							<a href="<?php echo $this->getQueryString($item['name']), $item['name'], '=', $k ?>"><?php echo $v ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</li>
		<?php endforeach; ?>
	</ul>
<?php
endif;
if ($input):
	?>
	<form class="navbar-form navbar-left" role="search">
		<?php foreach ($input as $k => $v): ?>
			<div class="form-group">
				<input class="form-control" placeholder="<?php echo htmlentities($v['title'], ENT_QUOTES, 'UTF-8') ?>"
				       type="text"
				       name="<?php echo $v['name'] ?>"
				       value="<?php echo isset($_GET[$v['name']]) ? $_GET[$v['name']] : '' ?>">
			</div>
		<?php
		endforeach;;
		foreach ($_GET as $k => $v) {
			if (!isset($input[$k]) && $k != 'page') {
				echo '<input type="hidden" name="' . htmlentities($k, ENT_QUOTES, "UTF-8") . '" value="' . htmlentities($v, ENT_QUOTES, "UTF-8") . '">';
			}
		}
		?>
		<button class="btn btn-default" type="submit">
			搜索
		</button>
	</form>
<?php endif ?>