
  $(document.body).on('click','.{{$deleteClass}}',function(e) {
	that = this;   	
	confirmModal(function(){
	  idAction=$(that).data('id');
	  alert(idAction);
	  var $data={'_method':'DELETE'} 
	  handalAjax("/"+idAction,this,"POST",$data)
	},"Confirm delete");
  })

  $("#{{$selectDeleteId}}").on("click",function(){
    that = this;   	
    confirmModal(function(){

      var $data={
	      '_method':'DELETE',
	      select: JSON.stringify(rows_selected)
	    }; 
      handalAjax("/mult",this,"POST",$data)
    });
  });
