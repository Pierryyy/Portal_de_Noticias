<div class="container">
    <?php
    $session = $data['session'] = \Config\Services::session();
    if ($session->get('logged_in')) : ?>
        <a href="<?= '/notices/insert' ?>" class="btn btn-primary">Adicionar Notícia</a>
    <?php endif; ?>
    <?php if (!empty($notices) && is_array($notices)) : ?>
        <?php foreach ($notices as $notices_item) : ?>
            <div class="card my-5">
                <div class="card-body">
                    <h3><?= $notices_item['title'] ?></h3>
                    <p><?= $notices_item['description'] ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?= '/notices/' . $notices_item['id'] ?>" class="btn btn-success">Saiba mais</a>
                    <?php
                    $session = $data['session'] = \Config\Services::session();
                    if ($session->get('logged_in')) : ?>
                        <a href="<?= '/notices/edit/' . $notices_item['id'] ?>" class="btn btn-warning">Editar</a>
                    <?php endif; ?>
                    <?php
                    $session = $data['session'] = \Config\Services::session();
                    if ($session->get('logged_in')) : ?>
                        <a href="<?= '/notices/delete/' . $notices_item['id'] ?>" class="btn btn-danger">Excluir</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach ?>

        <div>
            <?= $pager->links() ?>
        </div>

    <?php else : ?>
        <h3>Sem Notícias</h3>
        <p>Não existe nenhuma noticia cadastrada no Sistema!</p>
    <?php endif ?>
</div>