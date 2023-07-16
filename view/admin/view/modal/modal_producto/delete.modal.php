<div class="modal fade" id="deleteProducto<?php echo $shopping['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Realmente desea eliminar el siguiente producto?</h5>
			</div>

			<div class="modal-body">
				<strong>
					<?php echo $shopping['marca']; ?>
				</strong>
			</div>

			<div class="modal-footer">
				<form action="../../../../../controllers/shopping.controller.php?request=desactiveProduct" method="post">
					<input hidden type="text" value="<?php echo $shopping['id_producto']; ?>" name="id_producto">
					<a type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Eliminar</butt>
				</form>
			</div>
		</div>
	</div>
</div>