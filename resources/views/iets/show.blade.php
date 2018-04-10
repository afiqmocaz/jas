
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
				<div class="panel-heading">Uploaded file</div>
				
				
				<table class="table">
					<tr>
						<td>id</td>
						<td>filename</td>
						<td>mime</td>
						<td>original filename</td>
						<td>created_at</td>
						<td>updated_at</td>
						<td>Action</td>
					</tr>
					<?php
					foreach ($Uploads as $upload) {
					?>
					<tr>
					<td><?php echo $upload->id?></td>
					<td><?php echo $upload->filename?></td>
					<td><?php echo $upload->mime?></td>
					<td><?php echo $upload->original_filename?></td>
					<td><?php echo $upload->created_at?></td>
					<td><?php echo $upload->updated_at?></td>
					}
				</table>
				</div>
		</div>
	</div>		