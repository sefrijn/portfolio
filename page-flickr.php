<?php
/**
 * @package Sefrijn
 * Template Name: Flickr
 */


	get_header('pages');
	require_once("lib/flickr/phpFlickr.php");
	require("lib/settings.php");

	$f = new phpFlickr("bea6ee61b4eb95f35a27c55902eeda29");	
	$recent = json_encode($f->people_getPublicPhotos("43029317@N04"));
?>

<script>
$(document).ready(function(){
	$('.navigation ul li:first-of-type').addClass('current-menu-item');

	var photos = <?php echo $recent;?>;
	console.log(photos.photos);
	console.log("Lengte: "+photos.photos.photo.length);
	for(var i = 0; i < photos.photos.photo.length;i++){
		var p = photos.photos.photo[i];
		var url = "https://farm"+p.farm+".staticflickr.com/"+p.server+"/"+p.id+"_"+p.secret+"_z.jpg";
		console.log(url);
		$("#photosContainer").append('<a class="photo" href="https://www.flickr.com/photos/sefrijn/'+p.id+'/in/photostream/"><img src="'+url+'"><p>'+p.title+'</p></a>');

	}	
});

</script>


<div id="page">
	<section class="wrapper" id="photos">
		<div id="photosContainer">
			<div class="photo first">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php else : ?>
					<h6 class="center">Not Found</h6>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<?php get_footer() ?>