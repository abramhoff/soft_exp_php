<div class="container-fluid">
    <div class="row">
        <h1 class="h1-header">Registrar novo tipo.</h1>
        <div class="col-12">
            <form class="needs-validation" action="/TipoProduto/cadastrarTipo" method="POST" novalidate>

                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="" required>
                        <div class="invalid-feedback">
                            Informe o tipo de produto.
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">Imposto(%)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valor_imposto" id="valor_imposto" placeholder="" data-inputmask="'alias': 'numeric',   'digits': 2, 'radixPoint':'.', 'digitsOptional': false, 'rightAlign': false, 'placeholder': '0'" required>
                        <div class="invalid-feedback">
                            Informe valor do imposto.
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>