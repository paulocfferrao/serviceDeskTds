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
                placeholder="Digite nome da cidade" required>
            </div>

            <div class="form-group">
              <label for="idestado">Estado</label>
              <select class="form-control" name="idestado" required>
                <option value="">Selecione um item da lista</option>
                <?php foreach ($listaEstados as $e): ?>
                    <option value="<?= $e['id']; ?>" <?php if(isset($registro) && $e['id']==$registro['idestado']) echo "selected";?>> 
                        <?= $e['nome']; ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>

            <button class="btn btn-success" type="submit">Enviar</button>
          </form>
        </div>
    </div>
</div>
