<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<?php if ( is_home() ) { ?>
<title><?php echo stripslashes(get_option('tang_title')); ?></title>
<?php } ?>
<?php if ( is_search() ) { ?>
<title>搜索结果 - <?php bloginfo('name'); ?></title>
<?php } ?>
<?php if ( is_single() ) { ?>
<title><?php echo trim(wp_title('',0)); ?> - <?php bloginfo('name'); ?></title>
<?php } ?>
<?php if ( is_page() ) { ?>
<title><?php echo trim(wp_title('',0)); ?> - <?php bloginfo('name'); ?></title>
<?php } ?>
<?php if ( is_category() ) { ?>
<title><?php single_cat_title(); ?> - <?php bloginfo('name'); ?></title>
<?php } ?>
<?php if ( is_month() ) { ?>
<title><?php the_time('F'); ?> - <?php bloginfo('name'); ?></title>
<?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?>
<title><?php single_tag_title("", true); ?> - <?php bloginfo('name'); ?></title>
<?php } ?>
<?php } ?>
<?php
if (!function_exists('utf8Substr')) {
 function utf8Substr($str, $from, $len)
 {
     return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
          '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
          '$1',$str);
 }
}
if ( is_single() ){
    if ($post->post_excerpt) {
        $description  = $post->post_excerpt;
    } else {
   if(preg_match('/<p>(.*)<\/p>/iU',trim(strip_tags($post->post_content,"<p>")),$result)){
    $post_content = $result['1'];
   } else {
    $post_content_r = explode("\n",trim(strip_tags($post->post_content)));
    $post_content = $post_content_r['0'];
   }
         $description = utf8Substr($post_content,0,220);  
  }
    $keywords = "";     
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {
        $keywords = $keywords . $tag->name . ",";
    }
}
?>
<?php echo "\n"; ?>
<?php if ( is_single() ) { ?>
<meta name="description" content="<?php echo trim($description); ?>" />
<meta name="keywords" content="<?php echo rtrim($keywords,','); ?>" />
<?php } ?>
<?php if ( is_home() ) { ?>
<meta name="description" content="<?php echo stripslashes(get_option('tang_description')); ?>" />
<meta name="keywords" content="<?php echo stripslashes(get_option('tang_keywords')); ?>" />
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
<script src="<?php bloginfo('template_directory'); ?>/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/theme.js"></script>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
<div id="header">
  <div class="logo">
    <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
    <p><?php bloginfo('description'); ?></p>
  </div>
  <div id="navigation">
    <?php wp_nav_menu (array(
	'theme_location'  => 'header-menu',
	'container'       => false,
	'menu'            => '',
	'menu_id'         => 'nav',
	'echo'            => true,
	'fallback_cb'     => '',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => '',)
	); ?>
    <ul class="my">
      <li><a href="#"><i class="iconfont">&#260;</i>关注我</a>
        <ul>
          <li><a href="<?php bloginfo('rss2_url'); ?>" rel="external nofollow" target="_blank"><i class="iconfont">&#483;</i>RSS订阅</a></li>
          <?php if (get_option('tang_weibo') == '显示') { ?>
          <li><a href="<?php echo stripslashes(get_option('tang_weibo_url')); ?>" rel="external nofollow" target="_blank"><i class="iconfont">&#468;</i>新浪微博</a></li>
          <?php { echo ''; } ?>
          <?php } else { } ?>
          <?php if (get_option('tang_tqq') == '显示') { ?>
          <li><a href="<?php echo stripslashes(get_option('tang_tqq_url')); ?>" rel="external nofollow" target="_blank"><i class="iconfont">&#469;</i>腾讯微博</a></li>
          <?php { echo ''; } ?>
          <?php } else { } ?>
        </ul>
      </li>
    </ul>
  </div>
</div>
<div id="content">
