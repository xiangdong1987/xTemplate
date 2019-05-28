<?php
if (isset($page)) {

    $pagecount = ceil($total / $pagesize);
    $page = str2int($page, 1, 1, $pagecount);
    $end = str2int(str2int($page - 2, 1, 1) + 4, 1, 1, $pagecount);
    $start = str2int($end - 4, 1, 1);
}
?>
<div class="dt-row dt-bottom-row">
    <div class="row">
        <div class="col-sm-8">
            <div class="dataTables_info" id="dt_basic_info">
                <?php echo isset($button) ? $button : ''; ?>
                <?php if (isset($page)): ?>
                    显示第 <?php echo str2int(($page - 1) * $pagesize + 1, 0, 0, $total) ?>
                    到 <?php echo str2int(($page - 1) * $pagesize + $pagesize, 0, 0, $total) ?>
                    条记录，共 <?php echo $total ?> 条记录
                <?php endif ?>
            </div>
        </div>
        <?php if (isset($page) && $pagecount > 1): ?>
            <div class="col-sm-4 text-right">
                <div class="dataTables_paginate paging_bootstrap_full">
                    <ul class="pagination">
                        <li class="first"><a class="ajax-request" data-value="<?php echo \App\tool::genAjaxRequset(array('page', 1)); ?>">首页</a></li>
                        <li class="prev"><a class="ajax-request" data-value="<?php  echo $page > 1 ? \App\tool::genAjaxRequset(array('page', $page-1)) : \App\tool::genAjaxRequset(array('page', 1)); ?>">上一页</a></li>
                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <li<?php echo $page == $i ? ' class="active"' : '' ?>>
                                <a class="ajax-request" data-value="<?php echo \App\tool::genAjaxRequset(array('page', $i)) ?>"><?php echo $i ?></a>
                            </li>
                        <?php endfor ?>
                        <li class="next"><a
                                class="ajax-request" data-value="<?php echo $page + 1 > $pagecount ? \App\tool::genAjaxRequset(array('page', $pagecount)) : \App\tool::genAjaxRequset(array('page', $page+1)) ?>">下一页</a>
                        </li>
                        <li class="last"><a class="ajax-request" data-value="<?php echo \App\tool::genAjaxRequset(array('page', $pagecount)); ?>">尾页</a></li>
                    </ul>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>