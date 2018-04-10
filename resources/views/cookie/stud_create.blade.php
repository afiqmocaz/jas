<html>
<head><title>Student Management | Add</title></head>
<body>
<form action="/create" method="post">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<table>
<tr>
<td>Name</td>
<td><input type='text' name='stud_name' /></td>
</tr>
<tr>
<td colspan='2'><input href="cookie.stud_edit" type='submit' value="Add student" /></td>


</tr>
</table>
</form>
 <a href="edit/{{$startexam}}" class="btn btn-primary">View Profile</a>
</body>
</html>