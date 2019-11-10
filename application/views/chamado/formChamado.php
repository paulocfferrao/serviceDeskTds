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
                <label for="titulo">Título</label>
                <input id="titulo" class="form-control" type="text" name="titulo"
                value="<?php echo set_value('titulo', $registro['titulo']); ?>"
                placeholder="Título do chamado" required>
            </div>

            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição" rows="5"><?php if(isset($registro['descricao'])){echo $registro['descricao'];} ?></textarea>
            </div>

          <?php  if(isset($registro)){?>

            <div class="form-group">
              <label for="solucao">Solução</label>
              <textarea class="form-control" id="solucao"  name="solucao"
                 placeholder="Solução" rows="5"><?php if(isset($registro['solucao'])){echo $registro['solucao'];} ?></textarea>
            </div>

          <?php }?>

            <button class="btn btn-success" type="submit">Enviar</button>
          </form>
        </div>
    </div>
</div>
