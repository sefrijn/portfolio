<?php 
/**
 * @package Sefrijn
 */

?>

<!DOCTYPE html>
<html>
<head>
<?php 
	if (have_posts()) :
		while (have_posts()) : the_post();
			$myExcerpt = get_the_excerpt();
			$tags = array("<p>", "</p>");
			$myExcerpt = str_replace($tags, "", $myExcerpt);
			$myTitle = get_the_title();
			if ( has_post_thumbnail() ) {
				$post_image_id = get_post_thumbnail_id();
				if ($post_image_id) {
					$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
					if ($thumbnail) (string)$thumbnail = $thumbnail[0];
				}
				$myImage = $thumbnail;				
			}else{
				$myImage = "http://www.sefrijn.nl/wp-content/uploads/2015/02/IMG_0782-1024x472.jpg";
			}
		endwhile;
	endif;
?>

	<meta name="description" content="<?php echo $myExcerpt; ?>">
	<meta name="og:description" content="<?php echo $myExcerpt; ?>">
	<meta name="og:site_name" content="Work by Sefrijn">
	<meta name="og:title" content="<?php echo $myTitle; ?> | Sefrijn - Creations, vibrations and experiences">
	<meta name="keywords" content="Technology,Design,Art,Code,Music,Interactive,Interactive Installation,Creativity">
	<meta name="author" content="Sefrijn">
	<meta property="og:image" content="<?php echo $myImage; ?>" />
	<title><?php echo $myTitle; ?> | Sefrijn - Creations, vibrations and experiences</title>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/type.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
	<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,700" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/img/sefrijn_square.png" />

	<!-- Google Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-11737642-3', 'auto');
	  ga('send', 'pageview');

	</script>

	<?php 
	  if ( is_admin_bar_showing() ) echo '<style>.navigation{top:102px !important;} .fixed{top:32px !important;}</style>'; 
	?>
	<style>
	</style>
	<?php wp_head(); ?>
</head>

<body>


	<!-- Navigation -->
	<div class="navigation">
		<?php wp_nav_menu(); ?>
	</div>
	<h1 id="site_title"><a href="<?php echo get_site_url(); ?>">Sefrijn</a></h1>
