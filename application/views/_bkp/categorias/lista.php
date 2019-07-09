
<div class="container">
  <div class="row">
    <div class="col-sm-12 text-right" style="margin-bottom: 20px;">

      <button data-toggle="collapse" class="btn btn-sm btn-default" data-target="#nueva_categoria">Nuevo Categoría</button>
    </div>


    <div  id="nueva_categoria" class="collapse col-sm-12"><!-- 
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <form action="<?php //echo base_url(); ?>categorias/guardar" method="POST" role="form">
              <div class="col-sm-6">
                <input type="text" name="f_nombre" id="f_nombre" class="form-control" value="" placeholder="Nombre Categoría">
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary pull-right">Crear</button>
              </div>
            </div>
          </form>
        </div>
      </div> -->
    </div>
    <?php if(count($categorias) > 0){ ?>
    <div class="col-sm-12">
      <table class="table">
        <thead>
          <tr>
            <th width="1%"></th>
            <th>Nombre</th>
            <th width="1%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categorias as $categoria) { ?>
          <tr>
            <td><?php echo $categoria->id; ?></td>
            <td><?php echo $categoria->nombre; ?></td>
            <td>
                <a href="<?php echo base_url(); ?>categorias/eliminar/<?php echo $categoria->id; ?>" class="btn btn-sm btn-default">Eliminar</a>
              </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <?php }else{ ?>
    <div class="col-sm-12">
      <div class="panel panel-default ">
        <div class="panel-body text-center">
          <h4>CATEGORIAS</h4>
          No hay categorias creadas
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>