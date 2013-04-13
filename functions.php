<?php

/*------------------菜单---------------------*/
if( function_exists('register_nav_menus') ){   
    register_nav_menus(   
        array(   
            'main' => __( '主导航菜单' ),'top' => __( '顶部菜单' ), 'footer' => __( '底部菜单' ),   
        )   
    );
}


/*------------------注册侧边栏---------------------*/   

if (function_exists('register_sidebar'))
{
    register_sidebar(array(
		'name'			=> '首页小工具1',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<div class="widget" id="widget-1"><h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '首页小工具2',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<div class="widget" id="widget-2"><h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '全部页面小工具',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<div class="widget" id="widget-3"><h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '其它页面小工具1',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<div class="widget" id="widget-4"><h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>
		</div>',
    ));
}
{
    register_sidebar(array(
		'name'			=> '其它页面小工具2',
        'before_widget'	=> '',
        'after_widget'	=> '</div>',
        'before_title'	=> '<div class="widget" id="widget-5"><h3>',
        'after_title'	=> '</h3><div class="box">',
    	'after_widget' => '</div>
    	<div class="box-bottom">
			<i class="lb"></i>
			<i class="rb"></i>
		</div>
		</div>',
    ));
}



/*---------------------面包屑导航---------------------*/
function get_breadcrumbs()
{
    global $wp_query;
    
	if ( !is_home() ){
  
        // Start the UL
        echo '<ul class="breadcrumb">';
        // Add the Home link
		echo "<li>当前位置: </li>";
        echo '<li><a href="'. get_settings('home') .'">'. 首页 .'</a></li>';
  
        if ( is_category() )
        {
            $catTitle = single_cat_title( "", false );
            $cat = get_cat_ID( $catTitle );
            echo "<li> &raquo; ". get_category_parents( $cat, TRUE, " &raquo; " ) ."</li>";
        }
        elseif ( is_archive() && !is_category() )
        {
            echo "<li> &raquo; Archives</li>";
        }
        elseif ( is_search() ) {
  
            echo "<li> &raquo; Search Results</li>";
        }
        elseif ( is_404() )
        {
            echo "<li> &raquo; 404 Not Found</li>";
        }
        elseif ( is_single() )
        {
            $category = get_the_category();
            $category_id = get_cat_ID( $category[0]->cat_name );
  
            echo '<li> &raquo; '. get_category_parents( $category_id, TRUE, " &raquo; " );
            echo the_title('','', FALSE) ."</li>";
        }
        elseif ( is_page() )
        {
            $post = $wp_query->get_queried_object();
  
            if ( $post->post_parent == 0 ){
  
                echo "<li> &raquo; ".the_title('','', FALSE)."</li>";
  
            } else {
                $title = the_title('','', FALSE);
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                array_push($ancestors, $post->ID);
  
                foreach ( $ancestors as $ancestor ){
                    if( $ancestor != end($ancestors) ){
                        echo '<li> &raquo; <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
                    } else {
                        echo '<li> &raquo; '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
                    }
                }
            }
        }
		
        // End the UL
        echo "</ul>";
    }
	else{
			echo '<ul class="breadcrumb">';
			// Add the Home link
			echo "<li>当前位置: </li>";
			echo '<li><a href="'. get_settings('home') .'">'. 首页 .'</a></li>';
			echo "</ul>";
		}
}

/*---------------------PostViews---------------------*/
function getPostViews($postID){
 
    //自定义域名称
    $count_key = 'post_views_count';
    //获取域值即浏览次数
    $count = get_post_meta($postID, $count_key, true);
    //如果为空表示没有点击过，返回0
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
//更新日志浏览数-参数文章ID
function updatePostViews($postID) {
    //自定义域名称
    $count_key = 'post_views_count';
    //获取域值即浏览次数
    $count = get_post_meta($postID, $count_key, true);
    //如果为空就设为1，表示第一次点击
    if($count==''){
        $count = 1;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count);
    }else{
        //如果不为空，加1，更新数据
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/////////////////////////// Commentlist ////////////////////////
function lopercomment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) { 
		$page = get_query_var('cpage')-1;
		$cpp=get_option('comments_per_page');
		$commentcount = $cpp * $page;
	}
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class('commenttips',$comment_id,$comment_post_ID); ?> >
	<div class="comment-body">
	
			<div class="commenttext">
	
				<div class="gravatar">
					<?php echo get_avatar( get_comment_author_email(), '32'); ?>
				</div><!-- comment-author -->
				<div class="comment-meta">
					<span class="commentid"><?php comment_author_link();?></span>
					<span class="commenttime">　( <?php comment_date('Y.m.j') ?> <?php comment_time('H:i'); ?> ) </span>
					<span class="editpost"> <?php edit_comment_link(' [edit]'); ?></span>
					<span class="commentidnext"> : </span>
					
					<?php $options = get_option('loper_options'); ?>	
					<?php if(is_page($options['guestname'])):?>
					<?php else: ?>
					<span class="commentcount"><a href="#comment-<?php comment_ID() ?>"><?php if(!$parent_id = $comment->comment_parent) {printf('#%1$s', ++$commentcount);} ?></a></span>
					<?php endif;?>
					
					
				</div><!--comment-meta-->
				<div class="commentp">
					<?php if ($comment->comment_approved == '0') : ?>
					<em>
						<span class="moderation"><?php _e('Your comment is awaiting moderation.') ?></span>
					</em> <br />
					<?php endif; ?>
					<?php comment_text() ?>
					<span class="reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply','depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
				</div>
			</div><!-- commenttext -->
		<div class="clearline"></div>
	</div><!-- [div-comment] -->
	
  <?php
}
		////////嵌套ping
		function loperpings($comment, $args, $depth) {
			   $GLOBALS['comment'] = $comment;
		?>
			<li id="comment-<?php comment_ID(); ?>">
				<div class="pingdiv">
					<?php comment_author_link(); ?>
				</div>
		<?php }
///////////////////// Commentlist结束////////////////////////


add_filter('smilies_src','custom_smilies_src',1,10);
	function custom_smilies_src ($img_src, $img, $siteurl){
    return get_bloginfo('template_directory').'/images/smilies/'.$img;}
	
	function wp_smilies() {
		global $wpsmiliestrans;
		if ( !get_option('use_smilies') or (empty($wpsmiliestrans))) return;
		$smilies = array_unique($wpsmiliestrans);
		$link='';
		foreach ($smilies as $key => $smile) {
			$file = get_bloginfo('template_directory').'/images/smilies/'.$smile;
			$value = " ".$key." ";
			$img = "<img src=\"{$file}\" alt=\"{$smile}\"/>";
			$imglink = htmlspecialchars($img);
			$link .= "<a href=\"#commentform\" title=\"{$smile}\" onclick=\"document.getElementById('comment').value += '{$value}'\">{$img}</a>&nbsp;";
		}
		echo '<div class="wp_smilies">'.$link.'</div>';
	}


/*---------------------获取缩略图---------------------*/
add_theme_support( 'post-thumbnails' );

function post_thumbnail( $width = 100,$height = 80 ){
    global $post;
    if( has_post_thumbnail() ){    //如果有缩略图，则显示缩略图
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />';
        echo $post_timthumb;
    } else {
        $post_timthumb = '';
        ob_start();
        ob_end_clean();
        $output = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $index_matches);    //获取日志中第一张图片
        $first_img_src = $index_matches [1];    //获取该图片 src
        if( !empty($first_img_src) ){    //如果日志中有图片
            $path_parts = pathinfo($first_img_src);    //获取图片 src 信息
            $first_img_name = $path_parts["basename"];    //获取图片名
            $first_img_pic = get_bloginfo('wpurl'). '/cache/'.$first_img_name;    //文件所在地址
            $first_img_file = ABSPATH. 'cache/'.$first_img_name;    //保存地址
            $expired = 604800;    //过期时间
            if ( !is_file($first_img_file) || (time() - filemtime($first_img_file)) > $expired ){
                copy($first_img_src, $first_img_file);    //远程获取图片保存于本地
                $post_timthumb = '<img src="'.$first_img_src.'" alt="'.$post->post_title.'" class="thumb" />';    //保存时用原图显示
            }
            $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$first_img_pic.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />';
        } else {    //如果日志中没有图片，则显示默认
            $post_timthumb = '<img src="'.get_bloginfo("template_url").'/images/default.png" alt="'.$post->post_title.'" class="thumb" />';
        }
        echo $post_timthumb;
    }
}


/*---------------------页码函数---------------------*/  
function wp_pagenavi() {   
    //先申明两个全局变量   
    global $wp_query, $wp_rewrite;   
    //判断当前页面   
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;   
       
    $pagination = array(   
        'base' => @add_query_arg('paged','%#%'),   
        'format' => '',   
        'total' => $wp_query->max_num_pages,   
        'current' => $current,   
        'show_all' => false,   
        'type' => 'plain',   
        'end_size'=>'1',   
        'mid_size'=>'3',   
        'prev_text' => '上一页',   
        'next_text' => '下一页'   
    );   
       
    if( $wp_rewrite->using_permalinks() )   
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');   
    if( !empty($wp_query->query_vars['s']) )   
        $pagination['add_args'] = array('s'=>get_query_var('s'));   
    echo paginate_links($pagination);   
}  


/*------------------短代码---------------------*/
//警示
function warningbox($atts, $content=null, $code="") {	$return = '<div class="warning shortcodestyle">';	$return .= $content;	$return .= '</div>';	return $return;}add_shortcode('warning' , 'warningbox' );
//禁止
function nowaybox($atts, $content=null, $code="") {	$return = '<div class="noway shortcodestyle">';	$return .= $content;	$return .= '</div>';	return $return;}add_shortcode('noway' , 'nowaybox' );
//购买
function buybox($atts, $content=null, $code="") {	$return = '<div class="buy shortcodestyle">';	$return .= $content;	$return .= '</div>';	return $return;}add_shortcode('buy' , 'buybox' );
//项目版
function taskbox($atts, $content=null, $code="") {	$return = '<div class="task shortcodestyle">';	$return .= $content;	$return .= '</div>';	return $return;}add_shortcode('task' , 'taskbox' );
//音乐播放器
function doubanplayer($atts, $content=null){	extract(shortcode_atts(array("auto"=>'0'),$atts));	return '<embed src="'.get_bloginfo("template_url").'/shortcode/doubanplayer.swf?url='.$content.'&amp;autoplay='.$auto.'" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" width="400" height="30">';	}add_shortcode('music','doubanplayer');
//下载链接
function downlink($atts,$content=null){	extract(shortcode_atts(array("href"=>'http://'),$atts));	return '<div class="but_down"><a href="'.$href.'" target="_blank"><span>'.$content.'</span></a><div class="clear"></div></div>';	}	add_shortcode('Downlink','downlink');
//flv播放器
function flvlink($atts,$content=null){	extract(shortcode_atts(array("auto"=>'0'),$atts));	return'<embed src="'.get_bloginfo("template_url").'/shortcode/flvideo.swf?auto='.$auto.'&flv='.$content.'" menu="false" quality="high" wmode="transparent" bgcolor="#ffffff" width="560" height="315" name="flvideo" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_cn" />';	}add_shortcode('flv','flvlink');
//mp3专用播放器
function mp3link($atts, $content=null){	extract(shortcode_atts(array("auto"=>'0',"replay"=>'0',),$atts));	 return '<embed src="'.get_bloginfo("template_url").'/shortcode/dewplayer.swf?mp3='.$content.'&amp;autostart='.$auto.'&amp;autoreplay='.$replay.'" wmode="transparent" height="20" width="240" type="application/x-shockwave-flash" />';	}add_shortcode('mp3','mp3link');	
//在线视频
/* 20120616 修复WP 3.4 官方中文版 的问题function wp_embed_handler_youku( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_youku', '<embed src="http://player.youku.com/player.php/sid/' . esc_attr($matches[1]) . '/v.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( 'youku', '#http://v.youku.com/v_show/id_(.*?).html#i', 'wp_embed_handler_youku' );
function wp_embed_handler_tudou( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_tudou', '<embed src="http://www.tudou.com/v/' . esc_attr($matches[1]) . '/v.swf"  quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr );}wp_embed_register_handler( 'tudou', '#http://www.tudou.com/programs/view/(.*?)/#i', 'wp_embed_handler_tudou' );
*/
function wp_embed_handler_ku6( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_ku6', '<embed src="http://player.ku6.com/refer/' . esc_attr($matches[1]) . '/v.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( 'ku6', '#http://v.ku6.com/show/(.*?).html#i', 'wp_embed_handler_ku6' );
function wp_embed_handler_youtube( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_youtube', '<embed src="http://www.youtube.com/v/' . esc_attr($matches[1]) . '?&amp;hl=zh_CN&amp;rel=0" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( 'youtube', '#http://youtu.be/(.*?)/#i', 'wp_embed_handler_youtube' );
function wp_embed_handler_56 ($matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_56', '<embed src="http://player.56.com/v_' . esc_attr($matches[1]) . '.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( '56', '#http://player.56.com/v_(.*?).swf#i', 'wp_embed_handler_56' );
function wp_embed_handler_sohu( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_sohu', '<embed src="http://share.vrs.sohu.com/' . esc_attr($matches[1]) . '/v.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( 'sohu', '#http://share.vrs.sohu.com/(.*?)/v.swf#i', 'wp_embed_handler_sohu' );
function wp_embed_handler_6cn( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_6cn', '<embed src="http://6.cn/p/' . esc_attr($matches[1]) . '.swf" quality="high" width="480" height="385" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( '6cn', '#http://6.cn/p/(.*?).swf#i', 'wp_embed_handler_6cn' );
function wp_embed_handler_letv( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_letv', '<embed src="http://www.letv.com/player/' . esc_attr($matches[1]) . '.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( 'letv', '#http://www.letv.com/player/(.*?).swf#i', 'wp_embed_handler_letv' );
function wp_embed_handler_sina( $matches, $attr, $url, $rawattr ) { return apply_filters( 'embed_sina', '<embed src="http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=' . esc_attr($matches[1]) . '/s.swf" quality="high" width="620" height="390" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" allowfullscreen="true" wmode="opaque"></embed>', $matches, $attr, $url, $rawattr ); }wp_embed_register_handler( 'sina', '#http://you.video.sina.com.cn/api/sinawebApi/outplayrefer.php/vid=(.*?)/s.swf#i', 'wp_embed_handler_sina' );


?>

<?php

function aurelius_comment($comment, $args, $depth)    
{   
   $GLOBALS['comment'] = $comment; ?>   
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">   
        <div class="gravatar"> <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>   
		<?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
		</div>   
        <div class="comment_content" id="comment-<?php comment_ID(); ?>">      
            <div class="clearfix">   
                    <?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>   
                    <div class="comment-meta commentmetadata">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>   
                    &nbsp;&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>   
            </div>   
  
            <div class="comment_text">   
                <?php if ($comment->comment_approved == '0') : ?>   
                    <em>你的评论正在审核，稍后会显示出来！</em><br />   
        <?php endif; ?>   
        <?php comment_text(); ?>   
            </div>   
        </div>   
    </li>   
<?php } ?> 