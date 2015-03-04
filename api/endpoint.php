<script type="text/javascript" src="node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>

    <?php
    $GLOBALS['HTTP_RAW_POST_DATA'];
    foreach ($_POST as $key => $value) {
        if ('UTF-8' != mb_detect_encoding($value, 'auto', true)) {
            $_POST[$key] = utf8_encode($value);
        }
    }
    ?>
<script>
    var data = <?php echo $GLOBALS['HTTP_RAW_POST_DATA']; ?>; 
    var socket = io.connect('http://localhost:8085');
    socket.emit('news', data);
</script>

