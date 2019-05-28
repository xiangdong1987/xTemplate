<div class="row">
	<!-- NEW WIDGET START -->
	<article class="col-xs-<?php echo $width ?> col-sm-<?php echo $width ?> col-md-<?php echo $width ?> col-lg-<?php echo $width ?> sortable-grid ui-sortable">
		<div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-0"
			 data-widget-editbutton="false" role="widget" style="">
			<header role="heading">
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>

				<h2><?php echo $title ?></h2>
				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
			<div role="content">
				<div id="delete_tip">
				</div>
				<div class="jarviswidget-editbox">

				</div>

				<div class="widget-body no-padding">
					<?php if ($search): ?>
						<div class="widget-body-toolbar" style="height: 40px;">

						</div>
						<div id="dt_basic_wrapper" class="dataTables_wrapper form-inline" role="grid">
							<div class="dt-top-row">
								<div id="data_table_stats_length"
									 style="position: absolute;left: 10px;top: -38px;">
									<?php echo $search; ?>
								</div>
							</div>
						</div>
					<?php endif ?>
					<table id="data_table_stats" class="table table-hover table-bordered table-striped">
						<thead>
						<tr>
							<?php foreach ($field as $v): ?>
								<th<?php if (isset($v[\App\Grid::F_width])) {
									echo ' style="width: ' . $v[\App\Grid::F_width] . '; overflow-x: hidden;"';
								} ?>><?php echo $v[\App\Grid::F_title] ?></th>
							<?php endforeach ?>
						</tr>
						</thead>
						<tbody id="data_table_body">
						<?php
						foreach ($show as $d):
							?>
							<tr height="32">
								<?php foreach ($field as $v): ?>
									<td class=" "><?php echo $d[$v[\App\Grid::F_name]] ?></td>
								<?php endforeach ?>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="pager-box">
					<?php echo isset($pager) ? $pager : ""; ?>
				</div>
			</div>
			<!-- end widget content -->
		</div>
		<!-- end widget div -->
</div>
