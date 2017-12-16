<?php 
	get_header(); 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<section class="container">
	<div class="content-wrap">
	<div class="content">
		<?php 
			if( $paged==1 && _hui('focusslide_s') ){ 
				_moloader('mo_slider', false);
				mo_slider('focusslide');
			} 
		?>
		<?php 
			$pagedtext = ''; 
			if( $paged > 1 ){
				$pagedtext = ' <small>第'.$paged.'页</small>';
			}
		?>
		<?php  
			if( _hui('minicat_home_s') ){
				_moloader('mo_minicat');
			}
		?>
		<?php _the_ads($name='ads_index_01', $class='asb-index asb-index-01') ?>
		<div class="title">
			<h3>
				<?php echo _hui('index_list_title') ? _hui('index_list_title') : '最新发布' ?>
				<?php echo $pagedtext ?>
			</h3>
		</div>
		<div class="container">
			<div>
				<div class="tabs tabs-style-linebox">
					<?php 
						if( _hui('index_list_title_r') ){
							echo '<nav><ul>'._hui('index_list_title_r').'</ul></nav>';
						} 
					?>
						<div class="content-wrap">
								<section id="section-linebox-1"><?php get_template_part( 'text-list' ); ?></section>
								<section id="section-linebox-2"><?php get_template_part( 'image-list' ); ?></section>
								<section id="section-linebox-3"><?php get_template_part( 'audio-list' ); ?></section>
								<section id="section-linebox-4"><?php get_template_part( 'video-list' ); ?></section>
						</div><!-- /content -->
				</div><!-- /tabs -->
			</div>
		</div><!-- /container -->
		<script src="<?php echo get_stylesheet_directory_uri() ?>/js/cbpFWTabs.js"></script>
		<script>
			(function() {

				[].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
					new CBPFWTabs( el );
				});

			})();
		</script>
		<?php _the_ads($name='ads_index_02', $class='asb-index asb-index-02') ?>
	</div>
	</div>
	<?php get_sidebar(); ?>
</section>
<?php get_footer();