<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>CRUDCI</title>
</head>
<body>
	<!-- Se hace el contenedor -->
	<div class="container">
		<div class="row">
			<h2>CRUD en CI </h2>
		</div>
	</div>
	<!--Formulario-->
	<div class="mb-5">
		        <?php echo form_open('welcome/agrega',['id'=> 'form-persona']); ?>
				
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Nombre</label>
							<input type="text">
							<input type="text" name="nombre" class="form-control" required placeholder="Nombre" id="nombre">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Apellido paterno</label>
							<input type="text" name="ap" class="form-control" required placeholder="Apellido paterno" id="ap">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Apellido materno</label>
							<input type="text" name="an" class="form-control" required placeholder="Apellido materno" id="an">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Fecha de nacimiento</label>
							<input type="date" name="fn" class="form-control" required id="fn">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Genero</label>
							<input type="text" name="genero" class="form-control" required placeholder="F o M" id="genero">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Guardar</button>
				<?php echo form_close(); ?>
			</div>
	<!--Tabla de datos-->
		<div class="row">
			<div class="card">
				<div class="card-header">
					<h1>Tabla de Personas</h1>
				</div>
				<div class="card-body">
			<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Nombre</th>
									<th scope="col">Fecha de nacimiento</th>
									<th scope="col">Genero</th>
									<th scope="col">Editar</th>
									<th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>
							<?php 
									$count = 0;
									foreach ($personas as $persona) {
										echo '
											<tr>
											<td>'.++$count.'</td>
											<td>'.$persona->nombre.' '.$persona->ap.' '.$persona->an.'</td>
											<td>'.$persona->fn.'</td>
											<td>'.$persona->genero.'</td>
											<td><button type="button" class="btn btn-warning text-white" onclick="llenar_datos('.$persona->id.', `'.$persona->nombre.'`, `'.$persona->ap.'`, `'.$persona->an.'`, `'.$persona->fn.'`, `'.$persona->genero.'`)">Editar</button></td>
											<td><a href="'.base_url('welcome/eliminar/'.$persona->id).'" type="button" class="btn btn-danger">Eliminar</a></td>
											</tr>
										';
									}
								?>
							</tbody>
						</table>
				</div>
			</div>
		</div>
		<script>
			let url= "<?php echo base_url("welcome/editar"); ?>"
			const llenar_datos = (id, nombre, ap, an, fn, genero) => {
				console.log(url);
				console.log(id,nombre, ap, an , fn, genero);
				let path= url+"/"+id;
				console.log(path);
				document.getElementById('form-persona').setAttribute('action',path);
				document.getElementById('nombre').value = nombre;
				document.getElementById('ap').value = ap;
				document.getElementById('an').value = an;
				document.getElementById('fn').value = fn;
				document.getElementById('genero').value = genero;
			};
		</script>
</body>
</html>