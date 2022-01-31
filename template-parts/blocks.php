<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package young-foundation
 */

?>

<?php

if( have_rows('add_content') ): 
    while( have_rows('add_content') ): the_row(); ?>

        <?php if( get_row_layout() == 'section_intro' ): ?>
            
            <?php get_template_part( 'template-parts/block-section-intro', '' ); ?>

        <?php elseif( get_row_layout() == 'copy_media' ): ?>
            
            <?php get_template_part( 'template-parts/block-copy-media', '' ); ?>

        <?php elseif( get_row_layout() == 'copy_supporting' ): ?>
            
            <?php get_template_part( 'template-parts/block-copy-supporting', '' ); ?>

        <?php elseif( get_row_layout() == 'rich_content' ): ?>
            
            <?php get_template_part( 'template-parts/block-rich-content', '' ); ?>

        <?php elseif( get_row_layout() == 'standalone_media' ): ?>
            
            <?php get_template_part( 'template-parts/block-standalone-media', '' ); ?>

        <?php elseif( get_row_layout() == 'quote' ): ?>
            
            <?php get_template_part( 'template-parts/block-quote', '' ); ?>

        <?php elseif( get_row_layout() == 'highlight_banner' ): ?>
            
            <?php get_template_part( 'template-parts/block-highlight-banner', '' ); ?>

        <?php elseif( get_row_layout() == 'highlight_content' ): ?>
            
            <?php get_template_part( 'template-parts/block-highlight-content', '' ); ?>

        <?php elseif( get_row_layout() == 'add_contact' ): ?>
            
            <?php get_template_part( 'template-parts/block-add-contact', '' ); ?>

        <?php elseif( get_row_layout() == 'content_list' ): ?>
            
            <?php get_template_part( 'template-parts/block-content-list', '' ); ?>

        <?php elseif( get_row_layout() == 'latest_content_list' ): ?>
            
            <?php get_template_part( 'template-parts/block-latest-content-list', '' ); ?>

        <?php elseif( get_row_layout() == 'logo_list' ): ?>
            
            <?php get_template_part( 'template-parts/block-logo-list', '' ); ?>

        <?php elseif( get_row_layout() == 'code_snippet' ): ?>
            
            <?php get_template_part( 'template-parts/block-code', '' ); ?>

        <?php elseif( get_row_layout() == 'shortcode' ): ?>
            
            <?php get_template_part( 'template-parts/block-shortcode', '' ); ?>

        <?php elseif( get_row_layout() == 'newsletter' ): ?>
            
            <?php get_template_part( 'template-parts/block-newsletter', '' ); ?>

        <?php endif; 
    endwhile; 
endif; 

?>
