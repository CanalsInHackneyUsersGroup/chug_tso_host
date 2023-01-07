<?php /* Template name: Custom Home */ ?>
<?php include "header.php"; ?>
<div class="row">
  <div id="slider">
    <?php

    $slides = get_posts(array('category' => get_cat_id('slider')));
    foreach ($slides as $slide) {
      echo '<div class="slide" style="width: 620px; height: 320px">';
      if (has_post_thumbnail($slide->ID)) {
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($slide->ID ),"medium");
        echo '<img src="'.$thumbnail[0].'" style="width: '.$thumbnail[1].'px; height: '.$thumbnail[2].'px;" />';
      }
      echo '<a href="'.get_permalink($slide->ID).'" class="caption">'.$slide->post_title.'</a>';
      echo '</div>';
    }

    ?>
  </div>
  <script>
  
  $(window).load(function(){
      
      var sliderWidth = $('#slider').width();
      
      function slide(slider) {
        if ($(slider).width()*$(slider).children('.slide').length - sliderWidth > $(slider).scrollLeft()) $(slider).animate({scrollLeft: '+='+sliderWidth},250);
        else $(slider).animate({scrollLeft: 0},250);
      }

      $('#slider').click(function(){
        slide(this);
        clearInterval(timer);
        timer = setInterval(function(){
          slide('#slider');
        },7500);
      });

      var timer = setInterval(function(){
        slide('#slider');
      },7500);
  });
  
  </script>
  <div id="recent-news">
    <h2>Recent News</h2>
    <?php

    $news_items = get_posts(array('numberposts' => 5));
    foreach ($news_items as $news_item) {
      echo '<a class="news-item" href="'.get_permalink($news_item->ID).'">';
      echo '<span class="news-title">'.$news_item->post_title.'</span>';
      echo '<div class="news-excerpt">'.$news_item->post_excerpt.'</div>';
      echo '</a>';
    }

    ?>
  </div>
</div>

<div class="row">
  <div class="column" id="what-is-chug">
    <h2>What is C.H.U.G?</h2>
    <p><?php echo the_field('what_is_chug', 'options'); ?></p>
  </div>
  <div class="column" id="initiatives-sustainability">
    <h2>Initiatives &amp; Sustainability</h2>
    <p><?php echo the_field('initiatives_sustainability', 'options'); ?></p>
  </div>
  <div class="column" id="community-events">
    <h2>Community Events</h2>
    <p><?php echo the_field('community_events', 'options'); ?></p>
  </div>
</div>
<?php include "footer.php"; ?>