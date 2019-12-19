<?php

$is_show_thumb   = 'yes' == root_get_option( 'structure_single_thumb' );
$is_show_date    = 'yes' == root_get_option( 'structure_single_date' );
$is_show_author  = 'yes' == root_get_option( 'structure_single_author' );
?>

<div class="entry-content" itemprop="articleBody">
	<?php

	get_template_part( 'template-parts/card/single/intro' );

	get_template_part( 'template-parts/card/single/chars' );

	get_template_part( 'template-parts/card/single/conditions' );

	get_template_part( 'template-parts/card/single/withdrawdep' );

	get_template_part( 'template-parts/card/single/bonuses' );

	get_template_part( 'template-parts/card/single/advdis' );

	?>

	<div class="card-single-content">
		<?php

		do_action( 'root_single_before_the_content' );
		the_content();
		do_action( 'root_single_after_the_content' );

		?>
	</div>
</div>


<?php echo root_get_option( 'code_after_content' ) ?>

<div class="entry-footer"></div>

<?php if ( ! $is_show_author ) { ?>
	<meta itemprop="author" content="<?php the_author() ?>">
<?php } ?>
<?php if ( ! $is_show_date ) { ?>
	<meta itemprop="datePublished" content="<?php the_time('c') ?>"/>
<?php } ?>
<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" content="<?php the_title(); ?>">
<meta itemprop="dateModified" content="<?php the_modified_time('Y-m-d')?>">
<meta itemprop="datePublished" content="<?php the_time('c') ?>">
<?php echo get_microdata_publisher() ?>
<?php do_action( 'root_content_card_meta' ); ?>