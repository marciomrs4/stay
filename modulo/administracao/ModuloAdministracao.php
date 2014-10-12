<!-- Inicio do Menu do Modulo -->		

	<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $config['moduloName']; ?></h3>
			</div>
			<div class="panel-body">

				<!-- Painel de ações -->

				<ul class="nav nav-pills">
				
					<li class="dropdown">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-plus"></span> Novo
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
								data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php 
								use system\core\ActionController as A;

								echo A::actionUrl()->setProjecName($configGlobal['projectName'])
								               ->setUrlModulo('administracao')
								               ->setUrlAction('cadastrar/doca')
								               ->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Novo E-mail
									</a>
								<li><a href="<?php 
								echo A::actionUrl()->setProjecName($configGlobal['projectName'])
												   ->setUrlModulo('administracao')
												   ->setUrlAction('cadastrar/importarmvto')
												   ->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Importar Arquivo MVTO
									</a>									
								</li>
								<li><a href="<?php 
								echo A::actionUrl()->setProjecName('stay')
												   ->setUrlModulo('administracao')
												   ->setUrlAction('Cadastrar/doca3')
								                   ->getUrl();
								?>"><span class="glyphicon glyphicon-list-alt"></span>
										Novo 3
									</a>								
							</ul>
						</div>
					</li>
				
					<li class="dropdown">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-search"></span> Pesquisar
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
								data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="index.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										listar MVTO
									</a>
								</li>
								<li>
									<a href="listaUsuarios.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										listar Ramais
									</a>
								</li>								
								<li>
									<a href="indexTeste.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										listar de Clientes
									</a>
								</li>																
							</ul>
						</div>
					</li>
									
					<li class="dropdown">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">
								<span class="glyphicon glyphicon-list-alt"></span> Relatório
							</button>
							<button type="button" class="btn btn-primary dropdown-toggle"
								data-toggle="dropdown">
								<span class="caret"></span> <span class="sr-only">Toggle
									Dropdown</span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="ClientePJ.php"><span class="glyphicon glyphicon-list-alt">
										</span>
										Clientes PJ por Executivo de Venda
										</a>
										</li>
 								<li><a href="GraficoClientesBarra.php"><span class="glyphicon glyphicon-list-alt"></span>
										Arquitetos por Executivo de Venda</a></li>
								<li><a href="GraficoClientes.php"><span class="glyphicon glyphicon-list-alt"></span>
										Quantidade de Clientes</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
				
		<!-- Fim Painel de ações / Painel do Modulo-->