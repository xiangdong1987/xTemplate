<?php foreach ($err as $v): ?>
	<div class="alert alert-danger fade in">
		<button data-dismiss="alert" class="close">
			×
		</button>
		<i class="fa-fw fa fa-times"></i>
		<strong>错误!</strong> <?php echo $v ?>
	</div>
<?php endforeach ?>
<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-6">
		<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false"
			 data-widget-custombutton="false">
			<header>
				<span class="widget-icon"> <i class="fa fa-edit"></i> </span>

				<h2><?php echo $title ?> </h2>

			</header>
			<div>
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body no-padding">

					<form class="smart-form"
						  action="<?php echo $action ?>"<?php echo $form_name ? ' name="' . $form_name . '"' : "" ?>>
						<header>
							<?php echo $title ?>
						</header>

						<?php echo $form ?>
						<footer>
							<button type="submit" class="btn btn-primary">
								提交
							</button>
							<button type="button" class="btn btn-default" onclick="window.history.back();">
								返回
							</button>
						</footer>
					</form>
				</div>
			</div>
		</div>
	</article>
</div>