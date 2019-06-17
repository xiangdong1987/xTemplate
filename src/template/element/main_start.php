<div style="display: block;box-shadow: 0 1px 4px rgba(0,21,41,.08)">

    <div style="float: left;">
        <input type="hidden" v-model="isCollapse">
        <i :class="{'el-icon-s-unfold':isCollapse}" class="el-icon-s-fold"
           style="margin:7px;font-size:30px;height: 36px;width: 36px;color: #606266;" @click="toggleSideBar()"></i>
    </div>
    <div class="nav">
        <el-breadcrumb separator="/">
            <el-breadcrumb-item><a href="<?php echo $index ?>">首页</a></el-breadcrumb-item>
            <el-breadcrumb-item><?php echo strtoupper($currentName); ?></el-breadcrumb-item>
        </el-breadcrumb>
    </div>
</div>
<el-main>
