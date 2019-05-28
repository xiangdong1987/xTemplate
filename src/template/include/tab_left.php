<div class="tabs-left">
	<ul class="nav nav-tabs tabs-left" id="demo-pill-nav" style="margin-right: 0px;">
		<?php foreach ($tab as $k => $v): ?>
			<li class="<?php echo $v['active'] == 1 ? "active" : "" ?>">
				<a href="<?php echo $v['active'] ? "javascript:void();" : $v['url'] ?>"<?php echo (!$v['active'] && $v['alert']) ? " confirm='" . htmlentities($v['alert'], ENT_QUOTES, "UTF-8") . "'" : "" ?>><?php echo $v['title'] ?></a>
			</li>
		<?php endforeach ?>
	</ul>
	<div class="tab-content" style="margin-left: 91px;">
		<div class="row">
			<?php echo $content ?>
		</div>
	</div>
</div>
