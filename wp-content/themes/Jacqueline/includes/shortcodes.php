<?php
// ==================================================================
// Shortcodes auto formatting
// ==================================================================
function parse_shortcode_content( $content ) {
  $content = trim( wpautop( do_shortcode( $content ) ) );
  if( substr( $content, 0, 4 ) == '</p>' )
    $content = substr( $content, 4 );
  if( substr( $content, -3, 3 ) == '<p>' )
    $content = substr( $content, 0, -3 );
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );
  return $content;
}
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'shortcode_unautop', 100 );

// ==================================================================
// Slider
// ==================================================================
function slide( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'id'      => 'Slide_ID',
  ), $atts ) );
  $output = '';
  $output .= '
    <section class="sc-slide">
      <ul class="'.$id.'">
      '.do_shortcode($content).'
      </ul>
    </section>
  ';
  $output .= '
    <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".'.$id.'").responsiveSlides({
        auto: false,
        pager: true,
        nav: false,
        speed: 500
      });
    });
    </script>';

  return $output;

}
add_shortcode('slide', 'slide');

  // ==================================================================
  // Slider images
  // ==================================================================
  function slide_image( $atts ) {
    extract( shortcode_atts( array(
      'src'   => 'http://image.jpg',
      'title' => 'image title',
      'caption' => 'image caption',
      'url' => 'url',
    ), $atts ) );
  $output = '';

  $output .= '<li>';

  if( $url == '' ):
    $output .= '';
  elseif( $url !== '' ):
    $output .= '<a href="'.$url.'">';
  endif;

  $output .= '<img src="'.$src.'" alt="'.$title.'" />';

  if( $url == '' ):
    $output .= '';
  elseif( $url !== '' ):
    $output .= '</a>';
  endif;

  if( $caption == '' ):
    $output .= '';
  elseif( $caption !== '' ):
    $output .= '<p class="caption">'.$caption.'</p>';
  endif;

  $output .= '</li>';
  return $output;


    //return '<li><img src="'.$src.'" alt="'.$title.'" /><p class="caption">'.$caption.'</p></li>';
  }
  add_shortcode('images', 'slide_image');

// ==================================================================
// Split content left/right
// ==================================================================
function column_left( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="left">'.do_shortcode($content).'</article>';
}
function column_right( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="right">'.do_shortcode($content).'</article><div class="clearfix">&nbsp;</div>';
}
add_shortcode('left', 'column_left');
add_shortcode('right', 'column_right');

// ==================================================================
// Split content 3 columns
// ==================================================================
function column_1( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="col1">'.do_shortcode($content).'</article>';
}
function column_2( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="col2">'.do_shortcode($content).'</article>';
}
function column_3( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="col3">'.do_shortcode($content).'</article><div class="clearfix">&nbsp;</div>';
}
add_shortcode('col1', 'column_1');
add_shortcode('col2', 'column_2');
add_shortcode('col3', 'column_3');

// ==================================================================
// Split content 3 half columns
// ==================================================================
function column_3_2( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="col3-2">'.do_shortcode($content).'</article>';
}
function column_3_1( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="col3-1">'.do_shortcode($content).'</article><div class="clearfix">&nbsp;</div>';
}
add_shortcode('col3_2', 'column_3_2');
add_shortcode('col3_1', 'column_3_1');

// ==================================================================
// Tooltip
// ==================================================================
function tooltip( $atts, $content = null ) {
  extract(shortcode_atts(
    array(
    "text" => null
    ), $atts)
  );
  return '<span class="tooltip">'.do_shortcode($content).'<span class="tip radius-2">'.$text.'</span></span>';
}
add_shortcode('tooltip', 'tooltip');

// ==================================================================
// Break line
// ==================================================================
function line() {
  return '<hr class="line" />';
}
add_shortcode('line', 'line');

// ==================================================================
// Warning box
// ==================================================================
function warning( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="warning radius-4">'.do_shortcode($content).'</article><div class="clearfix">&nbsp;</div>';
}
add_shortcode('warning', 'warning');

// ==================================================================
// Querstion box
// ==================================================================
function question( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="question radius-4">'.do_shortcode($content).'</article><div class="clearfix">&nbsp;</div>';
}
add_shortcode('question', 'question');

// ==================================================================
// Disclaimer box
// ==================================================================
function disclaim( $atts, $content = null ) {
  $content = parse_shortcode_content( $content );
  return '<article class="disclaim radius-4">'.do_shortcode($content).'</article><div class="clearfix">&nbsp;</div>';
}
add_shortcode('disclaim', 'disclaim');

// ==================================================================
// Button
// ==================================================================
function button_code( $atts, $content = null ) {
  extract(shortcode_atts(
    array(
    'url' => 'http://'
    ), $atts)
  );
  return '<a href="'.$url.'" class="post-button radius-2">'.do_shortcode($content).'</a>';
}
add_shortcode('button', 'button_code');

// ==================================================================
// Lightbox
// ==================================================================
function lightbox( $atts, $content = null ) {
  extract(shortcode_atts(
    array(
    'title' => 'TITLE',
    'url'   => 'URL',
    ), $atts)
  );
  return '<a class="colorbox-iframe" href="'.$url.'" title="'.$title.'">'.do_shortcode($content).'</a>';
}
add_shortcode('lightbox', 'lightbox');

// ==================================================================
// Pullquote
// ==================================================================
function pullquote( $atts, $content = null ) {
  extract(shortcode_atts(
    array(
    'width' => '300',
    'float' => 'left',
    ), $atts)
  );
  $content = parse_shortcode_content( $content );
  return '<blockquote class="pullquote" style="float:'.$float.'; width:'.$width.'px">'.do_shortcode($content).'</blockquote>';
}
add_shortcode('pullquote', 'pullquote');

// ==================================================================
// Accordion
// ==================================================================
function accordion_code( $atts, $content = null ) {
  extract(shortcode_atts(
    array(
    'title' => 'TITLE'
    ), $atts)
  );
  $content = parse_shortcode_content( $content );
  return '<section class="accordion-wrap"><article class="accordion-title radius-2">'.$title.'</article><article class="accordion-content">'.do_shortcode($content).'</article></section>';
}
add_shortcode('accordion', 'accordion_code');

// ==================================================================
// Contact form
// ==================================================================
function contactForm( $atts, $content = null)	{
  // gives access to the plugin's base directory
  extract( shortcode_atts( array(
    'email'   => get_bloginfo('admin_email'),
    'subject' => "Subject",
    'message' => "Message",
    'url'     => get_template_directory_uri()
  ), $atts ) );
  $output = '';
  // now we put all of the HTML for the form into a PHP string
  $output .= '<div id="contact-message">';
  $output .= '<form id="contact-form" action="">';
  $output .= '<input name="to_email" type="hidden" id="to_email" value="'.$email.'"/>';
  $output .= '<input name="subject" type="hidden" id="subject" value="'.$subject.'"/>';
  $output .= '<input name="name" type="text" class="contact-form-text" id="name" title="Name" />';
  $output .= '<input name="email" type="text" class="contact-form-text" id="email" title="Email" />';
  $output .= '<input name="mobile" type="text" class="contact-form-text" id="mobile" title="Mobile" />';
  $output .= '<textarea rows="" cols="" class="contact-form-textarea" name="message" title="Message"></textarea>';
  $output .= '<input type="submit" value="Submit" class="contact-form-button" id="contact-submit" />';
  $output .= '</form>';
  $output .= '</div><!--#contact-message-->';
  $output .= '<div id="contact-note"></div><!--notification area used by jQuery/Ajax -->';
  
  $output .= '
  <script type="text/javascript">
  var $j = jQuery.noConflict();
    $j(window).load(function(){
      $j("#contact-form").submit(function() {
        // validate and process form here
        $j("#contact-message").append("<span class=\"contact-form-sending\">Sending...</span>");
        var str = $j(this).serialize();
        $j.ajax({
          type: "POST",
          url: "'.$url.'/includes/sendmail.php",
          data: str,
          success: function(msg){
            $j("#contact-note").ajaxComplete(function(event, request, settings) {
              if(msg == "OK") // Message Sent? Show the Thank You message and hide the form
              {
                result = "'.$message.'";
                $j("#contact-message").slideUp();
              } else {
                result = msg;
              }
              $j(this).html(result);
              $j(".contact-form-sending").remove();
            });
          }
        });
      return false;
      });
    });
  </script>';
  return $output;
}
add_shortcode('contact', 'contactForm');
