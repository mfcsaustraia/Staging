<?php
// ==================================================================
// About author
// ==================================================================
class ace_author extends WP_Widget {

  function ace_author() {
    $widget_ops = array('description' => __('Show a short biography of author','ace') );
    parent::WP_Widget(false, __('Ace Blog Author','ace'),$widget_ops);      
  }

  function widget($args, $data) {  
  extract( $args );
    $title          = $data['title'];
    $bio            = $data['bio'];
    $pic            = $data['pic'];
    $read_more_text = $data['read_more_text'];
    $read_more_url  = $data['read_more_url'];

    echo $before_widget; ?>

      <?php if ($title) { echo $before_title . $title . $after_title; } ?>

      <?php if( $data['pic'] ) { ?><img src="<?php echo $pic; ?>" class="alignleft" alt="<?php echo $title; ?>" /><?php } ?>
      <p><?php echo $bio; ?></p><?php if ( $data['read_more_url'] ) echo '<br /><a href="' . $read_more_url . '">' . $read_more_text . '</a>'; ?>
      <div class="clearfix">&nbsp;</div>

    <?php echo $after_widget; }
    function update( $new_data, $old_data ) { return $new_data; }
    function form( $data ) {
      $title          = isset( $data['title'] ) ? esc_attr( $data['title'] ) : '';
      $bio            = isset( $data['bio'] ) ? esc_attr( $data['bio'] ) : '';
      $pic            = isset( $data['pic'] ) ? esc_attr( $data['pic'] ) : '';
      $read_more_text = isset( $data['read_more_text'] ) ? esc_attr( $data['read_more_text'] ) : '';
      $read_more_url  = isset( $data['read_more_url'] ) ? esc_attr( $data['read_more_url'] ) : '';
    ?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'pic' ); ?>"><?php _e('Picture','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'pic' ); ?>"  value="<?php echo $pic; ?>" class="widefat" id="<?php echo $this->get_field_id( 'pic' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'bio' ); ?>"><?php _e('Short Description','ace'); ?>:</label>
  <textarea name="<?php echo $this->get_field_name( 'bio' ); ?>" class="widefat" rows="5" id="<?php echo $this->get_field_id( 'bio' ); ?>"><?php echo $bio; ?></textarea>
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'read_more_text' ); ?>"><?php _e('Read More Text (optional)','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'read_more_text' ); ?>"  value="<?php echo $read_more_text; ?>" class="widefat" id="<?php echo $this->get_field_id( 'read_more_text' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'read_more_url' ); ?>"><?php _e('Read More URL (optional)','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'read_more_url' ); ?>"  value="<?php echo $read_more_url; ?>" class="widefat" id="<?php echo $this->get_field_id( 'read_more_url' ); ?>" />
</p>
       
  <?php }

}

function ace_author() {
  register_widget('ace_author');
}
add_action( 'widgets_init','ace_author');

// ==================================================================
// Location
// ==================================================================
class ace_contact_location extends WP_Widget {

  function ace_contact_location() {
    $widget_ops = array('description' => __('This is a contact and location widget','ace') );
    parent::WP_Widget(false, __('Ace Contact Location','ace'),$widget_ops);      
  }
	
  function widget($args, $data) {  
  extract( $args );
    $title    = $data['title'];
    $location = $data['location'];
    $email    = $data['email'];
    $phone    = $data['phone'];
    $fax      = $data['fax'];

    echo $before_widget; ?>
    
      <?php if ($title) { echo $before_title . $title . $after_title; } ?>

      <ul class="location">
        <?php if( $data['location'] ) { ?><li class="address"><?php $line_break = nl2br( $data['location'] ); echo $line_break; ?></li><?php } ?>
        <?php if( $data['email'] ) echo '<li class="email">' . $email . '</li>'; ?>
        <?php if( $data['phone'] ) echo '<li class="phone">' . $phone . '</li>'; ?>
        <?php if( $data['fax'] ) echo '<li class="fax">' . $fax . '</li>'; ?>
      </ul>
      <div class="clearfix">&nbsp;</div>

    <?php echo $after_widget; }
    function update( $new_data, $old_data ) { return $new_data; }
    function form($data) {
      $title    = isset( $data['title'] ) ? esc_attr( $data['title'] ) : '';
      $location = isset( $data['location'] ) ? esc_attr( $data['location'] ) : '';
      $email    = isset( $data['email'] ) ? esc_attr( $data['email'] ) : '';
      $phone    = isset( $data['phone'] ) ? esc_attr( $data['phone'] ) : '';
      $fax      = isset( $data['fax'] ) ? esc_attr( $data['fax'] ) : '';
    ?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'location' ); ?>"><?php _e('Address','ace'); ?>:</label>
  <textarea name="<?php echo $this->get_field_name( 'location' ); ?>" class="widefat" rows="5" id="<?php echo $this->get_field_id( 'location' ); ?>"><?php echo $location; ?></textarea>
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email address','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'email' ); ?>"  value="<?php echo $email; ?>" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e('Phone number','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'phone' ); ?>"  value="<?php echo $phone; ?>" class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e('Fax number','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'fax' ); ?>"  value="<?php echo $fax; ?>" class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" />
</p>

  <?php }

}

function ace_contact_location() {
  register_widget('ace_contact_location');
}
add_action( 'widgets_init','ace_contact_location');

// ==================================================================
// Social network
// ==================================================================
class ace_social extends WP_Widget {

  function ace_social() {
    $widget_ops = array('description' => __('Show social network like Twitter, Facebook, RSS, etc.','ace') );
    parent::WP_Widget(false, __('Ace Social Networks','ace'),$widget_ops);      
  }

  function widget($args, $data) {  
  extract( $args );
    $title    = $data['title'];
    $rss      = $data['rss'];
    $email    = $data['email'];
    $facebook = $data['facebook'];
    $twitter  = $data['twitter'];
    $google     = $data['google'];
    $flickr     = $data['flickr'];
    $linkedin   = $data['linkedin'];
    $youtube    = $data['youtube'];
    $vimeo      = $data['vimeo'];
    $instagram  = $data['instagram'];
    $bloglovin  = $data['bloglovin'];
    $pinterest  = $data['pinterest'];

    echo $before_widget; ?>

      <?php if ($title) { echo $before_title . $title . $after_title; } ?>

      <div class="textwidget">
        <ul class="social-icons">
          <?php if( $data['twitter'] ) echo '<li><a href="http://www.twitter.com/' . $twitter . '" class="social-twitter">Twitter</a></li>' ?>
          <?php if( $data['facebook'] ) echo '<li><a href="' . $facebook . '" class="social-facebook">Facebook</a></li>' ?>
          <?php if( $data['google'] ) echo '<li><a href="' . $google.'" class="social-google">Google Plus</a></li>' ?>
          <?php if( $data['flickr'] ) echo '<li><a href="' . $flickr.'" class="social-flickr">Flickr</a></li>' ?>
          <?php if( $data['linkedin'] ) echo '<li><a href="' . $linkedin.'" class="social-linkedin">Linkedin</a></li>' ?>
          <?php if( $data['youtube'] ) echo '<li><a href="' . $youtube.'" class="social-youtube">YouTube</a></li>' ?>
          <?php if( $data['vimeo'] ) echo '<li><a href="' . $vimeo.'" class="social-vimeo">Vimeo</a></li>' ?>
          <?php if( $data['instagram'] ) echo '<li><a href="' . $instagram.'" class="social-instagram">Instagram</a></li>' ?>
          <?php if( $data['bloglovin'] ) echo '<li><a href="' . $bloglovin.'" class="social-bloglovin">Bloglovin</a></li>' ?>
          <?php if( $data['pinterest'] ) echo '<li><a href="' . $pinterest.'" class="social-pinterest">Pinterest</a></li>' ?>
          <?php if( $data['email'] ) echo '<li><a href="mailto:' . $email . '" class="social-email">Email</a></li>' ?>
          <?php if( $data['rss'] ) echo '<li><a href="' . $rss.'" class="social-rss">RSS feed</a></li>' ?>
        </ul>
        <div class="clearfix">&nbsp;</div>
      </div>

    <?php	 echo $after_widget;}
    function update( $new_data, $old_data ) { return $new_data; }
    function form( $data ) {
      $title    = isset( $data['title'] ) ? esc_attr( $data['title'] ) : '';
      $rss      = isset( $data['rss'] ) ? esc_attr( $data['rss'] ) : '';
      $email    = isset( $data['email'] ) ? esc_attr( $data['email'] ) : '';
      $facebook = isset( $data['facebook'] ) ? esc_attr( $data['facebook'] ) : '';
      $twitter  = isset( $data['twitter'] ) ? esc_attr( $data['twitter'] ) : '';
      $google     = isset( $data['google'] ) ? esc_attr( $data['google'] ) : '';
      $flickr     = isset( $data['flickr'] ) ? esc_attr( $data['flickr'] ) : '';
      $linkedin   = isset( $data['linkedin'] ) ? esc_attr( $data['linkedin'] ) : '';
      $youtube    = isset( $data['youtube'] ) ? esc_attr( $data['youtube'] ) : '';
      $vimeo      = isset( $data['vimeo'] ) ? esc_attr( $data['vimeo'] ) : '';
      $instagram  = isset( $data['instagram'] ) ? esc_attr( $data['instagram'] ) : '';
      $bloglovin  = isset( $data['bloglovin'] ) ? esc_attr( $data['bloglovin'] ) : '';
      $pinterest  = isset( $data['pinterest'] ) ? esc_attr( $data['pinterest'] ) : '';
    ?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email address','ace'); ?>::</label>
  <input type="text" name="<?php echo $this->get_field_name( 'email' ); ?>"  value="<?php echo $email; ?>" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('Custom RSS feed (Leave blank to use default)','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'rss' ); ?>"  value="<?php echo $rss; ?>" class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook full URL','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'facebook' ); ?>"  value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter username','ace'); ?>:</label>
  <input type="text" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google Plus:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('google'); ?>"  value="<?php echo $google; ?>" class="widefat" id="<?php echo $this->get_field_id('google'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('flickr'); ?>"  value="<?php echo $flickr; ?>" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>"  value="<?php echo $linkedin; ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('youtube'); ?>"  value="<?php echo $youtube; ?>" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('vimeo'); ?>"  value="<?php echo $vimeo; ?>" class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>"  value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('pinterest'); ?>"  value="<?php echo $pinterest; ?>" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" />
</p>

<p>
  <label for="<?php echo $this->get_field_id('bloglovin'); ?>"><?php _e('Bloglovin:','ace'); ?></label>
  <input type="text" name="<?php echo $this->get_field_name('bloglovin'); ?>"  value="<?php echo $bloglovin; ?>" class="widefat" id="<?php echo $this->get_field_id('bloglovin'); ?>" />
</p>

  <?php }

}

function ace_social() {
  register_widget('ace_social');
}
add_action( 'widgets_init','ace_social');