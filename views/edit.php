<div class="container wrapper">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <form method="POST">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" value="<?php echo $info["nome"] ?>" />
                </div>

                <div class="form-group">
                    <label>email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $info["email"] ?>" />
                </div>

                <input type="submit" value="Editar" class="btn btn-primary" />
                <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>
</div>