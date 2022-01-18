<div class="container-fluid">
    <div class="row">
        <h1 class="h1-header">Produtos <a href="/Produto/novoProduto"><button class="btn btn-success">Cadastrar Novo</button></a> </h1>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params->produtos as $produto) {  ?>
                        <tr>
                            <td><?= $produto->codigo ?></td>
                            <td><?= $produto->nome ?></td>
                            <td><?= $produto->tipo ?></td>
                            <td><?= self::moneyFormat($produto->valor) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>