<?php
/*
Plugin Name: Migrate Site Settings
Plugin URI: http://developingelegance.com/
Description: This plugin saves your Wordpress site preferences for import into another Wordpress site, making deployment of many sites with the same preferences easy.
Version: 0.1
Author: Tim Mahoney
Author URI: http://timothymahoney.com/
License: GPLv2
*/
/*
Copyright 2010  Tim Mahoney  (email : tim@developingelegance.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

http://www.gnu.org/licenses/gpl.txt
*/


if(!class_exists("ace_site_settings")){

class ace_site_settings {
// List of options we want to save. 
// Next version, maybe make a page where the user can select these themselves?
  var $optionstosave = array(

  'ace_theme_color',
  'ace_favicon',
  'ace_footer_credit',

  'ace_link',
  'ace_link_hover',
  'ace_nav_bar',
  'ace_button_bg',
  'ace_button_border',
  'ace_button_text',
  'ace_button_bg_hover',
  'ace_button_border_hover',
  'ace_button_text_hover',
  'ace_h1',
  'ace_h2',
  'ace_h3',
  'ace_h4',
  'ace_h5',
  'ace_h6',
  'ace_',

  'ace_header_scripts',
  'ace_footer_scripts',
  'ace_css',

  'ace_feature_enable',
  'ace_feature_enable_home',
  'ace_feature_title_enable',
  'ace_featured_slide_style',
  'ace_featured_slide_pause',
  'ace_featured_slide_speed',

  'ace_enable_breadcrumb',
  'ace_enable_excerpt',
  'ace_enable_related',
  'ace_enable_post_thumbnail',
  'ace_thumb_width',
  'ace_thumb_height',

  'ace_404_page',

  );


  function __construct( ) {
    add_action( 'admin_menu', array( $this, 'addOptionsPage' ) );
  }

  public function addOptionsPage() {
    add_theme_page('Theme Settings', 'Theme Settings', 'administrator', basename(__FILE__), array($this,'optionsPageView'));
  }

  public function optionsPageView() {

    // If there's a file upload, process it.
    if ( isset($_POST['fileuploadsubmit']) ) {

      // If there's a file upload error, notify the user
      if ($_FILES["xmlfile"]["error"] > 0 || $_FILES["xmlfile"]["type"] != "text/xml") {
        echo "Error: " . $_FILES["xmlfile"]["error"] . "<br />";
      } else {
        // load the file
        $xml = simplexml_load_file($_FILES["xmlfile"]["tmp_name"]);
      }

      //Build a list of status updates to tell the user what has been changed.
      $status = "<ol>";
      foreach($xml as $key => $setting) {
        // Trim the SimpleXML crap out of the setting string.
        $setting_final = trim((string)$setting);
          if(get_option($key) != $setting_final ) {
            $status .= '<li>Setting "'.$key.'" used to be '.get_option($key).' and has successfully been set to '.$setting_final.'</li>';
            // Update the option
            update_option($key, $setting_final);
          }
      }
    $status .= "</ol>";

    }
			
  if ( isset($_POST['deletexmlsubmit']) ) {
  $path = "..";
  $directory = opendir($path);
    while($entryName = readdir($directory)) {
      $dirArray[] = $entryName;
    }
  closedir($directory);
  foreach($dirArray as $file) {
    $ext = substr($file, strrpos($file, '.') + 1);
    // echo $ext;
    if($ext == "xml"){
      unlink($path.'/'.$file);
    }
  }

} ?>

<div class="wrap">
  <div id="icon-themes" class="icon32"><br /></div>
  <h2>Import/Export Theme Settings</h2>

  <?php
  $xml = $this->generateXMLString();
  if ( isset($_POST['generatexmlsubmit']) ) {
    $filename = $this->generateXMLFile($xml);
  }
  ?>
  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
  <p><input type="submit" name="generatexmlsubmit" class="button" value="Generate XML file"> <input type="submit" name="deletexmlsubmit" class="button" value="Delete all XML files" onclick="javascript:return confirm('Are you sure you want to delete all XML files?')"></p>
  <?php if ( isset($_POST['generatexmlsubmit']) ) { ?>
    <p>Right Click and Save Target As: <a href="../<?php echo $filename; ?>" target="_blank"><?php echo $filename; ?></a></p>
  <?php } ?>
  <p><input type="file" name="xmlfile"><input type="submit" class="button" name="fileuploadsubmit" value="Upload New Settings" onclick="javascript:return confirm('Are you sure you want to replace the settings?')"></p>
  <?php
  if(isset($status)) {
    echo "<h4>Update Results</h4>";
      if( $status != "<ol></ol>" ) {
        echo $status;
      } else {
        echo "No Changes Needed";
      }
  } else {
    echo "<h4>Current Settings in XML format</h4>";
    echo "<pre>".htmlentities($xml)."</pre>";
  }
  ?>
  </form>
  <?php
  }
		
  /* 
  * generateXMLString
  * This function generates the XML displayed on the Admin page, and will be used to save the file.
  */
  public function generateXMLString() {
    $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
    $xml .= '<site_settings>'."\n";
    foreach($this->optionstosave as $ots){
      $option = get_option( $ots );
      $option = htmlentities($option);
      $xml .= "\t<".$ots.">".$option."</".$ots.">\n";
    }
    $xml .= '</site_settings>';
    return $xml;
  }

  /* 
  * generateXMLFile
  * Save the file to the plugin folder so that the user can download it.
  */
  public function generateXMLFile($xmlString) {
    $filename = "ace_".md5(time()).".xml";
    $myFile = "../".$filename;
    $fh = fopen($myFile, 'w');
    fwrite($fh, $xmlString);
    fclose($fh);
    return $filename;
  }

}
}

global $migrateSettings;
$migrateSettings = new ace_site_settings();

?>