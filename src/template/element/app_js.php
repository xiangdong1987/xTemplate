<script>
    new Vue({
        el: '#app',
        data() {
            return <?php echo $data;?>;
        },
        methods: {
            <?php echo implode(',', $methods);?>
        }
    })
</script>
