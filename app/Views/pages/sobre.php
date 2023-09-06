<div class="container">
    <p>Conteúdo da Página Sobre
    <p>

        <?php
        $text = 'Mensagem criptografada@!';
        $textCripto = $cripto->encrypt($text);

        echo $textCripto
        ?>
</div>