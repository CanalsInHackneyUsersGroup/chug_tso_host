        <img id="award" src="<?php bloginfo('template_directory'); ?>/img/awarded.png" />

      </div>
    </div>
    <div class="bottom">
      <footer id="footer">
        <div class="footer-left">
            <div id="registered">Registered charity number <?php echo the_field('charity_number', 'options'); ?></div>
            <iframe id="facebook" src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FCanalsinHackneyUsersGroup&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
            </div>
        <div class="footer-right">
            <div id="contact"><?php echo the_field('e-mail', 'options'); ?> / <?php echo the_field('address', 'options'); ?></div>
            <form id="tinyletter" action="http://tinyletter.com/chug" method="post" target="popupwindow" onsubmit="window.open('http://tinyletter.com/chug', 'popupwindow', 'scrollbars=yes,width=800,height=600');return true">Sign up to the CHUG newsletter: <input type="text" style="width:140px" name="emailaddress"/><input type="hidden" value="1" name="embed"/><input type="submit" value="Subscribe" /></form>
        </div>
      </footer>
    </div>
  </body>
</html>