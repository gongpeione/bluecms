<?php get_header(); ?>

<div id = "main-content">
	<div class="breadcrumbs">
		<?php if (function_exists('get_breadcrumbs')){get_breadcrumbs(); } ?>
	</div>

	<?php if(have_posts()): ?><?php while(have_posts()):the_post(); ?>

	<div class="post">
			
		<div class="main-post">

			<div class="s-top">

				<div class="page-title">
					<h2><?php the_title(); ?></h2>
					<?php updatePostViews(get_the_ID()); ?>
					
				</div>

				<div class="divide"></div>

			</div>

			<div class="page-content">

				<?php the_content(); ?> 
				
				<!-- Baidu Button BEGIN -->
				<div class="baidu">
				<span class="share">分享:</span>
				<span id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
				<a class="bds_tsina" ></a>
				<a class="bds_qzone" ></a>
				<a class="bds_renren" ></a>
				<a class="bds_tqq" ></a>
				<a class="bds_t163" ></a>
				<a class="bds_tieba" ></a>
				<a class="bds_twi" ></a>
				<a class="bds_fbook" ></a>
				<a class="bds_print" ></a>
				<span class="bds_more"></span>
				<a class="shareCount"></a>
				</span>
				<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=680522" ></script>
				<script type="text/javascript" id="bdshell_js"></script>
				<script type="text/javascript">
				document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
				</script>
				<!-- Baidu Button END -->
				</div>

			</div>			
		</div>

			<div class="comments">

					<?php comments_template(); ?>
			</div>
			

	</div>

		<?php endwhile; ?>  
			
		<?php else : ?>
					
				<h2><?php _e(’没有发现文章’); ?></h2>

		<?php endif; ?>


<?php get_sidebar(); ?>

</div>
	
<?php get_footer(); ?>