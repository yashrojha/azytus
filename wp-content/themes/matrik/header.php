<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
	<?php wp_head(); ?>
</head>

<?php
$cursorClass = '';

if (class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_tag() || is_product())) {
	$cursorClass = 'gsap-gone';
} else {
	$cursorClass = 'tt-magic-cursor';
}

$theme_header_style = Egns\Helper\Egns_Helper::egns_get_theme_option('header_menu_style');
$page_header_style  = Egns\Helper\Egns_Helper::egns_page_option_value('page_header_menu_style');

$extra_body_class = '';

if (!empty($page_header_style) && $page_header_style === 'header_four') {
	$extra_body_class = 'header-four-large-margin';
} elseif ((empty($page_header_style) || $page_header_style === 'default') && $theme_header_style === 'header_four') {
	$extra_body_class = 'header-four-large-margin';
} else {
	$extra_body_class = '';
}

if ($page_header_style === 'header_five' || $theme_header_style === 'header_five') {
	$extra_body_class2 = ' textile-home';
} elseif ($page_header_style === 'header_six' || $theme_header_style === 'header_six') {
	$extra_body_class2 = ' engineering-home';
} elseif ($page_header_style === 'header_two' || $theme_header_style === 'header_two' || $page_header_style === 'header_three' || $page_header_style === 'header_three' || $page_header_style === 'header_four' || $theme_header_style === 'header_four') {
	$extra_body_class2 = 'industry-home';
} else {
	$extra_body_class2 = '';
}
?>

<body <?php body_class([$cursorClass, $extra_body_class, $extra_body_class2]); ?>>

	<?php
	// Hook to include default WordPress hook after body tag open
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}
	?>
	<div id="magic-cursor">
		<div id="ball"></div>
	</div>


	<!-- start #app -->
	<div id="app">

		<?php
		// Hook to include page header template
		do_action('egns_action_page_header_template');
		?>