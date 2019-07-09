<div class="container">
  <div class="row">
    <div class="col-sm-12">
        <form name="edit_doc_form" id="edit_doc_form" action="<?php echo base_url(); ?>admin/guardar" method="POST" role="form">
        <input type="hidden" name="doc_id" id="doc_id" class="form-control" value="<?php echo $doc->id; ?>">

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="doc_titulo" id="doc_titulo" class="form-control" value="<?php echo $doc->titulo; ?>" placeholder="Titulo del Manual (*)">
            </div>
            <div class="col-sm-6">
              <input type="text" name="doc_autor" id="doc_autor" class="form-control" value="<?php echo $doc->autor; ?>" placeholder="Autor">
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="doc_documento" id="doc_documento">
            <?php echo htmlentities($doc->documento); ?>
          </textarea>
        </div>
      
      </form>
    </div>
  </div>
</div>


<script>

  
  $('#edit_wiki').click(function(event){ $('#edit_doc_form').submit(); });

  tinyMCE.PluginManager.add('stylebuttons', function(editor, url) {
    ['pre', 'p', 'code', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'].forEach(function(name){

    switch(name) {
        case 'h1':
            var name_button = 'Tema';
            break;
        case 'h2':
            var name_button = 'SubTema';
            break;
        default:
            var name_button = name;
    }
     editor.addButton("style-" + name, {
         tooltip: "Toggle " + name,
           text: name_button.toUpperCase(),
           onClick: function() { editor.execCommand('mceToggleFormat', false, name); },
           onPostRender: function() {
               var self = this, setup = function() {
                   editor.formatter.formatChanged(name, function(state) {
                       self.active(state);
                   });
               };
               editor.formatter ? setup() : editor.on('init', setup);
           }
       })
    });
  });


// tinymce.init({
//  selector: "textarea",
//     theme: "modern",
//     width: 680,
//     height: 300,
//     subfolder:"",
//     plugins: [
//          "advlist autolink link image lists charmap print preview hr anchor pagebreak",
//          "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
//          "table contextmenu directionality emoticons paste textcolor filemanager"
//    ],
//    image_advtab: true,
//    toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code"
//  });

 
  tinymce.init({
  selector: 'textarea',
  height: 400,
  menubar: false,
  language : 'es',
  codesample_languages: [
      {text: 'HTML/XML', value: 'markup'},
      {text: 'JavaScript', value: 'javascript'},
      {text: 'CSS', value: 'css'},
      {text: 'PHP', value: 'php'},
      {text: 'C', value: 'c'},
      {text: 'C#', value: 'csharp'},
      {text: 'C++', value: 'cpp'}
  ],

  noneditable_noneditable_class: 'fa',
  extended_valid_elements: 'span[*]',

  plugins: [
    'filemanager image fontawesome noneditable stylebuttons autolink lists link image textcolor codesample'
  ],
  toolbar: 'style-h1 style-h2 style-p | bold italic underline backcolor  | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | image link | fontawesome | codesample',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css',
    'https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css']
});
</script>
