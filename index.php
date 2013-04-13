<?php get_header(); ?>

	<div id="featured">
			<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/slideshow/1.jpg" alt="The first img" /></a>
			<img src="<?php bloginfo('template_url'); ?>/images/slideshow/2.jpg"  data-caption="#1" />
			<img src="<?php bloginfo('template_url'); ?>/images/slideshow/3.jpg"  />
	</div>
	<span class="orbit-caption" id="1">I'm A Badass Caption,horizontal-push,horizontal-push,horizontal-push,horizontal-pushhorizontal-push,horizontal-pushhorizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，I'm A Badass Caption,horizontal-push,horizontal-push,horizontal-push,horizontal-pushhorizontal-push,horizontal-pushhorizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push，horizontal-push</span>
	

	<div class="cat-1">

		<?php $posts = query_posts($query_string . "&cat=60&orderby=date&showposts=10" ); ?>
		
		<div class="cat-title">
			<h2><?php single_cat_title(); ?></h2>
			<a href="<?php bloginfo('url'); ?>/?cat=60" class="readmore">More</a>
		</div>
		
		<div class="cat-content">

		<?php the_post(); ?>

				<div class="posts-1">
					<div class="thumb-1">
						<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>">
							<?php post_thumbnail( 250,200 ) ; ?>
						</a>
					</div>
					<div class="title-1">
						<h2><a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 60,"..."); ?></a></h2>
					</div>
					<div class="content-1">
							<?php echo mb_strimwidth(get_the_content(), 0, 300,"..."); ?>
							<a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>" class="readmore">阅读全文</a>
					</div>
				</div>

		<?php $i=0; while(have_posts()&& $i < 4) : the_post(); $i++; ?> 

		<div class="posts">	
				<div class="main-posts">
					<span class="title">
						<h2><a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 60,"..."); ?></a></h2>
					</span>
					<span class="posts-meta">
						<span class="time"><span class="a"><?php the_time('m/d') ?></span></span>
					</span>
				</div>				
		</div>

		<?php endwhile; ?>

		</div>

	</div>

	<div class="cat-2">

		<?php $posts = query_posts($query_string . "&cat=1&orderby=date&showposts=10" ); ?>
		
		<div class="cat-title">
			<h2><?php single_cat_title(); ?></h2>
			<a href="<?php bloginfo('url'); ?>/?cat=1" class="readmore">More</a>
		</div>

		<div class="cat-content">

		<?php $i=0; while(have_posts()) : the_post(); $i++; ?> 

		<div class="posts">	
				<div class="main-posts">
					<span class="title">
						<h2><a href="<?php the_permalink(); ?>" title="点击查看：<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 30,"..."); ?></a></h2>
					</span>
					<span class="posts-meta">
						<span class="time"><span class="a"><?php the_time('m/d') ?></span></span>
					</span>				
				</div>
		</div>
			
		<?php endwhile; ?>

		</div>

	</div>


<?php get_footer(); ?>