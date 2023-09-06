<div class="container">
    <p>Conteúdo da Home Page: <b>Valor da Cache: </b><?= $cache->get('valueCache'); ?>
    <p>
        <a href="/cleanCache" class="btn btn-primary">Limpar Cache</a>
        <a href="/addCache" class="btn btn-primary">Adicionar Cache</a>
        <a href="/removeCache" class="btn btn-primary">Subtrair Cache</a>

        <?php
        if (!$cache->get('hideArea')) :;
            $cache->save('hideArea', TRUE, 300);
        ?>
    <div class="alert alert-danger">
        <p>Area do Cache</p>
    </div>
<?php endif; ?>
</div>