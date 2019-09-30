<?php

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="sidebar col-lg-4" itemscope itemtype="http://schema.org/WPSideBar">

    <?php do_action( 'root_sidebar_before_widgets' ); ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

    <?php do_action( 'root_sidebar_after_widgets' ); ?>

</aside>
