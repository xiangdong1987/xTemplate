<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-<?php echo $width * 2 ?> col-md-<?php echo $width * 2 ?> col-lg-<?php echo $width ?>"  style="margin-left: 15px;">
			<!-- Widget ID (each widget will need unique ID)-->
			<?php foreach ($err as $v): ?>
				<div class="alert alert-danger fade in">
					<button data-dismiss="alert" class="close">
						×
					</button>
					<i class="fa-fw fa fa-times"></i>
					<strong>错误!</strong> <?php echo $v ?>
				</div>
			<?php endforeach ?>
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false"
				 data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>

					<h2><?php echo $title ?></h2>
				</header>

				<div>
					<div class="jarviswidget-editbox">
					</div>

					<div class="widget-body no-padding">
						<form class="smart-form" novalidate="novalidate" method="post"
							  action="<?php echo $action ?>" <?php echo $form_name ? ' name="' . $form_name . '" id="' . $form_name . '"' : "" ?>>
							<?php echo $form ?>
							<footer>
								<input type="hidden" name="submitformname" value="<?php echo $form_name ?>">
								<button type="submit" class="btn btn-primary">
									提交
								</button>
								<button type="button" class="btn btn-default" onclick="window.history.back();">
									返回
								</button>
							</footer>
						</form>
						<script>
							$(function () {
								$("#<?php echo $form_name ?>").validate({
									rules:<?php echo json_encode($rule) ?>,
									messages: <?php echo json_encode($msg) ?>,
									errorPlacement: function (error, element) {
										error.insertAfter(element.parent());
									}
								});
							});
						</script>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>