<div class="container-fluid">
    <div class="row">
        <h1 class="h1-header">Registrar venda.</h1>
        <div class="col-5">
            <p>Escolher produtos:</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#Ref</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Imposto</th>
                        <th scope="col">Valor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($params->produtos as $produto) {  ?>
                        <tr>
                            <td><?= $produto->codigo ?></td>
                            <td><?= $produto->nome ?></td>
                            <td><?= $produto->valor_imposto ?>%</td>
                            <td><?= self::moneyFormat($produto->valor) ?></td>
                            <td>
                                <button data-codigo="<?= $produto->codigo ?>" data-produto="<?= $produto->nome ?>" data-imposto="<?= $produto->valor_imposto ?>" data-valor="<?= $produto->valor ?>" type="button" class="add-produto btn btn-success btn-sm">+Add</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-7">
            <p>Lista:</p>
            <form class="needs-validation" action="/Venda/cadastrarVenda" method="POST" id="form-venda">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#Ref</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Qtd</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col">SubTotal Imp.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <div class="totais form-group row" style="display:none">
                    <div class="col-sm-12">
                        <p>Total: <span class="ft-total float-right font-weight-bold"></span> </p>
                        <p>Total Imposto: <span class="ft-total-imposto float-right font-weight-bold"></span> </p>
                        <p>Total + Imposto: <span class="ft-total-geral float-right font-weight-bold"></span> </p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12">
                        <button disabled="disabled" type="submit" class="submit-venda btn btn-primary float-right">Cadastrar Venda</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>