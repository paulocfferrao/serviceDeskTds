<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('usuarios/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Adicionar
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <th>#</th>
                <th>Login</th>
                <!-- <th>Idade</th> -->
                <th>Tipo</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['id'];?></td>
                    <td><?= $item['user'];?></td>
                    <?php if ($item['tipo']=='admin'){
                      $tp='admin';
                    }elseif ($item['tipo']=='tecnico') {
                      $tp='tecnico';
                    }else {
                      $tp='requerente';
                    }
                     ?>
                    <td><?php echo  $tp; ?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('usuarios/cadastrar/'.$item['id']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="<?= site_url('usuarios/remover/'.$item['id']); ?>">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
