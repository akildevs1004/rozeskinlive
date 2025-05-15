<?php 
	get_header(); 
	$aenyo_settings = aenyo_global_settings();
?>
<div class="page-404">
	<div class="content-page-404">
		<div class="title-error">
			<?php if(isset($aenyo_settings["title-error"]) && $aenyo_settings["title-error"]){
				echo esc_html($aenyo_settings["title-error"]);
			}else{
				echo esc_html__("404", "aenyo");
			}?>
		</div>
		<div class="sub-title">
			<?php if(isset($aenyo_settings["sub-title"]) && $aenyo_settings["sub-title"]){
				echo esc_html($aenyo_settings["sub-title"]);
			}else{
				echo esc_html__("Oops! That page can't be found.", "aenyo");
			}?>
		</div>
		<div class="sub-error">
			<?php if(isset($aenyo_settings["sub-error"]) && $aenyo_settings["sub-error"]){
				echo esc_html($aenyo_settings["sub-error"]);
			}else{
				echo esc_html__("We're really sorry but we can't seem to find the page you were looking for.", "aenyo");
			}?>
		</div>
		<a class="btn" href="<?php echo esc_url( home_url('/') ); ?>">
			<?php if(isset($aenyo_settings["btn-error"]) && $aenyo_settings["btn-error"]){
				echo esc_html($aenyo_settings["btn-error"]);}
			else{
				echo esc_html__("Back The Homepage", "aenyo");
			}?>
		</a>
	</div>
</div>
<?php
get_footer();