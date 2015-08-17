<div id="box-formulario">

    <?php
        if (isset($_GET['msg'])) {
            $var = $_GET['msg'];
            $msgPartes = explode("/", $var);
            $msg = $msgPartes[0] . $msgPartes[1] . $msgPartes[2] . $msgPartes[3];
            $msg = implode(" ", $msgPartes);
        } else {
            $msg = "";
        }

        if ($msg != "") {
    ?>

            <div id="box-email-enviado">
                <p><strong><?php echo $msg; ?></strong></p>
                <p class="dois">Obrigado por usar o formulário de contato!</p>
            </div>

    <?php
        }
    ?>

    <form id="contatoform" name="contatoform" method="post" action="scripts/envia-email.php">

        <fieldset>

            <legend></legend>

            <div class="left">

                <label for="nome">
                    <input type="text" name="nome" value="nome*" onBlur="if(this.value == '') {this.value = 'nome*'}" onFocus="if(this.value == 'nome*') {this.value = ''} else {this.value}" class="estilo-input-text" />
                </label>

                <label for="email">
                    <input type="text" name="email" value="email*" onBlur="if(this.value == '') {this.value = 'email*'}" onFocus="if(this.value == 'email*') {this.value = ''} else {this.value}" class="estilo-input-text" />
                </label>

                <label for="telefone">
                    <input type="text" name="telefone" value="telefone" onBlur="if(this.value == '') {this.value = 'telefone'}" onFocus="if(this.value == 'telefone') {this.value = ''} else {this.value}" class="estilo-input-text" />
                </label>

                <label class="txtObrigatorio" for="" style="width: 150px;">
                    (*) Campos Obrigatórios
                </label>

            </div>

            <div class="right">

                <label class="textarea" for="mensagem">
                    <textarea name="mensagem" class="estilo-textarea" onBlur="if(this.value == '') {this.value = 'mensagem*'}" onFocus="if(this.value == 'mensagem*') {this.value = ''} else {this.value}">mensagem*</textarea>
                </label>

                <a class="estilo-btn" onclick="verificaCamposContato();">Enviar</a>

            </div>

        </fieldset>

    </form>

</div>