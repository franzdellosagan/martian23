<?php
include("connection.php");



if(isset($_GET['del_id']))
{
	$id=$_GET['del_id'];
	
	$sql="delete from posts where id='".$id."'";
	$result=mysqli_query($conn,$s);
	
	header('location:index.php');
	
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container py-5">
<div class="row">
<div class="col-lg-12">
<h1 class="text-center">Book Records</h1>
<p class="text-right"><a data-toggle="modal" data-target="#myModal" class="btn btn-primary">Add Book</a></p>
<table class="table table-bordered table-striped" id="content">
</table>
</div>
</div>
</div>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container py-5">
				  <h2>Add Book</h2>
				  <form>
				    <div class="form-group">
				      <label for="email">Title:</label>
				      <input type="text" class="form-control" id="title">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Description:</label>
				      <textarea class="form-control" id="description"></textarea>
				    </div>
  
    <button type="button" id="save" class="btn btn-primary">Submit</button>
  </form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
$(document).ready(function(){
$.ajax({url:"select.php",
success:function(dataabc){
		//console.log(dataabc);
	$("#content").html(dataabc);		
}});


});
</script>

<script>
$('#save').click(function () {

$title = $('#title').val();
$desc = $("#description").val();



$.ajax({url:"insert.php",
method:"POST",
data:{titlecol:$title,desccol:$desc},
success:function(dataabc){
  window.location.href="index.php";
}});


});



</script>
</body>
</html>

