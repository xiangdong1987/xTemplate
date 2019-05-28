<div class="tabs-right">
	<ul class="nav nav-tabs">
		<?php foreach ($tab as $k => $v): ?>
			<li class="<?php echo $v['active'] == 1 ? "active" : "" ?>">
				<a href="<?php echo $v['active'] ? "javascript:void();" : $v['url'] ?>"<?php echo (!$v['active'] && $v['alert']) ? " confirm='" . htmlentities($v['alert'], ENT_QUOTES, "UTF-8") . "'" : "" ?>><?php echo $v['title'] ?></a>
			</li>
		<?php endforeach ?>
	</ul>
	<div class="tab-content">
		<div class="row">
			<?php echo $content ?>
		</div>
	</div>
</div>
