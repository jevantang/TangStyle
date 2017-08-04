<div id="sidebar">
  <div id="search">
    <form id="searchform" method="get" action="<?php bloginfo('siteurl'); ?>">
      <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" size="30" x-webkit-speech />
      <button type="submit" id="searchsubmit"><i class="iconfont">&#337;</i></button>
    </form>
  </div>
  <div class="sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('首页侧栏') ) : ?>
    <div class="widget">
      <h3>分类目录</h3>
      <ul>
        <?php wp_list_categories('depth=1&title_li=0&orderby=name&show_count=1'); ?>
      </ul>
    </div>
    <div class="widget nowrap">
      <h3>最新文章</h3>
      <ul>
        <?php $post_query = new WP_Query('showposts=10'); while ($post_query->have_posts()) : $post_query->the_post(); $do_not_duplicate = $post->ID; ?>
        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a></li>
        <?php endwhile;?>
      </ul>
    </div>
    <?php if ( is_home()) { ?>
    <div class="widget nowrap">
      <h3>热门文章</h3>
      <ul>
        <?php tangstyle_get_most_viewed(); ?>
      </ul>
    </div>
    <div class="widget nowrap">
      <h3>随机文章</h3>
      <ul>
        <?php $rand_posts = get_posts('numberposts=10&orderby=rand');  foreach( $rand_posts as $post ) : ?>
        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="widget">
      <h3>标签云</h3>
      <div class="tagcloud">
        <?php wp_tag_cloud();?>
      </div>
    </div>
    <div class="widget nowrap">
      <h3>最新评论</h3>
      <ul class="comment_ul">
        <?php
			global $wpdb;
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,16) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND user_id='0' ORDER BY comment_date_gmt DESC LIMIT 10";
			$comments = $wpdb->get_results($sql);
			$output = $pre_HTML;
			foreach ($comments as $comment) {$output .= "\n<li>".get_avatar(get_comment_author_email(), 32).strip_tags($comment->comment_author).":<br />" . " <a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"评论来源: " .$comment->post_title . "\">" . strip_tags($comment->com_excerpt)."</a></li>";}
			$output .= $post_HTML;
			$output = convert_smilies($output);
			echo $output;
		?>
      </ul>
    </div>
    <?php } ?>
    <?php if ( is_home()) { ?>
    <?php wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category_before=<div id=%id class="linkcat widget">&category_after=</div>'); ?>
    <?php } ?>
    <?php endif; ?>
  </div>
</div>
