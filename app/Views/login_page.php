<div class="container">
    <form action="login" method="post">
        <div class="form-group">
            <label for="user">User</label>
            <input type="text" class="form-control" name="user">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <?= csrf_field(); ?>
        <input type="submit" name="submit" class="btn btn-primary" value="Entrar">
    </form>
</div>