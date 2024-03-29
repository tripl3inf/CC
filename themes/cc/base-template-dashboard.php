<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php get_template_part( 'templates/head' ); ?>
<body <?php body_class(); ?>>

<!--[if lt IE 9]>
<div class="alert alert-warning">
	<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->

<?php
do_action( 'get_header' );
get_template_part( 'templates/ccdash/ccdash-header' );
?>



<div class="wrap" role="document">
	<!--<div id="wrapper">-->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<?php include Wrapper\template_path(); ?>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->



<?php
do_action( 'get_footer' );
get_template_part( 'templates/footer' );
wp_footer();
?>


</body>
</html>
