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
get_template_part( 'templates/header' );
?>






<div id="frontpage" class="wrap" role="document">
	<section class="section">
		<div class="container">
			<div class="content row">
				<main class="main" role="main">
					<h1>COUPON CATAPULT</h1>
					<h2>the simple way to create & manage your companies coupon offerings!</h2>
					<h3>WE make sure they make their way to your customers!</h3>
					<br>
					<br>
					<h4>FIND OUT HOW</h4>
					<a href="#pane2"><i class="fa fa-5x fa-angle-double-down"></i></a>
				</main>
				<!-- /.main -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.container -->
	</section>


	<section class="section">
		<div class="container">
			<div class="content row">
				<main class="main" role="main">
					<p class="step-circle">1</p>
				</main>
				<!-- /.main -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.container -->
	</section>



	<section class="section">
		<div class="container">
			<div class="content row">
				<main class="main" role="main">
					<p class="step-circle">2</p>
				</main>
				<!-- /.main -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.container -->
	</section>

</div>
<!-- /.wrap -->




<?php
do_action( 'get_footer' );
get_template_part( 'templates/footer' );
wp_footer();
?>
</body>
</html>
