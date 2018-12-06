<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title><?php wp_title(''); ?></title>

        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/icons/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/img/icons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper clear">

			<!-- header -->
			<header class="header clear" role="banner">

				<div class="constrained clear">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!--<img src="<?php echo get_template_directory_uri(); ?>/img/jacobstow.png" alt="Logo" class="logo-img">-->
							<h1 class="site-title">Jacob Stow</h1>
						</a>
					</div>
					<!-- /logo -->

					<div class="button_container" id="toggle">
						<span class="top"></span>
						<span class="middle"></span>
						<span class="bottom"></span>
					</div>

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->

					<div class="overlay" id="overlay">
						<nav class="overlay-menu" role="navigation">
							<?php html5blank_nav(); ?>
						</nav>
					</div>

				</div>

			</header>
			<!-- /header -->

