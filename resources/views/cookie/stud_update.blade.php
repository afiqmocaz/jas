<html>
<head><title>Student Management | Edit</title></head>
<body>
<?php $i=$startexam?>
<form action="/edit/<?php echo $i ?>" method="post">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<table>
<tr>
<td>Name</td>
<td><input type='text' name='stud_name' value='<?php echo
$users[0]->name; ?>' /></td>
</tr>
<tr>
<td colspan='2'><input type='submit' value="Update student" /></td>
</tr>
</table>
</form>

<a href='{{ $i+1}}'>next</a>
<a href='{{ $i-1}}'>previous</a>
<?php  $i++?>
<?php echo $i?>
</body>
</html>
