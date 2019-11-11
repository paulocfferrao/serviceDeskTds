<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('chamado/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Novo
            </a>
            <a class="btn btn-primary" href="<?= site_url('chamado/index/'.'1'); ?>">
              <i class="fa fa-fw fa-plus"></i>Mostar todos
            </a>


            <div class="list-group">

              <?php foreach($lista as $item):
                      $id = $item['id'];
              ?>

              <a href="<?= site_url('chamado/cadastrar/'.$item['id']); ?>" class="list-group-item list-group-item-action flex-column align-items-start">

                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"><?= $item['titulo'] ?></h5>
                  <small><?= $item['STATUS']?></small>
                </div>
                <p class="mb-1"><?= $item['descricao']?></p>

                <small>Requerente: <?=$item['requerente'];?></small>
              </a>
              <?php endforeach ?>

            </div>
          </div>
        </div>
    </div>
</div>
