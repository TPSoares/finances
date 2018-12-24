<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="POST" action="<?php echo BASE_URL; ?>despesas/create">
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Valor</label>
                <input type="number" name="valor" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Valor">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Despesa</label>
                <input type="text" name="despesa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Despesa ou receita">
            </div>
         
            <button type="submit" class="btn btn-success">Adicionar</button>
            <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>