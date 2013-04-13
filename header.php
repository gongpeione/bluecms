<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lt IE 9]>  
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<style type="text/css">
         .timer { display: none !important; }
         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
		</style>
	<![endif]--> 
	
	<?php if(is_home()) : { ?>
		<title><?php bloginfo('name'); ?></title>
	<?php ;} ?>
	
	<?php else : ?>
		<title><?php wp_title(' - ', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<?php endif; ?>

	<!--      Meta       -->
	<?php   
	if (is_home() || is_page()) {   
		// 将以下引号中的内容改成你的主页description   
		$description = "描述";   
  
		// 将以下引号中的内容改成你的主页keywords   
		$keywords = "关键词";   
	}   
	elseif (is_single()) {   
		$description1 = get_post_meta($post->ID, "description", true);   
		$description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "…");   
  
		// 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述   
		$description = $description1 ? $description1 : $description2;   
      
		// 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词   
		$keywords = get_post_meta($post->ID, "keywords", true);   
		if($keywords == '') {   
			$tags = wp_get_post_tags($post->ID);       
			foreach ($tags as $tag ) {           
				$keywords = $keywords . $tag->name . ", ";       
			}   
			$keywords = rtrim($keywords, ', ');   
    }   
	}   
	elseif (is_category()) {   
		$description = category_description();   
		$keywords = single_cat_title('', false);   
	}   
	elseif (is_tag()){   
		$description = tag_description();   
		$keywords = single_tag_title('', false);   
	}   
	$description = trim(strip_tags($description));   
	$keywords = trim(strip_tags($keywords));   
	?>

	<meta name="description" content="<?php echo $description; ?>" />   
	<meta name="keywords" content="<?php echo $keywords; ?>" /><!--End Meta-->  

	<link rel='stylesheet' href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/orbit-1.2.3.css" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.orbit-1.2.3.min.js"></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="bg">

<div id="main">

<div id="top">

	<div id="top-menu">

		<span class="top-info">
			<span class="time">今天是: <?php the_time('Y年m月d日') ?> <?php the_time('l');?></span>
		</span>

		<span class="login">

			<?php if(is_user_logged_in() ) {
											global $current_user;
											get_currentuserinfo();
											echo "<a>用户名：".$current_user->user_login."</a>"; 
			?>
				<a href="<?php bloginfo('url'); ?>/wp-admin/profile.php" >个人资料</a>					
			<?php } else { ?>

				<a href="<?php bloginfo('url'); ?>/wp-login.php" class="signin">登陆 </a> | <a href="<?php bloginfo('url'); ?>/wp-login.php?action=register" class="register">注册</a>

			<?php } ?>

		</span>
	</div>

	<div id="logo">
		
		<a href="<?php bloginfo('url'); ?>">
			<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name');?>" id="logo-img" title="<?php bloginfo('description');?>"/>
		</a>
	
	</div>

	<div class="search">
			<?php get_search_form(); ?>
	</div>

	<div id="menu">
		<?php wp_nav_menu(array('theme_location' => 'main','sort_column' => 'menu_order', 'container_id'=>'main-menu','menu_id'=>'navigation','menu_class'=>'main-menu') ); ?> 
	</div>

</div>

<div id="main-content">