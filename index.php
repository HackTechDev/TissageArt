<?php
/**
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); 

?>

<div class="outer">
	<div class="middle">
		<div class="inner" style="">
			<div class="heading">
				<img src="/wp-content/themes/tissageart/images/fiber.png" id="fiber" style="display:none; margin-top: 28px; margin-left: 48px;" />
				<img src="/wp-content/themes/tissageart/images/logo.png" id="logo" style="display:none;"/>
			</div>

			<div style="clear: both;"></div>

			<div style="height: 1px; margin-top: -48px;">
				<div class="line" style="display: none;"></div>
			</div>

			<div id="dummy"></div>

			<div class="content  scroll-pane" id="href0">
				<!-- CONTENU PAGE ABOUT -->

                <?php
                    //$post_apropos = get_post( 24 );
                    $post_apropos = get_page_by_title( 'A propos' );
                    echo "<h1>" . $post_apropos->post_title. "</h1>";
                    echo "<p>" .  $post_apropos->post_content. "</p>";
                ?>

				<!-- END CONTENU PAGE ABOUT -->
			</div>

			<div class="content scroll-pane" id="href1">
				<!-- CONTENU PAGE CREATIONS -->

                <?php
                    //$post_creations = get_post( 26 );
                    $post_creations = get_page_by_title( 'Les créations' );
                    echo "<h1>" . $post_creations->post_title. "</h1>";
                    echo "<p>" .  $post_creations->post_content. "</p>";
                ?>


				<!-- END CONTENU PAGE CREATIONS -->

				<!-- LISTE CATEGORIES ARTICLE -->
				<ul class="category">
					<li>
                        <a href="#category1">
                            <div class="rect blue1"></div>
                            <p>
                            <a href="#tissageart" id="tissageartLink" ><?php echo get_cat_name( 2 ) ?></a>
                            </p>
                    </li>
					<li>
                        <a href="#category2">
                            <div class="rect blue2"></div>
                            <p>
                            <a href="#linlumiere" id="linlumiereLink" ><?php echo get_cat_name( 3 ) ?></a>
                            </p>
                    </li>
					<li>
                        <a href="#category3">
                            <div class="rect blue3"></div>
                            <p>
                            <a href="#linsculpture" id="linsculptureLink" ><?php echo get_cat_name( 4 ) ?></a>
                            </p>
                    </li>
				</ul>
				<!-- END LISTE CATEGORIES ARTICLE -->


				<!-- ARTICLES de la Categorie: ici je suis encore indécis sur la facon de charger les articles -->
				<!-- vu que la cliente ne va pas avoir 50 articles je pense qu'on peut vraiment TOUT -->
				<!-- précharger, donc avoir exactement ici tous les articles wordpress classés par catégorie -->
				<!-- et les rendre visible/invisible juste avec jQuery en fonction du clic sur le menu juste au dessus -->

				
			</div>

			<div class="content scroll-pane" id="href2" style="text-align: center">
				<!-- CONTENU PAGE CONTACT -->

                <?php
                    //$post_contact = get_post( 29 );
                    $post_contact = get_page_by_title( 'Contactez-moi' );
                    echo "<h1>" . $post_contact->post_title. "</h1>";
                    echo "<p>" .  $post_contact->post_content. "</p>";
                ?>


				<!-- END CONTENU PAGE CONTACT -->
			</div>


            <div class="content scroll-pane " id="tissageart" style="text-align: center">
            <?php
                        query_posts('cat=2');
                        while ( have_posts() ) : the_post();
                            get_template_part( 'content-custom', get_post_format() );
                        endwhile;
                        wp_reset_query();
            ?>
            </div>

            <div class="content scroll-pane " id="linsculpture" style="text-align: center">
            <?php
                        query_posts('cat=4');
                        while ( have_posts() ) : the_post();
                            get_template_part( 'content-custom', get_post_format() );
                        endwhile;
                        wp_reset_query();
            ?>
            </div>

            <div class="content scroll-pane " id="linlumiere" style="text-align: center">
            <?php
                        query_posts('cat=3');
                        while ( have_posts() ) : the_post();
                            get_template_part( 'content-custom', get_post_format() );
                        endwhile;
                        wp_reset_query();
            ?>
            </div>




			<div class="nav">
				<!-- MAIN MENU -->
                <!--
				<ul>
					<li id="idLi0" style="display:none;"><a href="#href0" id="idA0" >A PROPOS</a></li>
					<li id="idLi1" style="display:none;"><a href="#href1" id="idA1" >CREATIONS</a></li>
					<li id="idLi2" style="display:none;" ><a href="#href2" id="idA2" >CONTACT</a></li>
				</ul>
                -->
				<!-- END MAIN MENU -->
			</div>
            <?php 
            $args = array(
                        'items_wrap'      => '<ul>%3$s</ul>',
                        'container' => 'div',
                        'container_class' => 'nav',
                        'walker'             => new Custom_Nav_Menu()
              ); 
            wp_nav_menu($args); 
            ?>

		</div>
	</div>
</div>

<?php
    global $wpdb;
    $count = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish'";
    $numberPage =  $wpdb->get_var($count);

    echo $numberPage;
?>


<script>
var last = "#dummy";

jQuery(document).ready(function($) {
	jQuery(".inner").fadeIn("slow", function() {
		jQuery("#fiber").fadeIn("slow", function() {
			jQuery("#logo").fadeIn("slow", function() {
				jQuery("#idLi2").fadeIn("slow", function() {
					jQuery("#idLi1").fadeIn("slow", function() {
						jQuery("#idLi0").fadeIn("slow", function() {
							jQuery(".line").fadeIn("slow", function() {
							});
						});
					});
				});

			});
		});
	});
});

<?php for($i = 0; $i < $numberPage; $i++) { ?>
jQuery("#idA<?php echo $i; ?>").click(function($) {
	jQuery(last).fadeOut("fast", function() {
		jQuery("#href<?php echo $i; ?>").fadeIn();
		jQuery('.scroll-pane').jScrollPane();
		last = "#href<?php echo $i; ?>";
	});
});

<?php } ?>


jQuery("#tissageartLink").click(function($) {
	jQuery(last).fadeOut("fast", function() {
		jQuery("#tissageart").fadeIn();
        jQuery('.scroll-pane').jScrollPane();
		last= "#tissageart";
	});
});


jQuery("#linlumiereLink").click(function($) {
	jQuery(last).fadeOut("fast", function() {
		jQuery("#linlumiere").fadeIn();
        jQuery('.scroll-pane').jScrollPane();
		last= "#linlumiere";
	});
});

jQuery("#linsculptureLink").click(function($) {
	jQuery(last).fadeOut("fast", function() {
		jQuery("#linsculpture").fadeIn();
        jQuery('.scroll-pane').jScrollPane();
		last= "#linsculpture";
	});
});

</script>
<?php get_footer(); ?>
