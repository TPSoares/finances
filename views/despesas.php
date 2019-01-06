<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <form method="POST" action="<?php echo BASE_URL; ?>despesas/create">
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição</label>
                <input type="text" name="descricao" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Descrição" required="true">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Valor</label>
                <input type="number" step="0.01" name="valor" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Valor" required="true">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Data da despesa</label>
                <input type="date" name="postedDate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Data" required="true">
            </div>

            <div class="radio">
                <label><input type="radio" name="despesa" value="despesa" checked>Despesa</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="despesa" value="receita" >Receita</label>
            </div>

            <div class="form-group">
                <label for="sel1">Selecione uma categoria:</label>
                <select class="form-control" name="categoria" id="sel1">
                    <option>Alimentação</option>
                    <option>Educação</option>
                    <option>Lazer</option>
                    <option>Moradia</option>
                    <option>Pagamentos</option>
                    <option>Roupa</option>
                    <option>Saúde</option>
                    <option>Transporte</option>
                    <option>Outros</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Adicionar</button>
            <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>