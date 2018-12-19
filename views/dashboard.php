
<nav class="navbar navbar-light bg-light justify-content-end">
<p class="navbar-nav mr-auto mt-2 mt-lg-0">Olá, <?php echo $info["nome"]; ?></p>
    
    <a href="<?php echo BASE_URL; ?>dashboard/edit/<?php echo $_SESSION["id"]; ?>" class="btn btn-outline-success" type="button">Editar perfil</a>
    <a href="<?php echo BASE_URL; ?>dashboard/logout" class="btn btn-outline-secondary" type="button">Sair</a>
</nav>