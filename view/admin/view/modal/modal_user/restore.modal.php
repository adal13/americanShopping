<div class="modal fade" id="delete<?php echo $shopping['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Realmente desea restaurar el siguiente usuario?</h5>
			</div>

			<div class="modal-body">
				<strong>
					<?php echo $shopping['nombre']; ?>
				</strong>
			</div>

			<div class="modal-footer">
				<form action="../../../controllers/shopping.controller.php?request=active" method="post">
					<input hidden type="text" value="<?php echo $shopping['id_usuario']; ?>" name="id_usuario">
					<a type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Si</button>
				</form>	
			</div>

		</div>
	</div>
</div>