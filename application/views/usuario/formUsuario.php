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
                <label for="user">Login</label>
                <input id="user" class="form-control" type="user" name="user"
                value="<?= set_value('user', $registro['user']); ?>"
                placeholder="Digite seu user" required>
            </div>

            <?php// if(!isset($registro)){ ?>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input class="form-control" id="senha" type="password" name="senha"
                   min="0" max="150" placeholder="Informe uma senha">
              </div>
            <?php// } ?>

            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" name="tipo">
                <option value="admin" <?php if(isset($registro) && $registro['tipo']=='admin') echo "selected"; ?> >Admin</option>
                <option value="tecnico" <?php if(isset($registro) && $registro['tipo']=='tecnico') echo "selected"; ?> >Técnico</option>
                <option value="requerente" <?php if(isset($registro) && $registro['tipo']=='requerente') echo "selected"; ?> >Requerente</option>

              </select>
            </div>

            <button class="btn btn-success" type="submit">Enviar</button>
          </form>
        </div>
    </div>
</div>
