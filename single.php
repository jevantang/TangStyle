<?php get_header(); ?>
<div id="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div id="article">
    <h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <div class="info">
      <span class="meat_span">作者: <?php the_author() ?></span>
      <span class="meat_span">分类: <?php the_category(', ') ?></span>
      <span class="meat_span">发布时间: <?php the_time('Y-m-d H:i') ?></span>
      <span class="meat_span"><i class="iconfont">&#279;</i> <?php if(function_exists('the_views')) { the_views('次浏览', true);}?></span>
      <span class="meat_span"><i class="iconfont">&#54;</i> <?php comments_popup_link ('没有评论','1条评论','%条评论'); ?></span>
      <?php edit_post_link('编辑', '<span class="meat_span">', '</span>'); ?>
    </div>
    <div class="text">
      <?php the_content(); ?>
    </div>
    <div class="text_add">
      <div class="copy">
        <p style="color:#F00;">本文出自<?php bloginfo('name');?>，转载时请注明出处及相应链接。</p>
        <p style="color:#777;font-size:12px;">本文永久链接: <?php the_permalink() ?></p>
      </div>
      <div class="share"><?php echo stripslashes(get_option('tang_share')); ?></div>
    </div>
    <div class="meta"><i class="iconfont">&#48;</i> <?php the_tags('', ', ', ''); ?></div>
  </div>
  <?php endwhile; ?>
  <div class="post_link">
    <div class="prev"><?php previous_post_link('« %link') ?></div>
    <div class="next"><?php next_post_link('%link »') ?></div>
  </div>
  <div id="comments">
    <?php comments_template(); ?>
  </div>
</div>
<?php get_sidebar('single'); ?>
<?php get_footer(); ?>
