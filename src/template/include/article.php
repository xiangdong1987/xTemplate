<section class="">
	<div class="row">
		<?php foreach ($data as $line): ?>
			<?php
			$width = max(0, min(12, floor(12 / count($line))));
			foreach ($line as $item):
				?>
				<article class="col-sm-12 col-md-12 col-lg-<?php echo $width ?>">
					<?php echo $item ?>
				</article>
			<?php
			endforeach;
		endforeach; ?>
	</div>
</section>