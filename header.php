<header id="header">

	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<?php echo (is_home()) ? '<h1 class="logo">' : '<div class="logo">' ?>
				<a href="index.php" title="<?php echo $titleSite ?>">LOGO</a>
				<?php echo (is_home()) ? '</h1>' : '</div>' ?>

				<nav>
					<ul class="unstyled header-menu">
						<li class="<?php echo (is_home()) ? 'active' : '' ?>"><a href="./">Home</a></li>
						<li class="<?php echo ($p == 'contato') ? 'active' : '' ?>"><a href="contato.php">Contato</a>
						</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>

</header>