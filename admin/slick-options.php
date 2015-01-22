<?php

// Building the admin interface

?>

<style>
	.wrap {
		margin: 30px auto 20px;
	}
	h2.page-header {
		padding:15px 10px;
		background:#333;
		background: #5A811D;
		border:1px solid #ccc;
		color:#efefef
	}
	.form-container {
		border:1px solid #ccc; padding:40px 20px;
	}
	.branding-link {
		float:right;
	}
	.branding-link, .branding-link a{
		color: #efefef;
		font-size: 0.6em;
		text-decoration: none;
	}
	.branding-link a:hover{
		color: #fff;
		text-decoration: underline;
		text-shadow: 0 0 1px #ccc;
	}
	.submit {
		text-align: center !important; 
	}
	#submit {
	  background: none repeat scroll 0 0 #5a811d;
	  border: 1px solid #39601c;
	  height: auto;
	  padding: 10px 20px;
	  width: auto;
	}
	.notice-bottom {
	  background-color: #5A811D;
	  padding: 10px 20px;
	  color: #efefef;
	  font-size: 14px;
	  border-radius: 10px;
	  border: 2px solid #406700;
	}
</style>


<div class="wrap">
	<h2 class="page-header">
		Slick Popup Options 
		<!--<span class="branding-link"><a href="http://www.omaksolutions.com" title="Om Ak Solutions">Om Ak Solutions</a></span>-->
		<span class="branding-link">Need Help? Skype Me: ak.singla47</span>
	</h2>
	
	<div class="form-container" style="">
		<form method="post" action="options.php">

			<?php settings_fields( 'mypopup-group' ); ?>
			<?php do_settings_sections( 'slick-options.php' ); ?> 
			
			<style>
				.form-table tr {
					border-right: 10px solid #333;
					border-top: 1px solid #ccc;
				}
				.form-table th {
				  background: #333;
				  text-align: center;
				  color: #bbb;
				}
				.help-box {
				  background: none repeat scroll 0 0 #ddd;
				  color: #333;
				  font-size: 11px !important;
				  font-weight: bold;
				  text-align: left;
				}
				.default-text {
					font-size: 12px;
					color: #777;
				}
			</style>
			
			<table class="form-table">

				<tr valign="top">
					<th scope="row">Theme Color</th>
					<td><input type="color" name="primary_color" value="<?php echo get_option('primary_color'); ?>" /></td>
					<td class="help-box">Default: #074C97<br/>Button and form's header background color</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Border Color</th>
					<td><input type="color" name="border_color" value="<?php echo get_option('border_color'); ?>" /></td>
					<td class="help-box">Default: #276AB2<br/>Form's Border Color</td>
				</tr>
				
				<!--
				<tr valign="top" >
					<th scope="row">Contact Form 7 Shortcode</th>
					<td><input type="text" name="cf7_shortcode" value="<?php echo get_option('cf7_shortcode'); ?>" /></td>
					<td class="help-box"> class="help-box">>Default: [contact-form-7 id="142" title="Contact Page Form"]</td>
				</tr>
				-->
				
				<tr valign="top">
					<th scope="row">Contact Form 7 ID</th>
					<td><input type="text" name="cf7_id" value="<?php echo get_option('cf7_id'); ?>" /></td>
					<td class="help-box">Fill in numeric id of the form, default: 1<br/>Id of the "Contact Form 7" form.</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Contact Form 7 Title</th>
					<td><input type="text" name="cf7_title" value="<?php echo get_option('cf7_title'); ?>" /></td>
					<td class="help-box"><span style="font-weight:bold;">Optional.</strgon> Form title as in CF7 backend, default: Submit Paper Form</td>
				</tr>

				<tr valign="top">
					<th scope="row">Form Title</th>
					<td><input type="text" name="form_title" value="<?php echo get_option('form_title'); ?>" /></td>
					<td class="help-box">Default: Contact Us - We care to help!<br/>Header text of the form</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Form Description</th>
					<td><input type="textarea" name="form_description" value="<?php echo get_option('form_description'); ?>" /></td>
					<td class="help-box">Default: Please fill our short form and one of our friendly team members will call you back.<br/>Change as you need</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Image <?php echo get_option('side_image'); ?></th>
					<td>
						<?php 							
							if( get_option('side_image') == 'have-a-query' )
								$choice = 1; 
							else $choice = 2; 
						?>
						<select name="side_image">
							<option value="have-a-query" <?php if($choice==1) echo 'selected'; ?> >Have a Query?</option>
							<option value="get-a-quote" <?php if($choice==2) echo 'selected'; ?>>Get a Quote</option>
						</select>
					</td>
					<td class="help-box">Default: Have a query Image.</td>
				</tr>

			</table>
			
			<div style="display:block; margin: 15px 0;"></div>
			
			<?php 
				$icons = array( 'fb', 'twitter', 'gplus', 'linkedin', 'rss', 'website' ); ?>
			
			<table class="form-table" style="display:none;">

				<?php 
					foreach( $icons as $icon ) { 
						//echo key( $icon ) ); 
						switch ( $icon ) {
							case 'fb': $title = 'Facebook'; $default_text = 'Like us on Facebook'; break; 
							case 'twitter': $title = 'Twitter'; $default_text = 'Follow us on Twitter'; break; 
							case 'gplus': $title = 'Google Plus'; $default_text = 'Connect on Gplus'; break; 
							case 'linkedin': $title = 'LinkedIn'; $default_text = 'Know us on LinkedIn'; break; 
							case 'rss': $title = 'RSS'; $default_text = 'Subscribe to RSS'; break; 
							case 'website': $title = 'Website URL'; $default_text = 'Web Presence'; break; 
						}
				?>
						<tr valign="top">
							<th scope="row"><?php echo $title; ?></th>
							<td>
								<input type="text" name="<?php echo $icon. '_url'; ?>" value="<?php echo get_option( $icon. '_url'); ?>" />
								<br/><span class="default-text">URL with http://</span>
							</td>
							<td>
								<input type="text" name="<?php echo $icon. '_alt'; ?>" value="<?php echo get_option( $icon. '_alt'); ?>" />
								<br/><span class="default-text">Alt Text, Default: <?php echo $default_text; ?></span>
							</td>
						</tr>
				<?php } ?>

			</table>

			<?php submit_button(); ?>
			
			<br/><br/>
			<div class="notice-bottom">
				We are continuously trying to enhance our plugin with new features. If you need a feature, modfication or if you found a bug, 
				just shoot a message at my <strong>Skype: ak.singla47</strong>
			</div>

		</form>

	</div> 
</div> 