<div class="container-fluid">
    <div class="row">
        <h1 class="h1-header">Tipos de produto <a href="/TipoProduto/novoTipo"><button class="btn btn-success">Cadastrar Novo</button></a> </h1>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Imposto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params->tipos as $tipo) {  ?>
                        <tr>
                            <td><?= $tipo->codigo ?></td>
                            <td><?= $tipo->nome ?></td>
                            <td><?= $tipo->valor_imposto ?>%</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>