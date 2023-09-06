<div class="container">
    <div class="alert-danger p-3 my-3">
        <?= \Config\Services::validation()->listErrors(); ?>
    </div>
    <form action="<?= '/notices/save' ?> " method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" value="<?= isset($notices['title']) ? $notices['title'] : set_value('title') ?>">
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" name="author" value="<?= isset($notices['author']) ? $notices['author'] : set_value('author') ?>">
        </div>
        <div class="form-group">
            <label for="desciption">Descrição</label>
            <textarea name="description" class="form-control">
                <?= isset($notices['description']) ? $notices['description'] : set_value('description') ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="img">Imagem</label><br>
            <input type="file" name="img">
            
        </div>
        <input type="hidden" name="id" value="<?= isset($notices['id']) ? $notices['id'] : set_value('id') ?>">
        <input type="submit" name="submit" class="btn btn-primary" value="Salvar">
    </form>
</div>