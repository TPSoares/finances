<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Descrição" value="<?php echo $despesasInfo["descricao"] ?>" required="true">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Valor</label>
                <input type="number" name="valor" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Valor"  value="<?php echo $despesasInfo["valor"] ?>" required="true">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Data da despesa</label>
                <input type="date" name="postedDate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data"  value="<?php echo $despesasInfo["postedDate"] ?>" required="true">
            </div>

            <div class="radio">
                <label><input type="radio" name="despesa" value="despesa" checked>Despesa</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="despesa" value="receita" >Receita</label>
            </div>

            <button type="submit" class="btn btn-success">Editar</button>
            <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>