
<div class="container">
  <div class="row">
    <div class="col-sm-12 text-right" style="margin-bottom: 20px;">
      <a href="<?php echo base_url(); ?>admin/docnew" class="btn btn-sm btn-default">Nuevo Manual</a>
    </div>

    <?php if(count($docs) > 0){ ?>
      <div class="col-sm-3">
        <div class="panel panel-default">
          <div class="panel-body">
            <ul>
              <?php foreach ($categorias as $categoria) {
               echo '<li>'.$categoria->nombre.'</h1>';
              } ?>
            </ul>
          </div>
        </div>
      </div>
    <div class="col-sm-9">
      <table class="table">
        <thead>
          <tr>
            <th width="1%"></th>
            <th>Titulo</th>
            <th width="1%" class="mismalinea">Creado</th>
            <th width="1%" class="mismalinea">Editado</th>
            <th width="1%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($docs as $doc) { ?>
          <tr>
            <td style="vertical-align: middle;">#<?php echo $doc->id; ?></td>
            <td style="vertical-align: middle;"><?php echo $doc->titulo; ?></td>
            <td style="vertical-align: middle;"><span class="mismalinea"><?php echo $doc->creado_fecha_formateada; ?></span></td>
            <td style="vertical-align: middle;"><span class="mismalinea"><?php echo $doc->actualizado_fecha_formateada; ?></span></td>
            <td >
              <span class="mismalinea">
                <a href="<?php echo base_url(); ?>admin/eliminar/<?php echo $doc->id; ?>" class="btn btn-sm btn-default">Eliminar</a>
                <a href="<?php echo base_url(); ?>admin/docedit/<?php echo $doc->id; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                <a href="<?php echo base_url(); ?>doc/reader/<?php echo $doc->codigo; ?>" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-eye" aria-hidden="true"></i> Ver Manual</a>

                <a href="<?php echo base_url(); ?>doc/pdf/<?php echo $doc->codigo; ?>" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
              </span>
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
          <h4>DOCUMENTOS</h4>
          Usted no posee documentos creados
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>