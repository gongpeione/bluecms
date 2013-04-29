<?php get_header(); ?>

	<div id="featured">

		<?php $posts = query_posts($query_string . "&cat=60&orderby=date&showposts=5" /*&cat=xx ,xx改为欲输出的首页大图的分类id*/);
		 	  while(have_posts()) : the_post();

		?>
			<?php post_thumbnail( 1080,400,'data-caption="#fetured-'.++$i.'"') ;  ?>
		<?php endwhile; ?>

	</div>

		<?php $posts = query_posts($query_string . "&cat=60&orderby=date&showposts=5" /*&cat=xx ,xx改为欲输出的首页大图的分类id*/ );
		  	$i = 1;
		  	while(have_posts()) : the_post();

		?>
		<span class="orbit-caption" id="fetured-<?php echo $i++ ?>"><a href = "<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
		<?php endwhile; ?>
		
	

	<div class="cat-1">

		<?php $posts = query_posts($query_string . "&cat=60&orderby=date&showposts=10");  //&cat=xx ,xx改为欲输出的分类id) ?>
		
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

		<?php $posts = query_posts($query_string . "&cat=68&orderby=date&showposts=10"); //&cat=xx ,xx改为欲输出的分类id); ?>
		
		<div class="cat-title">
			<h2><?php single_cat_title(); ?></h2>
			<a href="<?php bloginfo('url'); ?>/?cat=1" class="readmore">More</a>
		</div>

		<div class="cat-content">

		<?php $i=0; while(have_posts() && $i < 11) : the_post(); $i++; ?> 

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

	<div class = "ad">
		<a href = "#">
			<img src="<?php bloginfo('template_url'); ?>/images/ad.jpg" />
		</a>
	</div>

	<div class="cat-2 sub">

		<?php $posts = query_posts($query_string . "&cat=66&orderby=date&showposts=10"); //&cat=xx ,xx改为欲输出的分类id); ?>
		
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



	<div class="cat-1 subs">

		<?php $posts = query_posts($query_string . "&cat=65&orderby=date&showposts=10"); //&cat=xx ,xx改为欲输出的分类id); ?>
		
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

	<div class="links">
		<?php wp_list_bookmarks( $args ); ?>
	</div>


<?php get_footer(); ?>