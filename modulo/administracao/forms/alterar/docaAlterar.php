<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo</h3>
	</div>
	<div class="panel-body">
		<?php 
		use system\core\Error;
		$form = new Error();
		$form->showErrors();
		?>
		<form class="form-horizontal" id="alterar/docaAlterar" method="post" action="action/Controller.php" role="form">
			
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Doca Alterada:</label>
				<div class="col-sm-4">
					<input type="text" name="doca" value="" class="form-control" id="inputEmail3"
						placeholder="Descricao">
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-1">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-floppy-saved"></span> Salvar
					</button>
				</div>
			</div>
			
		</form>
	</div>
</div>