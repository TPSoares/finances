
<nav class="navbar navbar-light bg-light justify-content-end">
<p class="navbar-nav mr-auto mt-2 mt-lg-0">Olá, <?php echo $info["nome"]; ?></p>
    
    <a href="<?php echo BASE_URL; ?>dashboard/edit/<?php echo $_SESSION["id"]; ?>" class="btn btn-outline-success" type="button">Editar perfil</a>
    <a href="<?php echo BASE_URL; ?>dashboard/logout" class="btn btn-outline-secondary" type="button">Sair</a>
</nav>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descrição</th>
      <th scope="col">Valor</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

<a href="<?php echo BASE_URL; ?>despesas" class="btn btn-outline-success" type="button">Adicionar despesa/receita</a>
