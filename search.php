<?php get_header(); ?>
<div id="main">
  <h1 class="h1"><?php _e("Search"); ?>: <?php the_search_query(); ?></h1>
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="post_list">
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <div class="info"><?php the_author() ?> | <?php the_category(', ') ?> | <?php the_time('Y-m-d'); ?></div>
    <div class="meta">
      <span class="meat_span"><i class="iconfont">&#279;</i> <?php if(function_exists('the_views')) { the_views('次浏览', true);}?></span>
      <span class="meat_span"><i class="iconfont">&#54;</i> <?php comments_popup_link ('没有评论','1条评论','%条评论'); ?></span>
      <span class="meat_span"><i class="iconfont">&#48;</i> <?php the_tags('', ', ', ''); ?></span>
    </div>
  </div>
  <?php endwhile; ?>
  <div class="navigation">
    <?php pagination($query_string); ?>
  </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
