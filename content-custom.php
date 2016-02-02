<?php
/**
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<?php
    $post_contact = get_post( get_the_ID() );
    echo "       <h1>" . $post_contact->post_title. "</h1>";
    echo "       <p>" .  $post_contact->post_content. "</p>";
?>

