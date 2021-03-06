<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/prettify.css" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
		<script src="<?php bloginfo('template_directory'); ?>/js/prettify.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
	</head>
	
	<body <?php body_class(); ?>>
		<div id="wrapper">
			<div id="header">
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
				<h2><?php bloginfo('description'); ?></h2>
			</div>
			<div id="body">
			
