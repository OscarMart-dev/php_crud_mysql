<?php include("db.php")?>

<?php include ("includes/header.php")?>

<div class="container p-4">

	<div class="row">

		<div class="col-md-4">	
 		
 		<?php if(isset($_SESSION['message'])){ ?>
 			<div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
   			<?= $_SESSION ['message'] ?>

   			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 			</div>
 		<?php session_unset();} ?>

 		<div class="card card-body">
 			<form action="save_task.php" method="POST" enctype="multipart/form-data"> 
 				<div class="form-group">
 					<input type="text" required name="name" class="form-control" placeholder="Name" autofocus>

 				</div>
 				<br>

 				<div class="form-group">
 					<input type="text" required name="last_name" class="form-control" placeholder="Last Name" autofocus>

 			 	</div>
 				<br>

 				<div class="form-group">
 					<input type="int" required name="identity_document" class="form-control" placeholder="Identity Document" autofocus>
 				</div>
 				<br>

 				<div class="form-group">
 					<input type="int" required name="address" class="form-control" placeholder="Address" autofocus>
 				</div>
 				<br>

 				<div class="form-group">
 					<input type="int" required name="phone" class="form-control" placeholder="Phone" autofocus>
 				</div>
 				<br>

 				<div class="form-group">
 					<label for="Photo" class="col-sm-2 control-label">Photo</label>
 					<input type="file" required class="form-control" name="photos" accept="image/*">
 				</div>
 				<br>

 				<!--comment
 				<div class="form-group">
 					<textarea name="descripcion" rows="2" class="form-control" placeholder="task description"></textarea>
 					<br>
 				</div>-->
 				<input type="submit" class="btn btn-success btn-block" name="save_task" value="Save">
 			</form>

 		</div>

 	</div>	

 	    <div class="col-md-8">

 	    <table class="table table-bordered">
 	    	<thead>
 	    		<tr>
 	    			<th>Id</th>
 	    			<th>Name</th>
 	    			<th>Last Name</th>
 	    			<th>Identity Document</th>
 	    			<th>Address</th>
 	    			<th>Phone</th>
 	    			<th>Photo</th>
 	    			<th>Actions</th>

 	    		</tr>
 	    	</thead>

 	    	<tbody>
 	    		<?php
 					$query="select * from data_employees";
 					$result_task=mysqli_query($conexion,$query);

 					while ($row=mysqli_fetch_array($result_task)) { ?>
 						 	<tr>
 						 		
 						 		<td><?php echo $row['id'] ?></td>

 						 		<td><?php echo $row['name'] ?></td>

 						 		<td><?php echo $row['last_name'] ?></td>

 						 		<td><?php echo $row['identity_document'] ?></td>

 						 		<td><?php echo $row['address'] ?></td>

 						 		<td><?php echo $row['phone'] ?></td>


 						 		<td><img height="40px" src="data:image/jpg;base64,<?php echo base64_encode($row['photos']); ?>"/></td>

 						 		<td>
 						 			<a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
 						 				<i class="fas fa-marker"></i>
 						 			</a>
 						 			<a href="delete_task.php?id=<?php echo $row['id']?>"class="btn btn-danger">
 						 				
 						 				<i class="far fa-trash-alt"></i>
 						 			</a>
 						 		</td>
 						 	</tr>
 						
 					<?php }
 	    		?>

 	    	</tbody>

 	    </table>
 	    	
 	    </div>
	</div>
	
</div>

<?php include ("includes/footer.php")?>

<script type="javascript"></script>