<div class="row">

<!--    <h2 class="row-seperator-header"><i class="fa fa-comments"></i> Block Messages </h2>-->

    <div class="col-sm-12">
        <?php if (!empty($alert)) :?>
            <?php foreach ($alert as $item) :?>
        <div class="alert <?=$item['type'];?> alert-block">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading"></h4>
            <?=$item['title'];?>
            <?php if (isset($item['url'])) :?>
            <p class="text-align-left">
                <br>
                <a href="<?=$item['url'];?>" class="btn btn-sm btn-default"><strong>跳转</strong></a>
            </p>
            <?php endif;?>
        </div>
            <?php endforeach;?>
        <?php endif;?>

    </div>

</div>