<script>
    new Vue({
        el: '#app',
        data() {
            return <?php echo $data;?>;
        },
        methods: {
            <?php echo implode(',', $methods);?>,
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            },
            toggleSideBar(){
                this.isCollapse=!this.isCollapse;
            }
        }
    })
</script>
