<div class="container">
  <div class="row">
    <div class="col-sm-12">
        <form name="edit_doc_form" id="edit_doc_form" action="<?php echo base_url(); ?>admin/guardar" method="POST" role="form">

        <div class="form-group">
          <div class="row">
            <div class="col-sm-6">
              <select name="f_categoria" id="f_categoria" class="form-control">
                <option value="">Sin Categoría</option>
                <?php foreach ($categorias as $categorias) {
                  echo '<option value="'.$categorias->id.'">'.$categorias->nombre.'</option>';
                } ?>
                
              </select>
            </div>
            <div class="col-sm-6">
              <input type="text" name="doc_titulo" id="doc_titulo" class="form-control" value="" placeholder="Titulo Corto" maxlength="30">
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="doc_documento" id="doc_documento">
            <h1>Tema del Manual 1</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam vitae molestiae qui nihil labore sint earum enim esse amet ad, molestias, repellat natus beatae ex, in fugit! Ullam et culpa minus delectus! Expedita sed adipisci harum, illum! Aut cupiditate, sapiente ex vel deserunt velit vitae eius. Asperiores reprehenderit suscipit sapiente est, sequi nemo consequuntur optio dolore non nihil provident eaque, nesciunt nulla inventore magnam, natus quod odit quos. Nobis, asperiores officia iusto eveniet. Illum ad voluptatum suscipit officia aliquid aut, et, reiciendis mollitia ipsa fuga laudantium ex porro, eligendi eius. Voluptates hic a ipsam natus temporibus nemo tempora tempore enim.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae porro quis dicta error nemo quaerat ullam quibusdam vel saepe, eum alias, ab. Earum inventore sed possimus, nostrum quam nemo incidunt, repellendus repudiandae nisi error quidem.</p>
            <h2>Tema Secundario 1.1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur illum, reiciendis! Laborum vitae alias neque voluptas illo, aperiam laudantium exercitationem debitis numquam minus voluptate eaque a distinctio non ipsam. Dicta, atque earum esse recusandae quaerat temporibus odit nulla impedit. Sit ipsam quae temporibus voluptates numquam, natus libero commodi voluptatem nemo officiis, atque velit perspiciatis vitae in provident minima vel, odit! Assumenda dolorum, exercitationem voluptates ipsa, omnis dolore sequi reprehenderit provident id eius at totam iure sint? Doloribus autem tempora excepturi et, reprehenderit quasi iusto eaque nulla, eius minus est impedit rem, qui at animi odio consectetur provident molestias placeat veritatis?</p>
            <h2>Tema Secundario 1.2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur illum, reiciendis! Laborum vitae alias neque voluptas illo, aperiam laudantium exercitationem debitis numquam minus voluptate eaque a distinctio non ipsam. Dicta, atque earum esse recusandae quaerat temporibus odit nulla impedit. Sit ipsam quae temporibus voluptates numquam, natus libero commodi voluptatem nemo officiis, atque velit perspiciatis vitae in provident minima vel, odit! Assumenda dolorum, exercitationem voluptates ipsa, omnis dolore sequi reprehenderit provident id eius at totam iure sint? Doloribus autem tempora excepturi et, reprehenderit quasi iusto eaque nulla, eius minus est impedit rem, qui at animi odio consectetur provident molestias placeat veritatis?</p>
            <h2>Tema Secundario 1.3</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur illum, reiciendis! Laborum vitae alias neque voluptas illo, aperiam laudantium exercitationem debitis numquam minus voluptate eaque a distinctio non ipsam. Dicta, atque earum esse recusandae quaerat temporibus odit nulla impedit. Sit ipsam quae temporibus voluptates numquam, natus libero commodi voluptatem nemo officiis, atque velit perspiciatis vitae in provident minima vel, odit! Assumenda dolorum, exercitationem voluptates ipsa, omnis dolore sequi reprehenderit provident id eius at totam iure sint? Doloribus autem tempora excepturi et, reprehenderit quasi iusto eaque nulla, eius minus est impedit rem, qui at animi odio consectetur provident molestias placeat veritatis?</p>
            <h1>Tema del Manual 2</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam vitae molestiae qui nihil labore sint earum enim esse amet ad, molestias, repellat natus beatae ex, in fugit! Ullam et culpa minus delectus! Expedita sed adipisci harum, illum! Aut cupiditate, sapiente ex vel deserunt velit vitae eius. Asperiores reprehenderit suscipit sapiente est, sequi nemo consequuntur optio dolore non nihil provident eaque, nesciunt nulla inventore magnam, natus quod odit quos. Nobis, asperiores officia iusto eveniet. Illum ad voluptatum suscipit officia aliquid aut, et, reiciendis mollitia ipsa fuga laudantium ex porro, eligendi eius. Voluptates hic a ipsam natus temporibus nemo tempora tempore enim.</p>
            <h2>Tema Secundario 2.1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur illum, reiciendis! Laborum vitae alias neque voluptas illo, aperiam laudantium exercitationem debitis numquam minus voluptate eaque a distinctio non ipsam. Dicta, atque earum esse recusandae quaerat temporibus odit nulla impedit. Sit ipsam quae temporibus voluptates numquam, natus libero commodi voluptatem nemo officiis, atque velit perspiciatis vitae in provident minima vel, odit! Assumenda dolorum, exercitationem voluptates ipsa, omnis dolore sequi reprehenderit provident id eius at totam iure sint? Doloribus autem tempora excepturi et, reprehenderit quasi iusto eaque nulla, eius minus est impedit rem, qui at animi odio consectetur provident molestias placeat veritatis?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur illum, reiciendis! Laborum vitae alias neque voluptas illo, aperiam laudantium exercitationem debitis numquam minus voluptate eaque a distinctio non ipsam. Dicta, atque earum esse recusandae quaerat temporibus odit nulla impedit. Sit ipsam quae temporibus voluptates numquam, natus libero commodi voluptatem nemo officiis, atque velit perspiciatis vitae in provident minima vel, odit! Assumenda dolorum, exercitationem voluptates ipsa, omnis dolore sequi reprehenderit provident id eius at totam iure sint? Doloribus autem tempora excepturi et, reprehenderit quasi iusto eaque nulla, eius minus est impedit rem, qui at animi odio consectetur provident molestias placeat veritatis?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur illum, reiciendis! Laborum vitae alias neque voluptas illo, aperiam laudantium exercitationem debitis numquam minus voluptate eaque a distinctio non ipsam. Dicta, atque earum esse recusandae quaerat temporibus odit nulla impedit. Sit ipsam quae temporibus voluptates numquam, natus libero commodi voluptatem nemo officiis, atque velit perspiciatis vitae in provident minima vel, odit! Assumenda dolorum, exercitationem voluptates ipsa, omnis dolore sequi reprehenderit provident id eius at totam iure sint? Doloribus autem tempora excepturi et, reprehenderit quasi iusto eaque nulla, eius minus est impedit rem, qui at animi odio consectetur provident molestias placeat veritatis?</p>

            <h1>Tema del Manual 3</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam vitae molestiae qui nihil labore sint earum enim esse amet ad, molestias, repellat natus beatae ex, in fugit! Ullam et culpa minus delectus! Expedita sed adipisci harum, illum! Aut cupiditate, sapiente ex vel deserunt velit vitae eius. Asperiores reprehenderit suscipit sapiente est, sequi nemo consequuntur optio dolore non nihil provident eaque, nesciunt nulla inventore magnam, natus quod odit quos. Nobis, asperiores officia iusto eveniet. Illum ad voluptatum suscipit officia aliquid aut, et, reiciendis mollitia ipsa fuga laudantium ex porro, eligendi eius. Voluptates hic a ipsam natus temporibus nemo tempora tempore enim.</p>
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
    'code filemanager fontawesome noneditable stylebuttons autolink lists link image textcolor codesample'
  ],
  toolbar: 'code style-h1 style-h2 style-p | bold italic underline backcolor  | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | image link | fontawesome | codesample',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css',
    'https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css']
});
</script>
