<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo</h3>
	</div>
	<div class="panel-body">
		<form class="form-horizontal" method="post" action="action/Arquivo.php" role="form">
			
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Númerção:</label>
				<div class="col-sm-4">
					<input type="text" name="arq_numeracao" value="<?php echo(($_SESSION['cadastrar/arquivo']['arq_numeracao'])); ?>" class="form-control"
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