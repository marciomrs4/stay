<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo</h3>
	</div>
	<div class="panel-body">
	<div>
		<?php print_r($_SESSION['erro']);?>
	</div>
		<form class="form-horizontal" action="action/action.php" method="post" role="form">
			
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Doca - Esse mesmo:</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="doca" id="inputEmail3"
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
