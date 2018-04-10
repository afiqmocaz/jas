<?php session_start(); ?>

<!DOCTYPE html>

<html>
<head>
<script>function passData(id,ps) {console.log(id);
        // document.getElementById("special").value = js;
		document.getElementById("special").value = ps;
        $('.modal-content #myForm').attr('action', '/edit/' + id);
    
    }
	</script>
<style type="text/css">
	body
						{
							    counter-reset: Serial;           /* Set the Serial counter to 0 */
							}

						tr td:first-child:before
							{
							  counter-increment: Serial;      /* Increment the Serial counter */
							  content:counter(Serial); /* Display the counter */
							}
</style>

	{!!Html::style('css/bootstrap.min.css')!!}
  	{!!Html::style('css/justified-nav.css')!!}
  	{!!Html::style('css/templatemo_style.css')!!}
  	{!!Html::style('css/parsley.css')!!}

<h3><center>Specialized Area</center></h3>

<div class="row">

	<div class="col-md-3">
		<div class="well">

			{!! Form::open(['route' => 'specialized.store', 'method' => 'POST']) !!}

			{{ Form::label('specialized', 'Specialized Area:') }}
			{{ Form::text('specialized', null, ['class' => 'form-control']) }}<br>

			{{ Form::submit('Add Specialized Area', ['class' => 'btn btn-success btn-block']) }}

			{!! Form::close() !!}
			
		</div>
	</div>


	<div class="col-md-8">
		
		<table class="table table-bordered" style="width:100%">
			<thead>
				<tr>
					<th style="width:1%"><center>No</center></th>
					<th style="width:90%"><center>Specialized Area</center></th>
					<th style="width:5%"><center>Action</center></th>
				</tr>
			</thead>

			<tbody>
				@foreach($specializes as $category)
				<tr>
					<td>
          </td></td>
					<td><center>{{ $category->specialized }}</center></td>
					
					<td>{!! Form::open(['route' => ['specialized.destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}

				        	{!! Form::image('images/delete.ico', 'a Delete', ['type' => 'submit', 'class' => 'img-responsive cleaner', 'width' => '17', 'title' => 'Delete'] ) !!}	

				        	{!! Form::close() !!}
				        	
       </a></td>

          <td> <a href="#" class="kemaskiniLink" data-toggle="modal" data-target="#kemaskini-ps"  onclick="passData('{{ $category->id }}','{{ $category->specialized }}');" >{{ HTML::image('/image/edit.png', 'a Edit', array('width' => '30', 'height' => '30', 'title' => 'Edit')) }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div id="kemaskini-ps" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Specialized Area</h4>
        </div>
        <form id="myForm" method="post" class="form-horizontal">
                    {{ csrf_field() }}  
                    <div class="modal-body">
                        <table class="table table-bordered table-responsive form-group">
                            <td class="hide"><input id="type" name="type" type="text" value="0" class="form-control"></td>
                            <tr>
                                                                <input id="special" name="name" type="text" class="form-control">
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <input type="submit" class="btn btn-primary" value="Kemaskini" aria-hidden="true">
                    </div>
                </form>
      </div>
    </div>
  </div>
{!! Html::script('js/parsley.min.js')!!}
	{!! Html::script('js/jquery.js')!!}
	{!! Html::script('js/bootstrap.min.js')!!}
	{!! Html::script('js/templatemo_script.js')!!}
    <!-- templatemo 393 fantasy -->
    <!--<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/templatemo_script.js"></script>-->
</body>
</html>