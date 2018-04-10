
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

@include('libs.upload.uploadScript')

<script>
    $uploadUrl = '{{$url}}';
    $uploadType = '{{$type}}';
    $uploadId = '{{$id}}';
    $uploadMax = '{{$maxUpload}}';
    $category = '{{$category}}';
    $docType1 = /(\.|\/)({{$docType}})$/i;
    $maximumNumberFiles = '{{$maxNumberOfFiles}}';

    $(function () {
        'use strict';
        uploadFileRefresh($uploadType,$uploadId);
    });

    function uploadFileRefresh(type, id){
        $(".template-download").remove();

        // Initialize the jQuery File Upload widget:
        $('#fileupload').fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $uploadUrl+'/'+type+'/'+id+'/'+$category,
            maxFileSize: $uploadMax,
            acceptFileTypes: $docType1,
            autoUpload:true,
            maxNumberOfFiles: parseInt($maximumNumberFiles),
            change : function (e, data) {
                if(data.files.length>5){
                    alert("Maximum number of files allowed are 5.")
                    return false;
                }
            }
        }).on('fileuploadsubmit', function (e, data) {
            data.formData = data.context.find(':input').serializeArray();
        });


        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0],
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                    .call(this, $.Event('done'), {result: result});
        });
    }

</script>
