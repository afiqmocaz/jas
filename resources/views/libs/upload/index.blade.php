@push('extraStyles')

<style>
/* Adjust the jQuery UI widget font-size: */
.ui-widget {
    font-size: 0.95em;
}
</style>
<!-- blueimp Gallery styles -->
{{-- <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css"> --}}
<link href="{{asset('assets/gallery/jquery.fileupload.css')}}" rel="stylesheet">

<!-- Bootstrap Core CSS -->
<link href="{{asset('assets/jqueryUploader/css/jquery.fileupload.css')}}" rel="stylesheet">
<!-- MetisMenu CSS -->
<link href="{{asset('assets/jqueryUploader/css/jquery.fileupload-ui.css')}}" rel="stylesheet">

@endpush


<!-- The file upload form used as target for the file upload widget -->
<div id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data" style="margin-bottom: 10px">
  <!-- Redirect browsers with JavaScript disabled to the origin page -->
  <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="row fileupload-buttonbar">
      <div class="col-lg-9">
          <div class="am-checkbox" style="float: left;">
              <input type="checkbox" id="file-checkbox" class="toggle" type="checkbox" name="delete"  value="1" class="form-control toggle">
              <label for="file-checkbox" style="padding-left: 10px;"> </label>
          </div>

        <span class="btn btn-success fileinput-button">
          <i class="glyphicon glyphicon-plus hide"></i>
          <span>Add files</span>
          <input id="upFile" type="file" name="files[]" multiple>
        </span>

        <button type="submit" class="btn btn-primary start hidden-sm hidden-xs hide">
          <i class="glyphicon glyphicon-upload hide"></i>
          <span>Muat naik</span>
        </button>
        <button type="reset" class="btn btn-warning cancel hidden-xs hide">
          <i class="glyphicon glyphicon-ban-circle hide"></i>
          <span>Batalkan</span>
        </button>
        <button type="button" class="btn btn-danger delete ">
          <i class="glyphicon glyphicon-trash hide"></i>
          <span>Delete</span>
        </button>
        <!-- The global file processing state -->
        <span class="fileupload-process"></span>
      </div>
      <!-- The global progress state -->
      <div class="col-lg-3 fileupload-progress fade">
        <!-- The global progress bar -->
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar progress-bar-success" style="width:0%;"></div>
        </div>
        <!-- The extended global progress state -->
        <div class="progress-extended">&nbsp;</div>
      </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table role="presentation" class="table table-striped">
      <tbody class="files"></tbody></table>

    <div class="label label-info" style="font-weight:normal"> Allowed File Types : {{str_replace("|", ", ", $docType)}}</div>
    <span class="label label-info" style="font-weight:normal"> Maximum File Size  : <b>{{$maxUpload}}MB</b></span>
</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) { %}

  <tr class="template-upload ">
    <td>
      <span class="preview"></span>
    </td>
    <td>
      <p class="name">{%=file.name%}</p>
      <strong class="error text-danger"></strong>
    </td>

    <td colspan="3">
      <p class="size" >Processing...</p>
      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    </td>
    <td>
      {% if (!i && !o.options.autoUpload) { %}
      <button class="btn btn-primary start" disabled>
        <i class="glyphicon glyphicon-upload"></i>
        <span>Start</span>
      </button>
      {% } %}
      {% if (!i) { %}
      <button class="btn btn-warning cancel">
        <i class="glyphicon glyphicon-ban-circle"></i>
        <span>Cancel</span>
      </button>
      {% } %}
    </td>
  </tr>
  {% } %}
</script>
<!-- The template to display files available for download -->

<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
<tr class="template-download ">

  <td> 
 <div class="am-checkbox">
    <input type="checkbox" name="delete" id="file-{%=file.id||''%}"   value="1" class="form-control toggle" > 
    <label for="file-{%=file.id||''%}"> </label> 
  </div>
  </td>
    <td>
      <span class="preview">
        {% if (file.thumbnailUrl) { %}
        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
        {% } %}
      </span>
    </td>
    <td class="hidden-sm hidden-xs">
      <p class="name">
        {% if (file.url) { %}
        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
        {% } else { %}
        <span>{%=file.name%}</span>
        {% } %}
      </p>
      {% if (file.error) { %}
      <div><span class="label label-danger">Error</span> {%=file.error%}</div>
      {% } %}
    </td>

    <td class="">
      <p class="title"><strong>{%=file.original_filename||''%}</strong></p>
    </td>

    <td class="hidden-sm hidden-xs">
      <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>

    <td>
      {% if (file.deleteUrl) { %}
      <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
        <i class="glyphicon glyphicon-trash hide" title="Delete"></i>
        <span class="">Delete</span>
      </button>
      {% } else { %}
      <button class="btn btn-warning hide">
        <i class="glyphicon glyphicon-ban-circle hide"></i>
        <span>Batalkan</span>
      </button>
      {% } %}
    </td>
  </tr>
  {% } %}
  </script>


  @push('scripts')

  <script id="template-upload" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) { %}
      <tr class="template-upload">
          <td>
              <span class="preview"></span>
          </td>
          <td>
              <p class="name">{%=file.name%}</p>
              <strong class="error"></strong>
          </td>
          <td>
              <p class="size">Processing...</p>
              <div class="progress"></div>
          </td>
          <td>
              {% if (!i && !o.options.autoUpload) { %}
                  <button class="start" disabled>Start</button>
              {% } %}
              {% if (!i) { %}
                  <button class="cancel">Cancel</button>
              {% } %}
          </td>
      </tr>
  {% } %}
  </script>
  <!-- The template to display files available for download -->
  <script id="template-download" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) { %}
      <tr class="template-download">
          <td>
              <span class="preview">
                  {% if (file.thumbnailUrl) { %}
                      <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                  {% } %}
              </span>
          </td>
          <td>
              <p class="name">
                  <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
              </p>
              {% if (file.error) { %}
                  <div><span class="error">Error</span> {%=file.error%}</div>
              {% } %}
          </td>
          <td>
              <span class="size">{%=o.formatFileSize(file.size)%}</span>
          </td>
          <td>
              <button class="delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button>
              <input type="checkbox" name="delete" value="1" class="toggle">
          </td>
      </tr>
  {% } %}
  </script>


  @endpush
