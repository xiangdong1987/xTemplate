<el-aside width="200px" style="background-color: #545c64;">
    <el-menu default-active="<?php echo $controller ?>-<?php echo $view ?>" class="el-menu-vertical-demo"
             background-color="#545c64" text-color="#fff" active-text-color="#ffd04b">
        <?php if ($menuList) { ?>
            <?php foreach ($menuList as $menu) { ?>
                <el-submenu index="form">
                    <template slot="title">
                        <i class="<?php echo $menu['icon'] ?>"></i>
                        <span><?php echo $menu['name'] ?></span>
                    </template>
                    <?php foreach ($menu['sub_menus'] as $sub_menu) { ?>
                        <el-menu-item index="<?php echo $sub_menu['controller'] ?>-<?php echo is_array($sub_menu['view']) && in_array($view, $sub_menu['view']) ? $view : $sub_menu['view'] ?>" @click="menuJump('<?php echo $sub_menu["url"]?>')">
                            <?php echo $sub_menu['name'] ?>
                        </el-menu-item>
                    <?php } ?>
                </el-submenu>
            <?php } ?>

        <?php } ?>
    </el-menu>
</el-aside>
<el-container>
