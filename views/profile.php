<nav class="navbar navbar-light bg-light justify-content-end">
    <a href="<?php echo BASE_URL; ?>dashboard/edit/<?php echo $_SESSION["id"]; ?>" class="btn btn-outline-success" type="button">Editar Perfil</a>
    <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-outline-secondary" type="button">Voltar</a>
</nav>

<div class="d-flex justify-content-around">
    <div class="container">
        <h3><?php echo $info["nome"]; ?></h3>
        <p><?php echo $info["email"]; ?></p>
    </div>
    <div class="container">
        <div id="graficoPizza" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
            <canvas id="mycanvas" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></canvas>
        </div>

        <h3>Despesas</h3>
        <table class="table">
            <thead>
                <?php
                if($despesas["info"] != 0) {
                ?>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Despesa/Receita</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($despesas["total"] as $d) {
                    ?>
                <tr>
                    <td><?php echo $d["descricao"] ?></td>
                    <td><?php echo "R$ " . $d["valor"] ?></td>
                    <td><?php echo $d["despesa"] ?></td>
                    <td><?php echo $d["categoria"] ?></td>
                    <td><?php echo date("d-m-Y", strtotime($d["postedDate"])); ?></td>
                </tr>
                <?php
        //endif if despesas["info"] != 0
                }
                ?>
            </tbody>
        </table>

            <?php
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
    </div>
</div>