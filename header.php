<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
	<?php wp_head(); ?>
</head><!--/head-->

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<?php 
						wp_nav_menu( array(
							'theme_location' => 'contact_menu',
							'container_class' => 'contactinfo',
							'menu_class' => 'nav nav-pills'
						) );
						?>
					</div>
					<div class="col-sm-6">
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'social_menu',
								'container_class' => 'social-icons pull-right',
								'menu_class' => 'nav navbar-nav',
							) );
						?>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<?php 
								$logo_img = '<img src="' . get_template_directory_uri() . '/assets/images/home/larpradeda-6.svg" alt="Logo">';
								if( $custom_logo_id = get_theme_mod('custom_logo') ){
									$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
										'class'    => 'custom-logo',
										'itemprop' => 'logo',
									) );
								}
							?>
							<a href="<?= home_url('/'); ?>"><?php echo $logo_img; ?></a>
						</div>
						<div class="btn-group pull-right">

							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<?php echo do_shortcode('[woo-currency-switcher]')?>
								<!-- <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul> -->
							</div>
						</div>
					</div>
					<div class="col-sm-8">
					<?php	
					wp_nav_menu(array(
						'theme_location' 	=> 'main_menu',
						'container_class' 	=> 'shop-menu pull-right',
						'menu_class'		=> 'nav navbar-nav',
						//'link_before'		=> '<i class="fa"></i> ',
					))
					?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
						<?php 
							wp_nav_menu( array(
								'theme_location' => 'header_menu',
								'container' => false,
								'menu_class' => 'nav navbar-nav collapse navbar-collapse',
								'walker' => new Shoper_Menu(),
							) )
						?>
						</div>
					</div>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->