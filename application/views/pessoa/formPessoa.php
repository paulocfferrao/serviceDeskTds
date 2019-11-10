<div class="row col-md-12">
    <div class="box">
        <div class="box-body">
          <?php
              //verificando se o form_validation retornou erros
              if(validation_errors() != null){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                    <?php echo validation_errors(); //mostra os erros?>
                </div>
          <?php } ?>

          <?php echo form_open($acao); ?>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" class="form-control" type="text" name="nome"
                value="<?= set_value('nome', $registro['nome']); ?>"
                placeholder="Digite seu nome" required>
            </div>

            <div class="form-group">
              <label for="idade">Idade</label>
              <input class="form-control" id="idade" type="number" name="idade" value="<?= set_value('idade', $registro['idade']); ?>"
                 min="0" max="150" placeholder="Informe sua idade">
            </div>

            <div class="form-group">
              <label for="endereco">Endereço</label>
              <input class="form-control" id="endereco" type="text" name="endereco"
                value="<?= set_value('endereco', $registro['endereco']); ?>"
                placeholder="Informe seu endereço">
            </div>

            <div class="form-group">
              <label for="idcidade">Cidade</label>
              <select class="form-control" name="idcidade" required>
                <option value="">Selecione um item da lista</option>
                <?php foreach ($listaCidade as $item): ?>
                    <option value="<?= $item['id']; ?>" <?php if(isset($registro) && $item['id']==$registro['idcidade']) echo "selected";?>>
                        <?= $item['nome']; ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>
            <button class="btn btn-success" type="submit">Enviar</button>
          </form>
        </div>
    </div>
</div>
