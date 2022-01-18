<div class="container-fluid">
    <div class="row">
        <h1 class="h1-header">Vendas <a href="/Venda/novaVenda"><button class="btn btn-success">Registrar Venda</button></a> </h1>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Codigo</th>
                        <th scope="col">Produtos</th>
                        <th scope="col">Total</th>
                        <th scope="col">Total Imposto</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params->vendas as $venda) {  ?>
                        <tr>
                            <td><?= $venda->codigo ?></td>
                            <td></td>
                            <td><?= self::moneyFormat($venda->total) ?></td>
                            <td><?= self::moneyFormat($venda->imposto) ?></td>
                            <td><?= $venda->data ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>