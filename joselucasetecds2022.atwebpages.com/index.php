<?php 
	require "config.php"; 
	include_once DBAPI; 
	if (!isset($_SESSION)) session_start();
	include(HEADER_TEMPLATE);
	
	$db = open_database();
?>

        <h1 style= "padding-top: 11px">CRUD - PHP - Bootstrap - Filmes - 2ºDS PW2</h1>
        <hr>
        <?php if ($db) : ?>

                <div class="row"> <!-- Clientes/Customers -->
                <?php if (isset($_SESSION['user'])) :?>
			<div class="col-xl-2 col-lg-3 col-md-2">
				<a href="<?php echo BASEURL; ?>customers/add.php" class="btn btn-secondary">
					<div class="row">
						<div class="col-xl-12 text-center">
							<i class="fa-solid fa-user-plus fa-5x"></i>
							<!-- <i class="fa fa-plus fa-5x"></i> -->
						</div>
						<div class="col-xl-12 text-center">
							<p>Novo Cliente</p>
						</div>
					</div>
				</a>
			</div>
                <?php endif; ?>
			<div class="col-xl-2 col-lg-3 col-md-2">
				<a href="<?php echo BASEURL; ?>customers" class="btn btn-light">
					<div class="row">
						<div class="col-xl-12 text-center">
							<i class="fa-solid fa-users fa-5x"></i>
							<!-- <i class="fa-regular fa-user fa-5x"></i> -->
						</div>
						<div class="col-xl-12 text-center">
							<p>Clientes</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="row" id="actions">
                <?php if (isset($_SESSION['user'])) :?>
			<div class="col-xl-2 col-sm-3 col-md-2">
				<a href="<?php echo BASEURL; ?>filme/add.php" class="btn btn-secondary">
					<div class="row">
						<div class="col-xl-12 text-center">
							<i class="fa-solid fa-video fa-5x"></i>
						</div>
						<div class="col-xl-12 text-center">
							<p>Novo Filme</p>
						</div>
					</div>
				</a>
			</div>
                <?php endif; ?>
			<div class="col-xl-2 col-sm-3 col-md-2">
				<a href="<?php echo BASEURL; ?>filme" class="btn btn-light">
					<div class="row">
						<div class="col-xl-12 text-center">
							<i class="fa-solid fa-film fa-5x"></i>
						</div>
						<div class="col-xl-12 text-center">
							<p>Filmes</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<?php if (isset($_SESSION['user'])) : //Verifica se existe usuário ?>
			<?php if ($_SESSION['user'] == "admin") : //Verifica se está logado como admin ?>
				<div class="row" id="actions"> <!-- Usuários -->
					<div class="col-xl-2 col-sm-3 col-md-2">
						<a href="<?php echo BASEURL; ?>usuarios/add.php" class="btn btn-secondary">
							<div class="row">
								<div class="col-xl-12 text-center">
									<i class="fa-solid fa-user-plus fa-5x"></i>
									<!-- <i class="fa fa-plus fa-5x"></i> -->
								</div>
								<div class="col-xl-12 text-center">
									<p>Novo Usuário</p>
								</div>
							</div>
						</a>
					</div>

					<div class="col-xl-2 col-sm-3 col-md-2">
						<a href="<?php echo BASEURL; ?>usuarios" class="btn btn-light">
							<div class="row">
								<div class="col-xl-12 text-center">
									<i class="fa-solid fa-users fa-5x"></i>
									<!-- <i class="fa-regular fa-user fa-5x"></i> -->
								</div>
								<div class="col-xl-12 text-center">
									<p>Usuários</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
<?php else : ?>
	<!-- A DIV abaixo foi comentada -->
	<!--
	<div class="alert alert-danger" role="alert">
		<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>
-->
	<?php if (!empty($_SESSION['message'])) : ?>
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!<br>
			<?php echo $_SESSION['message']; ?></p>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php clear_messages(); ?>
	<?php endif; ?>
<?php endif; ?>


<?php include(FOOTER_TEMPLATE); ?>