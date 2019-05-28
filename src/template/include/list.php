<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<title><?= Swoole::$php->config['common']['site_name'] ?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php include __DIR__ . '/../include/css.php'; ?>
</head>
<body class="">
<header style="background: #E4E4E4;color: #22201F" id="header">
	<?php include __DIR__ . '/../include/top_menu.php'; ?>
</header>
<aside id="left-panel">
	<?php echo $this->leftmenu ?>
	<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i> </span>
</aside>
<!-- END NAVIGATION -->

<!-- MAIN PANEL -->
<div id="main" role="main">

	<!-- RIBBON -->
	<div id="ribbon">

    <span class="ribbon-button-alignment">
        <span id="refresh" class="btn btn-ribbon" data-title="refresh" rel="tooltip"
			  data-placement="bottom"
			  data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings."
			  data-html="true"><i class="fa fa-refresh"></i></span> </span>

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Home</li>
			<li>Dashboard</li>
		</ol>

	</div>

	<div id="content">
		<!-- row -->
		<?php echo $grid ?>

		<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1"
			 data-widget-editbutton="false" role="widget" style="">


		</div>
		<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-2"
			 data-widget-editbutton="false" role="widget" style="">

		</div>
		<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-3"
			 data-widget-editbutton="false" role="widget" style="">

		</div>
		</article>
		<!-- WIDGET END -->
	</div>
</div>
<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
Note: These tiles are completely responsive,
you can add as many as you like
-->
<div id="shortcut">
	<ul>
		<li>
			<a href="#inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i
						class="fa fa-envelope fa-4x"></i> <span>Mail <span
							class="label pull-right bg-color-darken">14</span></span> </span> </a>
		</li>
		<li>
			<a href="#calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i
						class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
		</li>
		<li>
			<a href="#gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i
						class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
		</li>
		<li>
			<a href="#invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i
						class="fa fa-book fa-4x"></i> <span>Invoice <span
							class="label pull-right bg-color-darken">99</span></span> </span> </a>
		</li>
		<li>
			<a href="#gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i
						class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
		</li>
		<li>
			<a href="javascript:void(0);" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span
					class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
		</li>
	</ul>
</div>
<?php include dirname(__DIR__) . '/include/javascript.php'; ?>
<script src="<?= WEBROOT ?>/apps/static/js/stats.js" type="text/javascript"></script>
<script src="<?= WEBROOT ?>/apps/static/js/list.js" type="text/javascript"></script>
<script>
	$(function () {
		pageSetUp();
//        ListsG.getListsData();
		$("#submit").click(function () {
			$("#form").submit();
		});
	});
</script>

</body>
</html>
