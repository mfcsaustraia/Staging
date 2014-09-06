<?php
if(isset($_POST['vote_question']))
{
	$hangout_id          = $_POST['hangout_id'];
	
	$vote_question       = $_POST['vote_question'];
	$vote_correct_option = $_POST['vote_option'];
	$vote_hidden_options = $_POST['vote_hidden_options'];
	
	
	
	
	update_post_meta($hangout_id,"vote_question", $vote_question);
	update_post_meta($hangout_id,"vote_correct_option", $vote_correct_option);
	update_post_meta($hangout_id,"vote_options", $vote_hidden_options);
	
	wp_redirect(admin_url()."admin.php?page=manage_hangout&EID=$post_id&sel=7");
}
if(isset($_REQUEST['add_pop_up_submit'])){

/* video code updation starts here */
$post_id=$_POST['hangout_id'];


	$ad = $_POST["hangout_aweber_display_hr"].'_'.$_POST["hangout_aweber_display_min"].'_'.$_POST["hangout_aweber_display_sec"];
	$ah = $_POST["hangout_aweber_hide_hr"].'_'.$_POST["hangout_aweber_hide_min"].'_'.$_POST["hangout_aweber_hide_sec"];
	$bd = $_POST["hangout_buybutton_display_hr"].'_'.$_POST["hangout_buybutton_display_min"].'_'.$_POST["hangout_buybutton_display_sec"];
	$bh = $_POST["hangout_buybutton_hide_hr"].'_'.$_POST["hangout_buybutton_hide_min"].'_'.$_POST["hangout_buybutton_hide_sec"];
	$vd = $_POST["hangout_vote_display_hr"].'_'.$_POST["hangout_vote_display_min"].'_'.$_POST["hangout_vote_display_sec"];
	$vh = $_POST["hangout_vote_hide_hr"].'_'.$_POST["hangout_vote_hide_min"].'_'.$_POST["hangout_vote_hide_sec"];
	
	update_post_meta($post_id,"hangout_aweber_display", $ad);
	update_post_meta($post_id,"hangout_aweber_hide", $ah);
	update_post_meta($post_id,"hangout_buybutton_display", $bd);
	update_post_meta($post_id,"hangout_buybutton_hide", $bh);
	update_post_meta($post_id,"hangout_vote_display", $vd);
	update_post_meta($post_id,"hangout_vote_hide", $vh);
	
	update_post_meta($post_id,"buybuttonhtml", $_POST["buybuttonhtml"]);
	update_post_meta($post_id,"show_by_button", $_POST["show_by_button"]);
	update_post_meta($post_id,"show_vote_form", $_POST["show_vote_form"]);
	update_post_meta($post_id,"show_optin_form", $_POST["show_optin_form"]);
	/* video code updation ends here */

}

if(isset($_GET['sel']) && $_GET['sel'] == 7)
{
?>
<div id="message" class="updated below-h2"><p>Vote Added Successfully. </p></div>
<?php
}
?>
<?php
$vote_question       = get_post_meta($_REQUEST['EID'],"vote_question", true);
$vote_options        = get_post_meta($_REQUEST['EID'],"vote_options", true);
$vote_correct_option = get_post_meta($_REQUEST['EID'],"vote_correct_option", true);
/* video player setting starts here */
 $post_id=$_REQUEST['EID'];

	$aweber_display_time    = get_post_meta($post_id,'hangout_aweber_display',true);
	$aweber_hide_time       = get_post_meta($post_id,'hangout_aweber_hide',true);
	$buybutton_display_time = get_post_meta($post_id,'hangout_buybutton_display',true);
	$buybutton_hide_time    = get_post_meta($post_id,'hangout_buybutton_hide',true);
	$vote_display_time      = get_post_meta($post_id,'hangout_vote_display',true);
	$vote_hide_time         = get_post_meta($post_id,'hangout_vote_hide',true);
	
	$buybuttonhtml          = get_post_meta($post_id,'buybuttonhtml',true);
	 $show_by_button          = get_post_meta($post_id,'show_by_button',true);
	 $show_vote_form          = get_post_meta($post_id,'show_vote_form',true);
	 $show_optin_form          = get_post_meta($post_id,'show_optin_form',true);
	
	/* video player setting ends here */
?>
<form method="post" id="hangout_vote" name="add_hangout" action="">
	<input type="hidden" name="hangout_id" value="<?php echo $_REQUEST['EID'];?>" />
	<div class="gh_tabs_div_inner">
		<div id="myMenu110" class="gh_accordian_tab"><i class="icon-plus-sign"></i> Add Vote Question </div>
		<div id="myDiv110" class="gh_accordian_div">
			<div class="row-fluid-outer">
				<div class="row-fluid">
					<div class="span4">
						<strong>Vote Question </strong>
					</div>
					<div class="span8">
						<input type="text" name="vote_question" id="vote_question" value="<?php echo $vote_question;?>"/>
					</div>
				</div>
			</div>
			<div class="row-fluid-outer">
				<div class="row-fluid">
					<div class="span4">
						<strong>Vote Options </strong>
					</div>
					<div class="span8" id="vote_option_output">
					<?php
					$options = explode('__', $vote_options);
					foreach($options as $option)
					{
						if($option == $vote_correct_option)
						{
							$selected = ' checked';
						}
						else
						{
							$selected = '';
						}
						if($option!=""){
					?>
					<div class="span8 optioncontainer">
						<input type="radio" name="vote_option" class="vote_options"<?php echo $selected;?> value="<?php echo $option;?>"> &nbsp;<?php echo $option;?> &nbsp;&nbsp;
						<a href="javascript:void(0);" style="float:right;" class="deletetoption" rel="<?php echo $option;?>">Delete</a>
					</div>
					<?php
					}
					}
					?>
					</div>
					<div class="span8" style="float:right;">
						<input type="text" placeholder="Set Option" name="vote_title_dummy" class="vote_title_dummy"/> <br />
						<input type="button" name="vote_add_more" class="vote_add_more hangout_btn" value="Add"/>
						<input type="hidden" name="vote_hidden_options" id="vote_hidden_options" value="<?php echo $vote_options;?>"/>
						<input type="button" name="add_vote_submit" class="hangout_btn" id="add_vote_submit" value="Submit"/>
					</div>
				</div>
			</div>
		</div>
		</form>
		<form method="post" id="hangout_pop_up" name="add_hangout_pop_up" action="">
		<input type="hidden" name="hangout_id" value="<?php echo $_REQUEST['EID'];?>" />
		<div id="myMenu210" class="gh_accordian_tab"><i class="icon-plus-sign"></i> Pop Up Setting </div>
		<div id="myDiv210" class="gh_accordian_div">
		<div class="row-fluid-outer">
                        <div class="row-fluid">
							<div class="span4">
								<strong>Show Optin Form</strong>
                            </div>
                            <div class="span8">
								<input type="radio" name="show_optin_form" id="show_optin_form_yes" value="1" <?php if($show_optin_form==1 || $show_optin_form==''){ echo 'checked="checked"'; } ?>/> Yes &nbsp;&nbsp; <input type="radio" name="show_optin_form" id="show_optin_form_no" value="0" <?php if($show_optin_form==0){ echo 'checked="checked"'; } ?>/> No
                                </div>
                            </div>
                        </div>
						<div id="optin_form"<?php if($show_optin_form==0 || $show_optin_form==''){ echo 'style="display:none"'; } ?>>
						<div class="row-fluid-outer">
		                    <div class="row-fluid">
								<div class="span4">
									<strong>Optin Form Display</strong>
		                        </div>
		                        <div class="span8">
		                        	<?php
		                        	$temp_aweber_display_time = explode('_', $aweber_display_time);
		                        	
		                        	$aweber_display_time_hr   = $temp_aweber_display_time[0];
		                        	$aweber_display_time_min  = $temp_aweber_display_time[1];
		                        	$aweber_display_time_sec  = $temp_aweber_display_time[2];
		                        	?>
		                        	<select name="hangout_aweber_display_hr" id="hangout_aweber_display_hr">
		                        	<?php
		                        	for($i=0;$i<=12;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $aweber_display_time_hr == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Hour(s)
		                        	
		                        	<select name="hangout_aweber_display_min" id="hangout_aweber_display_min">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $aweber_display_time_min == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Minute(s)
		                        	
		                        	<select name="hangout_aweber_display_sec" id="hangout_aweber_display_sec">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $aweber_display_time_sec == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Second(s)
		                        </div>
		                    </div>
                        </div>
						<div class="row-fluid-outer">
		                    <div class="row-fluid">
								<div class="span4">
									<strong>Optin Form Hide</strong>
		                        </div>
		                        <div class="span8">
		                        	<?php
		                        	$temp_aweber_hide_time = explode('_', $aweber_hide_time);
		                        	
		                        	$aweber_hide_time_hr   = $temp_aweber_hide_time[0];
		                        	$aweber_hide_time_min  = $temp_aweber_hide_time[1];
		                        	$aweber_hide_time_sec  = $temp_aweber_hide_time[2];
		                        	?>
		                        	<select name="hangout_aweber_hide_hr" id="hangout_aweber_hide_hr">
		                        	<?php
		                        	for($i=0;$i<=12;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $aweber_hide_time_hr == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Hour(s)
		                        	
		                        	<select name="hangout_aweber_hide_min" id="hangout_aweber_hide_min">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $aweber_hide_time_min == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Minute(s)
		                        	
		                        	<select name="hangout_aweber_hide_sec" id="hangout_aweber_hide_sec">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $aweber_hide_time_sec == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Second(s)
		                        </div>
		                    </div>
                        </div>
						</div>
						<div class="row-fluid-outer">
                        <div class="row-fluid">
							<div class="span4">
								<strong>Show Buy Button</strong>
                            </div>
                            <div class="span8">
								<input type="radio" name="show_by_button" id="show_by_button_yes" value="1" <?php if($show_by_button==1 || $show_by_button==''){ echo 'checked="checked"'; } ?>/> Yes &nbsp;&nbsp; <input type="radio" name="show_by_button" id="show_by_button_no" value="0" <?php if($show_by_button==0){ echo 'checked="checked"'; } ?>/> No
                                </div>
                            </div>
                        </div>
						<div id="by_button"<?php if($show_by_button==0 || $show_by_button==''){ echo 'style="display:none"'; } ?>>
						<div class="row-fluid-outer">
		                    <div class="row-fluid">
								<div class="span4">
									<strong>Buy Button Display</strong>
		                        </div>
		                        <div class="span8">
		                        	<?php
		                        	$temp_buybutton_display_time = explode('_', $buybutton_display_time);
		                        	
		                        	$buybutton_display_time_hr   = $temp_buybutton_display_time[0];
		                        	$buybutton_display_time_min  = $temp_buybutton_display_time[1];
		                        	$buybutton_display_time_sec  = $temp_buybutton_display_time[2];
		                        	?>
		                        	<select name="hangout_buybutton_display_hr" id="hangout_buybutton_display_hr">
		                        	<?php
		                        	for($i=0;$i<=12;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $buybutton_display_time_hr == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Hour(s)
		                        	
		                        	<select name="hangout_buybutton_display_min" id="hangout_buybutton_display_min">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $buybutton_display_time_min == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Minute(s)
		                        	
		                        	<select name="hangout_buybutton_display_sec" id="hangout_buybutton_display_sec">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $buybutton_display_time_sec == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Second(s)
		                        </div>
		                    </div>
                        </div>
						<div class="row-fluid-outer">
		                    <div class="row-fluid">
								<div class="span4">
									<strong>Buy Button Hide</strong>
		                        </div>
		                        <div class="span8">
		                        	<?php
		                        	$temp_buybutton_hide_time = explode('_', $buybutton_hide_time);
		                        	
		                        	$buybutton_hide_time_hr   = $temp_buybutton_hide_time[0];
		                        	$buybutton_hide_time_min  = $temp_buybutton_hide_time[1];
		                        	$buybutton_hide_time_sec  = $temp_buybutton_hide_time[2];
		                        	?>
		                        	<select name="hangout_buybutton_hide_hr" id="hangout_buybutton_hide_hr">
		                        	<?php
		                        	for($i=0;$i<=12;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $buybutton_hide_time_hr == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Hour(s)
		                        	
		                        	<select name="hangout_buybutton_hide_min" id="hangout_buybutton_hide_min">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $buybutton_hide_time_min == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Minute(s)
		                        	
		                        	<select name="hangout_buybutton_hide_sec" id="hangout_buybutton_hide_sec">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $buybutton_hide_time_sec == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Second(s)
		                        </div>
		                    </div>
                        </div>
						<div class="row-fluid-outer">
		                    <div class="row-fluid">
								<div class="span4">
									<strong>Buy Button Html</strong>
		                        </div>
		                        <div class="span8">
								<?php
									$args=array("textarea_name" => "buybuttonhtml");
									$content = $buybuttonhtml;
									$editor_id = 'buybuttonhtml';

									wp_editor( $content, $editor_id,$args );

									?>
								
		                        	<!--<textarea name="buybuttonhtml1" id="buybuttonhtml1"><?php //echo $buybuttonhtml;?></textarea>-->
		                        </div>
		                    </div>
		                </div>
						</div>
						<div class="row-fluid-outer">
                        <div class="row-fluid">
							<div class="span4">
								<strong>Show Vote Form</strong>
                            </div>
                            <div class="span8">
								<input type="radio" name="show_vote_form" id="show_vote_form_yes" value="1" <?php if($show_vote_form==1 || $show_vote_form==''){ echo 'checked="checked"'; } ?>/> Yes &nbsp;&nbsp; <input type="radio" name="show_vote_form" id="show_vote_form_no" value="0" <?php if($show_vote_form==0){ echo 'checked="checked"'; } ?>/> No
                                </div>
                            </div>
                        </div>
						<div id="vote_form" <?php if($show_vote_form==0 || $show_vote_form==''){ echo 'style="display:none"'; } ?>>
						<div class="row-fluid-outer">
		                    <div class="row-fluid">
								<div class="span4">
									<strong>Vote Form Display</strong>
		                        </div>
		                        <div class="span8">
		                        	<?php
		                        	$temp_vote_display_time = explode('_', $vote_display_time);
		                        	
		                        	$vote_display_time_hr   = $temp_vote_display_time[0];
		                        	$vote_display_time_min  = $temp_vote_display_time[1];
		                        	$vote_display_time_sec  = $temp_vote_display_time[2];
		                        	?>
		                        	<select name="hangout_vote_display_hr" id="hangout_vote_display_hr">
		                        	<?php
		                        	for($i=0;$i<=12;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $vote_display_time_hr == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Hour(s)
		                        	
		                        	<select name="hangout_vote_display_min" id="hangout_vote_display_min">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $vote_display_time_min == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Minute(s)
		                        	
		                        	<select name="hangout_vote_display_sec" id="hangout_vote_display_sec">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $vote_display_time_sec == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Second(s)
		                        </div>
		                    </div>
                        </div>
						<div class="row-fluid-outer">
		                    <div class="row-fluid">
								<div class="span4">
									<strong>Vote Form Hide</strong>
		                        </div>
		                        <div class="span8">
		                        	<?php
		                        	$temp_vote_hide_time = explode('_', $vote_hide_time);
		                        	
		                        	$vote_hide_time_hr   = $temp_vote_hide_time[0];
		                        	$vote_hide_time_min  = $temp_vote_hide_time[1];
		                        	$vote_hide_time_sec  = $temp_vote_hide_time[2];
		                        	?>
		                        	<select name="hangout_vote_hide_hr" id="hangout_vote_hide_hr">
		                        	<?php
		                        	for($i=0;$i<=12;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $vote_hide_time_hr == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Hour(s)
		                        	
		                        	<select name="hangout_vote_hide_min" id="hangout_vote_hide_min">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $vote_hide_time_min == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Minute(s)
		                        	
		                        	<select name="hangout_vote_hide_sec" id="hangout_vote_hide_sec">
		                        	<?php
		                        	for($i=0;$i<=60;$i++)
		                        	{
		                        	?>
		                        	<option value="<?php echo $i;?>" <?php echo $vote_hide_time_sec == $i ? 'selected="selected"' : ''; ?>><?php echo $i;?></option>
		                        	<?php
		                        	}
		                        	?>
		                        	</select>&nbsp;Second(s)
		                        </div>
		                    </div>
                        </div>
						</div>
						<input type="submit" name="add_pop_up_submit" class="hangout_btn" id="add_pop_up_submit" value="Save Settings"/>
		
		</div>
	
</form>

<?php
$sql     = 'SELECT * FROM hangout_vote WHERE hangout_id = "'.$hangout.'"';
$results = $wpdb->get_results($sql);
?>

	<div id="myMenu0" class="gh_accordian_tab"><i class="icon-plus-sign"></i> View Vote Stats </div>
	<div id="myDiv0" class="gh_accordian_div">
		<?php echo "Question : <strong>".$vote_question."</strong>";?><br />
		<?php
		$options = explode('__', $vote_options);
		$count = 1;
		foreach($options as $option)
		{
			$sql     = 'SELECT count(*) FROM hangout_vote WHERE hangout_id = "'.$_REQUEST['EID'].'" AND answer = "'.$option.'"';
			$results = $wpdb->get_var($sql);
			if($option!=""){
		?>
		<?php echo $count.") <strong>".$option."</strong>";?> -- <?php echo $results;?> Vote(s)<br />
		<?php
		$count++;
		}
		}
		?>
	</div>
</div>

<script type="text/javascript">
function storeHiddenOptions()
{
	var opt = '';
	jQuery('.vote_options').each(function(){
		var optval = jQuery(this).attr('value');
		if(opt == '')
		{
			opt = optval;
		}
		else
		{
			opt += '__'+optval;
		}
	});
	
	jQuery('#vote_hidden_options').val(opt);
}

jQuery(document).ready(function(){
	jQuery(".vote_add_more").live('click',function(){		
		
		var optiontitle   = jQuery('.vote_title_dummy').val();
		
		if(optiontitle == '')
		{
			alert('Fill Option Title.');
			return false;
		}
		
		// add option
		var generateradio = '<div class="span8 optioncontainer"><input type="radio" name="vote_option" class="vote_options" value="'+optiontitle+'"> &nbsp;'+optiontitle+' &nbsp;&nbsp;<a href="javascript:void(0);" style="float:right;" class="deletetoption" rel="'+optiontitle+'">Delete</a></div>';		
		jQuery('#vote_option_output').append(generateradio);
		
		jQuery('.vote_title_dummy').val('');
		jQuery('.vote_option_value_dummy').val('');
		
		storeHiddenOptions();
	});
	
	jQuery('.deletetoption').live('click', function(){
		var currentclick = jQuery(this);
		var rel = jQuery(this).attr('rel');
		
		jQuery(currentclick).parent('.optioncontainer').remove();
		
		storeHiddenOptions();
	});
	
	jQuery('#add_vote_submit').live('click', function(){
		var vote_question = jQuery('#vote_question').val();
		var vote_options  = jQuery('#vote_option_output .vote_options').length;
		
		if(vote_question == '')
		{
			alert('Please Add Question');
			return false;
		}
		
		if(vote_options == 0)
		{
			alert('Please Add Options');
			return false;
		}
		
		var selec = 0;
		jQuery('#vote_option_output .vote_options').each(function(){
			if(jQuery(this).attr('checked'))
			{
				selec = 1;
			}
		});
		
		if(selec == 0)
		{
			alert('Please Select Any Of The Option');
			return false;
		}
		
		
		jQuery('#hangout_vote').submit();
	});
});
</script>
