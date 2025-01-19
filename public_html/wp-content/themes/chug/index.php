<?php include "header.php"; ?>
<div class="row">
  <div id="news">
    <?php if (is_home()) echo "<h1>News</h1>"; ?>
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <article class="post">
        <header>
          <h1><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h1><span class="post-date">Posted on <?php echo get_the_date(); ?></span>
        </header>
        <?php the_content(); ?>
      </article>
    <?php endwhile; endif;?>
    <div class="posts-nav"><?php posts_nav_link(); ?></div>
  </div>
  <aside class="sidebar">
    <div class="recent">
      <h2>Recent Posts</h2>
      <ul class="links"><?php wp_get_archives('type=postbypost&limit=10'); ?></ul>
    </div>
    <div class="archive">
      <h2>Archive</h2>
      <ul class="links"><?php wp_get_archives('type=monthly'); ?></ul>
    </div>
<div class="categories">
    <h2>Categories</h2>
    <ul class="links">
        <?php 
        wp_list_categories([
            'title_li' => '', // Removes the default "Categories" title since we have our own h2
            'show_count' => false, // Don't show post counts
            'orderby' => 'name', // Order alphabetically
            'hide_empty' => true // Hide categories with no posts
        ]); 
        ?>
    </ul>
</div>
  </aside>
</div>
<?php include "footer.php"; ?>