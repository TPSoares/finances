
<nav class="navbar navbar-light bg-light justify-content-end">
<p class="navbar-nav mr-auto mt-2 mt-lg-0">Olá, <?php echo $info["nome"]; ?></p>
    
    <a href="<?php echo BASE_URL; ?>profile/" class="btn btn-outline-success" type="button">Perfil</a>
    <a href="<?php echo BASE_URL; ?>dashboard/logout" class="btn btn-outline-secondary" type="button">Sair</a>
</nav>

<table class="table">
  <thead>
    <?php
      if($despesas["info"] != 0) {
    ?>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descrição</th>
      <th scope="col">Valor</th>
      <th scope="col">Despesa/Receita</th>
      <th scope="col">Categoria</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($despesas["info"] as $d) {
        ?>
        <tr>
          <td><?php echo $d["id"] ?></td>
          <td><?php echo $d["descricao"] ?></td>
          <td><?php echo "R$ " . $d["valor"] ?></td>
          <td><?php echo $d["despesa"] ?></td>
          <td><?php echo $d["categoria"] ?></td>
          <td><?php echo date("d-m-Y", strtotime($d["postedDate"])); ?></td>
          <td><a href="<?php echo BASE_URL; ?>despesas/edit/<?php echo $d["id"]; ?>" class="btn btn-outline-success" type="button">Editar</a></td>
          <td><a href="<?php echo BASE_URL; ?>despesas/delete/<?php echo $d["id"]; ?>" class="btn btn-outline-danger" type="button">Deletar</a></td>

        </tr>
        
  </tbody>
</table>

<div class="d-flex justify-content-center">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
        <li class="<?php if( $despesas["paginator"]["pageno"] <= 1){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if( $despesas["paginator"]["pageno"] <= 1){ echo '#'; } else { echo "?pageno=".( $despesas["paginator"]["pageno"] - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if( $despesas["paginator"]["pageno"] >= $despesas["paginator"]["totalPages"]){ echo 'disabled'; } ?>">
            <a class="page-link" href="<?php if( $despesas["paginator"]["pageno"] >= $despesas["paginator"]["totalPages"]){ echo '#'; } else { echo "?pageno=".( $despesas["paginator"]["pageno"] + 1); } ?>">Next</a>
        </li>
        <li><a class="page-link" href="?pageno=<?php echo $despesas["paginator"]["totalPages"]; ?>">Last</a></li>
    </ul>

  
  </nav>
</div>

<?php
  //endif if despesas["info"] != 0
      }
    } else {
      ?>

      <div class="d-flex justify-content-center">
        <p>Você ainda não possui despesas. Comece adicionando uma.</p>
      </div>
      <?php
    }
    ?>

<?php 
  //total de despesas por usuário
  $totalFinances = 0;
  if($despesas["total"] != 0) {
    foreach ($despesas["total"] as $total) {
      $totalFinances += $total["valor"];
    } 
  }
  
  ?>
<p>Total: <?php echo $totalFinances; ?> </p>

<a href="<?php echo BASE_URL; ?>despesas" class="btn btn-outline-success" type="button">Adicionar despesa/receita</a>
