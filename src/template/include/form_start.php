<?php
if (isset($err)&&$err) {
    foreach ($err as $v) { ?>
        <div class="alert alert-danger fade in">
            <button data-dismiss="alert" class="close">
                ×
            </button>
            <i class="fa-fw fa fa-times"></i>
            <strong>错误!</strong> <?php echo $v ?>
        </div>
    <?php }
} ?>
<div class="row">
    <article class="col-sm-12 col-md-12 col-lg-12">
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

                    <form method="<?php echo $method ?>" class="smart-form"
                          action="<?php echo $action ?>"<?php echo $form_name ? ' name="' . $form_name . '"' : "" ?>>
                        <header>
                            <?php echo $title ?>
                        </header>

