<div id="sidebar">
  <div id="search">
    <form id="searchform" method="get" action="<?php bloginfo('siteurl'); ?>">
      <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" size="30" x-webkit-speech />
      <button type="submit" id="searchsubmit"><i class="iconfont">&#337;</i></button>
    </form>
  </div>
  <div class="sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('分类页侧栏') ) : ?>
    <div class="widget">
      <h3>分类目录</h3>
      <ul>
        <?php wp_list_categories('depth=1&title_li=0&orderby=name&show_count=1'); ?>
      </ul>
    </div>
    <div class="widget">
      <h3>随机文章</h3>
      <ul>
        <?php $rand_posts = get_posts('numberposts=10&orderby=rand');  foreach( $rand_posts as $post ) : ?>
        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(), 0, 42, '...'); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="widget">
      <h3>标签云</h3>
      <div class="tagcloud">
        <?php wp_tag_cloud();?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
