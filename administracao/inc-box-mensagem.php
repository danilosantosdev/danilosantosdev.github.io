<?php
    if (isset($_GET['msg']) && isset($_GET['tipoMsg'])) {
        $var = $_GET['msg'];
        $tipoMsg = $_GET['tipoMsg'];

        $msgPartes = explode("/", $var);
        $msg = $msgPartes[0] . $msgPartes[1] . $msgPartes[2] . $msgPartes[3];
        $msg = implode(" ", $msgPartes);
    } else {
        $msg = "";
        $tipoMsg = "";
    }

    if ($msg != "" && $tipoMsg != "") {
        ?>

        <div class="limite">
            <div id="box-mensagem" class="<?= $tipoMsg; ?>">
                <p><?php echo $msg; ?></p>
            </div>
        </div>

        <?php
    }
?>