<div class="modal fade" id="delete<?php echo $shopping['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Realmente desea eliminar el siguiente libro?</h5>
			</div>

			<div class="modal-body">
				<strong>
					<?php echo $shopping['nombre']; ?>
				</strong>
			</div>

			<div class="modal-footer">
				<form action="../../../controllers/shopping.controller.php?request=desactive" method="post">
					<input hidden type="text" value="<?php echo $shopping['id_usuario']; ?>" name="id_usuario">
					<a type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Eliminar</butt>
				</form>	
				<!-- <a type="submit" class="btn btn-danger" data-dismiss="modal" href="<?='../models/delete.php?id_libro=' . $id ?>">Eliminar</a> -->
			</div>
		</div>
	</div>
</div>