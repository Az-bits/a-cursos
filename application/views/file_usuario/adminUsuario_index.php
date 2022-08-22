<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles">ADMINISTRACION <small>.</small></h1>
	</div>
</div>
<div class="container-fluid">
	<h3 align="center">ADMINISTRACION DE USUARIOS</h3>
	<a href="<?= base_url(); ?>nuevoUsuario" class="btn btn-success btn-raised"> NUEVO USUARIO</a>

	<a href="" target="_blank" class="btn btn-warning btn-raised"> REPORTE PDF</a>
	<a href="" target="_blank" class="btn btn-primary btn-raised"> REPORTE EXCEL</a>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>IMAGEN</td>
					<td>CARNET</td>
					<td>NOMBRE Y AP.</td>
					<td>ROL</td>
					<td>ESTADO</td>
					<td>FECHA</td>
					<td>ACCION</td>
				</tr>
			</thead>
			<tbody>
				<?php $con = 1;
				foreach ($this->Model_usuario->listar_usuarios() as $objeto) { ?>
					<tr>
						<td><?= $con++; ?></td>
						<td><?= $objeto->imagen; ?></td>
						<td><?= $objeto->ci . ' ' . $objeto->expedido; ?></td>
						<td><?= $objeto->nombre . ' ' . $objeto->paterno . ' ' . $objeto->materno; ?></td>
						<td><?= $objeto->roles ?></td>
						<td>

							<?php if ($objeto->estado == 'activo') : ?>
								<button type="button" class="btn btn-success btn-raised">ACTIVO</button>
							<?php else : ?>
								<button type="button" class="btn btn-danger btn-raised">INACTIVO</button>
							<?php endif ?>
						</td>
						<td><?= $objeto->fecha_reg ?></td>
						<td>
							<a href="javascript:;" class="btn btn-info btn-raised"> Editar</a>
							<a href="javascript:;" class="btn btn-danger btn-raised"> Eliminar</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>