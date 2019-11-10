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
              <label for="idestado">Objeto</label>
              <select class="form-control" name="idobjeto" required>
                <option value="">Selecione um item da lista</option>
                <?php foreach ($listaObjetos as $item): ?>
                    <option value="<?= $item['id']; ?>" <?php if(isset($registro) && $item['id']==$registro['idobjeto']) echo "selected";?>>
                        <?php echo '(' . $item['tipo'] . ') ' . $item['nome']; ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="idestado">Pessoa</label>
              <select class="form-control" name="idpessoa" required>
                <option value="">Selecione um item da lista</option>
                <?php foreach ($listaPessoas as $item): ?>
                    <option value="<?= $item['id']; ?>" <?php if(isset($registro) && $item['id']==$registro['idobjeto']) echo "selected";?>>
                        <?= $item['nome']; ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="idestado">Data Empréstimo</label>
              <input class="form-control" type="date" name="data_emprestimo" value="<?= ($registro!=null)? $registro['data_emprestimo'] : date('Y-m-d'); ?>">
            </div>
            <button class="btn btn-success" type="submit">Enviar</button>
            <a href="<?= site_url('emprestimo'); ?>" class="btn btn-info">Cancelar</a>
          </form>
        </div>
    </div>
</div>
