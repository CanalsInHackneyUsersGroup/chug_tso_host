<?php include "header.php"; ?>
<div class="row">
    <?php if (!post_password_required()) { ?>
  <article class="page">
    <header><h1><?php echo $post->post_title; ?></h1></header>
    <?php the_post(); the_content(); ?>
  </article>
  <aside class="sidebar">
    <?php
    
    $children = get_pages('child_of='.$post->ID);
    
    if (!empty($children)) {
      echo '<div class="children">';
      $sub_pages_label = (get_field('sub_pages_label')) ? get_field('sub_pages_label') : 'Sub Pages';
      echo '<h2>'.$sub_pages_label.'</h2>';
      echo '<ul class="links">';
      foreach ($children as $child) {
        $important = get_field('important', $child->ID);
        echo '<li';
        if ($important) echo ' class="important"';
        echo '><a href="'.get_permalink($child->ID).'">'.$child->post_title.'</a></li>';
      }
      echo '</ul>';
      echo '</div>';
    }
    
    $cat = get_posts( array('category_name' => $post->post_title, 'numberposts' => 3) );
    if ($cat) {
        echo '<div class="links">';
        echo '<h2>'.$post->post_title.' News</h2>';
        echo '<ul class="links">';
        foreach ($cat as $catp) {
            echo '<li><a href="'.get_permalink($catp->ID).'">'.$catp->post_title.'</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }

    $related_links = get_field('link');
    if (is_array($related_links) && !empty($related_links)) {
      echo '<div class="links">';
      echo '<h2>Related Links</h2>';
      echo '<ul class="links">';
      foreach ($related_links as $link) {
        if (isset($link['url']) && isset($link['text'])) {
          echo '<li><a target="_blank" href="'.esc_url($link['url']).'">'.esc_html($link['text']).'</a></li>';
        }
      }
      echo '</ul>';
      echo '</div>';
    }
    
    $images = get_field('image');
    if (is_array($images) && !empty($images)) {
      echo '<div class="gallery">';
      echo '<h2>Gallery</h2>';
      echo '<div>';
      foreach ($images as $image) {
        if (isset($image['image']) && is_numeric($image['image'])) {
          $thumbnail = wp_get_attachment_image_src($image['image'], 'thumbnail');
          $large = wp_get_attachment_image_src($image['image'], 'large');
          if ($thumbnail && $large) {
            echo '<a href="'.esc_url($large[0]).'" rel="gallery"><img src="'.esc_url($thumbnail[0]).'" alt="" /></a>';
          }
        }
      }
      echo '</div>';
      echo '</div>';
    }
    
    
    ?>
  </aside>
    <?php } else {
        $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
        echo '<form id="login" class="protected-post-form" action="' . get_option( 'siteurl' ) . '/wp-pass.php" method="post">
        <div id="password">
        <label for="' . $label . '">Password</label><input name="post_password" id="' . $label . '" type="password" /></div><input type="submit" name="Submit" value="Submit" />
        </form>
        ';
    } ?>
</div>
<?php include "footer.php"; ?>