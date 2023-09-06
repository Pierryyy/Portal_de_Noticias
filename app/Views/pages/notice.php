<div class="container">
    <div class="card my-3">
        <div class="card-body">
            <img src="/img/notices/<?= $notices['img'] ?>" alt="" class="img-fluid col-md-6 offset-md-3">
            <div class="py-4">
                <?= $notices['description'] ?>
            </div>
        </div>
        <div class="card-footer">
            <b>Autor: </b> <?= $notices['author'] ?>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
</div>