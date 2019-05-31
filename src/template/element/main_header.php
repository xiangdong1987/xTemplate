<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- import CSS -->
    <link rel="stylesheet" href="../node_modules/element-ui/lib/theme-chalk/index.css">
    <script src="../node_modules/vue/dist/vue.js"></script>
    <script src="../node_modules/element-ui/lib/index.js"></script>
    <style>
        .el-header {
            background-color: #B3C0D1;
            color: #333;
            line-height: 60px;
        }

        .el-aside {
            color: #333;
        }
    </style>
</head>
<body>
<div id="app">
    <el-container style="height: 100%; border: 1px solid #eee;border-radius: 4px;z-index:9999">
        <el-header style="text-align: right; font-size: 12px;background-color: #545c64;color: #FFFFFF;">
            <span style="float: left;width: 160px;text-align: center;font-size: 18px;">xTemplate</span>
            <el-dropdown>
                <i class="el-icon-setting" style="margin-right: 15px;color: #FFFFFF;"></i>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item>查看</el-dropdown-item>
                    <el-dropdown-item>新增</el-dropdown-item>
                    <el-dropdown-item>删除</el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <span>王小虎</span>
        </el-header>
        <el-container>
