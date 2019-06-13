<div style="display: block;box-shadow: 0 1px 4px rgba(0,21,41,.08)">

    <div style="float: left;height: 56px;width: 56px;">
        <el-radio-group v-model="isCollapse">
            <el-radio-button :label="false">展开</el-radio-button>
            <el-radio-button :label="true">收起</el-radio-button>
        </el-radio-group>
    </div>
    <div class="nav">
        <el-breadcrumb separator="/">
            <el-breadcrumb-item style=""></el-breadcrumb-item>
            <el-breadcrumb-item>首页</el-breadcrumb-item>
            <el-breadcrumb-item><a href="/">活动管理</a></el-breadcrumb-item>
            <el-breadcrumb-item>活动列表</el-breadcrumb-item>
            <el-breadcrumb-item>活动详情</el-breadcrumb-item>
        </el-breadcrumb>
    </div>
</div>
<el-main>
