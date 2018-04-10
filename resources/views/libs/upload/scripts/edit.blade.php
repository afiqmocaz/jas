
  jQuery(document).ready(function($){

    $("#{{$editButtonId}}").on('click',function(e) {

      if(!$("#{{$editFormId}}").parsley().validate()) return;

      var $data= $("#{{$editFormId}}").serialize();
      handalAjax("/"+idAction,this,"POST",$data)
    })

  });

  $(document.body).on('click','.{{$editClass}}',function(e) {

    var spinner = '<i class="fa fa-spinner fa-spin" style="font-size:10px" id="spinner"></i>'
    var $current=$(this);
    var $old=$current.html();
    $(this).attr("disabled", true).html(spinner);

    var id=$(this).data('id');

    $("#{{$editFormId}}")[0].reset();

    $.ajax({
	method: "GET",
	url: "{{url($url)}}"+"/"+ id,
	timeout: 2000
    })

    .done(function(data) {
      $("#{{$editFormId}}").deserialize( data );
      idAction=data.id;
      $("#{{$editModalId}}").modal('show');	
    })
    .fail(function() {
      alert( "error" );
    })
    .always(function() {
      $current.attr("disabled", false).html($old);
    });

  })


