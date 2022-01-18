<div class="container-fluid">
    <div class="row">
        <h1 class="h1-header">Registrar novo produto.</h1>
        <div class="col-12">
            <form class="needs-validation" action="/Produto/cadastrarProduto" method="POST" novalidate>

                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do produto" required>
                        <div class="invalid-feedback">
                            Informe o nome do produto.
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
                    <div class="col-sm-10">
                        <select name="produto_tipo" class="form-control" required>
                            <option selected disabled></option>
                            <?php foreach($params->tipos as $tipos){ ?>
                                <option value="<?=$tipos->codigo?>"><?=$tipos->nome?></option>
                            <?php } ?>
                        </select>

                        <div class="invalid-feedback">
                            Informe o tipo do produto.
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label">Preço</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valor" id="valor" placeholder="Preço do produto" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'radixPoint':',', 'digitsOptional': false, 'rightAlign': false,'prefix': 'R$ ', 'placeholder': '0'" required>
                        <div class="invalid-feedback">
                            Informe o preço.
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