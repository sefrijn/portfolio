<?php
/**
 * @package Sefrijn
 * Template Name: Inspiration
 */

	get_header();
	require("lib/settings.php");
?>
<div class="page inspiration">

	<div class="grid">
			<?php 
			$pages = query_posts('post_type=post');
			if($pages){ /* display the children content  */
	  		foreach ($pages as $post) :
	  			setup_postdata($post); ?>
					<a class="post wordpress" data-date="<?php echo get_the_date("n/j/Y"); ?>" href="<?php the_permalink(); ?>">
		  			<?php if ( has_post_thumbnail() ) { ?>
		  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
						<?php } ?>		
		  			<h3><?php the_title(); ?></h3>
		  			<p class="subtitle"><?php echo get_post_field( 'subtitle', get_the_ID(), true) ?></p>
					</a>
	  		<?php endforeach;
			} 
			?>
	</div>
	<script>
	var tweets;
	var posts;
	$.get( "<?php echo get_template_directory_uri(); ?>/tweets.php", function( data ) {
		tweets = JSON.parse(data);
		console.log( tweets );
		$.get( "http://api.tumblr.com/v2/blog/modderpoel.tumblr.com/posts/photo?limit=50&api_key=<?php echo $tupublic; ?>", function( data ) {
			posts = data.response.posts;
			console.log( posts );
			displayPosts();
		});
	});

	function displayPosts(){
		for(var i = 0; i < tweets.length; i++){
			var d = new Date(tweets[i].created_at);
			var date = d.toLocaleDateString();
			$('.grid').append('<a target="_blank" class="post tweet" href="https://twitter.com/sefrijn/status/'+tweets[i].id_str+'" data-date="'+date+'"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png">'+tweets[i].text+'</a>');		
		}
		for(var i = 0; i < posts.length; i++){
			for(var j = 0; j < posts[i].photos.length; j++){
				var d = new Date(posts[i].date);
				var date = d.toLocaleDateString();
				if(Math.random() > 0.7 && posts[i].photos[j].alt_sizes[2].height > 350){
					$('.grid').append('<div class="post tumblr tumblr-large" data-date="'+date+'" style="background-image:url(\''+posts[i].photos[j].alt_sizes[2].url+'\')"><a target="_blank" href="'+posts[i].post_url+'" class="hover"><span>Tumblr post<span></a></div>');
				}else{
					if(posts[i].photos[j].alt_sizes[2].height <200){
						$('.grid').append('<div class="post tumblr tumblr-wide" data-date="'+date+'" style="background-image:url(\''+posts[i].photos[j].alt_sizes[2].url+'\')"><a target="_blank" href="'+posts[i].post_url+'" class="hover"><span>Tumblr post<span></a></div>');
					}else{
						$('.grid').append('<div class="post tumblr" data-date="'+date+'" style="background-image:url(\''+posts[i].photos[j].alt_sizes[2].url+'\')"><a target="_blank" href="'+posts[i].post_url+'" class="hover"><span>Tumblr post<span></a></div>');
					}
				}
			}
		}
		$('.grid').fadeIn().isotope({
			itemSelector: '.post',
    	getSortData : {
        date : function ( $elem ) {
        	var p = $elem;
        	return new Date($(p).attr('data-date'));
      	}
      }, 
      sortBy: 'date', 
      sortAscending : false, 
			layoutMode: 'masonry',
		  masonry: {
  		  columnWidth: 170, 
	      isFitWidth: true
  		}
		});
	}		

	</script>
<?php get_footer() ?>