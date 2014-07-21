<?php 
use system\model\TbUsuario;
$tbUser = new TbUsuario();

$dados = $tbUser->findOne($_SESSION['value']);

print_r($dados);

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Novo</h3>
	</div>
	<div class="panel-body">
	<?php 
	use system\core\Error;
	$erros = new Error();
	$erros->validadeForm('doca')
	      ->showErrors();
	
	?>
		<form class="form-horizontal" name="doca" method="post" action="action/alterarItem.php" role="form">
			<input type="hidden" name="cod_test" value="<?php echo($dados['cod_test']);?>">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Doca:</label>
				<div class="col-sm-4">
					<input type="text" name="doca" value="<?php echo($dados['test_descripton']);?>" class="form-control" id="inputEmail3"
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