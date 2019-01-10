<nav class="navbar navbar-light bg-light justify-content-end">
    <a href="<?php echo BASE_URL; ?>dashboard/edit/<?php echo $_SESSION["id"]; ?>" class="btn btn-outline-success" type="button">Editar Perfil</a>
    <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-outline-secondary" type="button">Voltar</a>
</nav>
<!-- Main div -->
<div class="d-flex justify-content-around">
<!-- User info on the left side -->
    <div class="container">
        <h3><?php echo $info["nome"]; ?></h3>
        <p><?php echo $info["email"]; ?></p>
    </div>
<!-- End User info on the left side -->
<!-- Chart -->
    <div class="container">
        <label id="chartLabel" for="chart">Selecione uma categoria:</label>
        <select class="form-control" name="selectedChart" id="chart" onchange="changeChart(); teste()">
            <option value="bar">Barra</option>
            <option value="pie">Pizza</option>
            <option value="doughnut">Rosquinha</option>
            <!-- <option value="radar">Radar</option> -->
            <option value="polarArea">Polar area</option>
        </select>
        <div id="graficoPizza" style="min-width: 310px; min-height: 350px; max-width: 600px; margin: 0 auto">
            <canvas id="mycanvas" style="min-width: 310px; min-height: 310px; max-width: 600px; margin: 0 auto"></canvas>
        </div>

<!-- End Chart -->
<!-- Finances -->
        <h3>Despesas</h3>
        <form action="<?php echo BASE_URL; ?>profile" method="POST">
            <label id="category" for="sel1">Selecione uma categoria:</label>
                    <!-- <select class="form-control" name="ca" id="sel1" onchange="this.form.submit();"> -->
                    <select class="form-control" name="selectedCategory" id="sel1">
                        <option>Todas</option>
                        
                        <?php
                            foreach ($categorias as $c) {
                                ?>
                                <option  value="<?php echo $c["categoria"]; ?>"><?php echo $c["categoria"] ?></option>
                        <?php
                            }
                            ?>
                    </select>
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
                    foreach ($selectedCategories as $d) {
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

            <input type="submit" class="btn btn-outline-success" value="Filtrar categoria"/>

        </form>
    </div>
<!-- End Finances -->
</div>