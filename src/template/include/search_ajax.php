<?php if ($select): ?>
    <ul class="nav navbar-nav">
        <?php if ($button): ?>
            <?php echo $button ?>
        <?php endif ?>
        <?php foreach ($select as $item): ?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown"
                   href="javascript:void(0);"> <?php
                    $sel = $this->post($item['name']) . '';
                    echo isset($item['data'][$sel]) ? $item['data'][$sel] : $item['title']; ?>
                    <b
                        class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php if (isset($_POST[$item['name']]) && $_POST[$item['name']] !== ''): ?>
                        <li>
                            <a class="ajax-request" data-value='<?=\App\tool::genAjaxRequset(array($item['name'] => ''))?>'><?php echo $item['title'] ?></a>
                        </li>
                    <?php endif ?>
                    <?php
                    foreach ($item['data'] as $k => $v):
                        if ($sel === "$k") {
                            continue;
                        }
                        ?>
                        <li>
                            <a class="ajax-request" data-value='<?=\App\tool::genAjaxRequset(array($item['name'] =>$k))?>'><?php echo $v ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
endif;
if ($input):
    ?>
    <form class="navbar-form navbar-left" role="search">
        <?php foreach ($input as $k => $v): ?>
            <div class="form-group">
                <input class="form-control" placeholder="<?php echo htmlentities($v['title'], ENT_QUOTES, 'UTF-8') ?>"
                       type="text"
                       name="<?php echo $v['name'] ?>"
                       value="<?php echo isset($_POST[$v['name']]) ? $_POST[$v['name']] : '' ?>">
            </div>
            <?php
        endforeach;;
        foreach ($_POST as $k => $v) {
            if (!isset($input[$k]) && $k != 'page') {
                echo '<input type="hidden" name="' . htmlentities($k, ENT_QUOTES, "UTF-8") . '" value="' . htmlentities($v, ENT_QUOTES, "UTF-8") . '">';
            }
        }
        ?>
        <button class="btn btn-default" type="submit">
            搜索
        </button>
    </form>
<?php endif ?>