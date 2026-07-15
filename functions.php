<?php
/**
 * Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// 1. Theme Setup
function meetnamanh_theme_setup() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'meetnamanh-top' ),
        'social'  => esc_html__( 'Social Menu', 'meetnamanh-top' ),
    ) );
}
add_action( 'after_setup_theme', 'meetnamanh_theme_setup' );

// 2. Enqueue Styles & Scripts
function meetnamanh_scripts_styles() {
    wp_enqueue_style( 'meetnamanh-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_style( 'framer-compiled-css', get_template_directory_uri() . '/assets/css/framer-compiled.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'meetnamanh_scripts_styles' );

// 3. Register Flat ACF Fields (Static fields mapping 1-to-1)
if ( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'group_theme_homepage',
        'title' => 'Homepage Options (Flat Mode)',
        'fields' => array(
            
            // Tab 1: Hero & Background
            array(
                'key' => 'field_tab_hero',
                'label' => 'Hero & Background',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_hero_headline_first',
                'label' => 'Hero Headline First Line',
                'name' => 'hero_headline_first',
                'type' => 'text',
                'default_value' => 'Chimdi',
            ),
            array(
                'key' => 'field_hero_headline_second',
                'label' => 'Hero Headline Second Line',
                'name' => 'hero_headline_second',
                'type' => 'text',
                'default_value' => 'Chimereze',
            ),
            array(
                'key' => 'field_bg_video',
                'label' => 'Background Video URL (MP4)',
                'name' => 'bg_video',
                'type' => 'text',
                'instructions' => 'Paste URL or path to background video file',
            ),
            
            // Tab 2: Work 1 (Edlyft)
            array(
                'key' => 'field_tab_work_1',
                'label' => 'Featured Work 1',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_work_1_title',
                'label' => 'Work 1 Title',
                'name' => 'work_1_title',
                'type' => 'text',
                'default_value' => 'Edlyft',
            ),
            array(
                'key' => 'field_work_1_domain',
                'label' => 'Work 1 Domain (e.g. edlyft.com)',
                'name' => 'work_1_domain',
                'type' => 'text',
                'default_value' => 'edlyft.com',
            ),
            array(
                'key' => 'field_work_1_tag',
                'label' => 'Work 1 Tag / Year',
                'name' => 'work_1_tag',
                'type' => 'text',
                'default_value' => 'Edlyft . 2022',
            ),
            array(
                'key' => 'field_work_1_desc',
                'label' => 'Work 1 Description',
                'name' => 'work_1_desc',
                'type' => 'textarea',
                'default_value' => 'Edlyft helps CS students in the US learn in a personalized way through classes, activities & community. Edlyft recently sold to Google.',
            ),
            array(
                'key' => 'field_work_1_image',
                'label' => 'Work 1 Cover Image',
                'name' => 'work_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_work_1_logo',
                'label' => 'Work 1 Logo Image',
                'name' => 'work_1_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_work_1_scroll_text',
                'label' => 'Work 1 Circular Scroll Text',
                'name' => 'work_1_scroll_text',
                'type' => 'text',
                'default_value' => '& E D L Y F T & E D L Y F T & E D L Y F T',
            ),
            array(
                'key' => 'field_work_1_link',
                'label' => 'Work 1 Link URL',
                'name' => 'work_1_link',
                'type' => 'url',
            ),

            // Tab 3: Work 2 (CakeDefi)
            array(
                'key' => 'field_tab_work_2',
                'label' => 'Featured Work 2',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_work_2_title',
                'label' => 'Work 2 Title',
                'name' => 'work_2_title',
                'type' => 'text',
                'default_value' => 'CakeDefi',
            ),
            array(
                'key' => 'field_work_2_domain',
                'label' => 'Work 2 Domain (e.g. bake.io)',
                'name' => 'work_2_domain',
                'type' => 'text',
                'default_value' => 'bake.io',
            ),
            array(
                'key' => 'field_work_2_tag',
                'label' => 'Work 2 Tag / Year',
                'name' => 'work_2_tag',
                'type' => 'text',
                'default_value' => 'CakeDefi (Bake) . 2022',
            ),
            array(
                'key' => 'field_work_2_desc',
                'label' => 'Work 2 Description',
                'name' => 'work_2_desc',
                'type' => 'textarea',
                'default_value' => 'I led visual design at CakeDefi, which signficantly boosted marketing efforts and helped the company grow to a $1B+ valuation at its peak.',
            ),
            array(
                'key' => 'field_work_2_image',
                'label' => 'Work 2 Cover Image',
                'name' => 'work_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_work_2_logo',
                'label' => 'Work 2 Logo Image',
                'name' => 'work_2_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_work_2_scroll_text',
                'label' => 'Work 2 Circular Scroll Text',
                'name' => 'work_2_scroll_text',
                'type' => 'text',
                'default_value' => '& CAKE DEFI & CAKE DEFI',
            ),
            array(
                'key' => 'field_work_2_link',
                'label' => 'Work 2 Link URL',
                'name' => 'work_2_link',
                'type' => 'url',
            ),

            // Tab 4: Work 3 (AR Initiative)
            array(
                'key' => 'field_tab_work_3',
                'label' => 'Featured Work 3',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_work_3_title',
                'label' => 'Work 3 Title',
                'name' => 'work_3_title',
                'type' => 'text',
                'default_value' => 'AR Initiative',
            ),
            array(
                'key' => 'field_work_3_domain',
                'label' => 'Work 3 Domain (e.g. arinitiative.org)',
                'name' => 'work_3_domain',
                'type' => 'text',
                'default_value' => 'arinitiative.org',
            ),
            array(
                'key' => 'field_work_3_tag',
                'label' => 'Work 3 Tag / Year',
                'name' => 'work_3_tag',
                'type' => 'text',
                'default_value' => 'AR Initiative . 2024',
            ),
            array(
                'key' => 'field_work_3_desc',
                'label' => 'Work 3 Description',
                'name' => 'work_3_desc',
                'type' => 'textarea',
                'default_value' => 'My team at DDUC Design Studio rebuilt the AR Initiative website to align with their brand position and better showcase their work.',
            ),
            array(
                'key' => 'field_work_3_image',
                'label' => 'Work 3 Cover Image',
                'name' => 'work_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_work_3_logo',
                'label' => 'Work 3 Logo Image',
                'name' => 'work_3_logo',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_work_3_scroll_text',
                'label' => 'Work 3 Circular Scroll Text',
                'name' => 'work_3_scroll_text',
                'type' => 'text',
                'default_value' => '& AR INITIATIVE & AR INITIATIVE',
            ),
            array(
                'key' => 'field_work_3_link',
                'label' => 'Work 3 Link URL',
                'name' => 'work_3_link',
                'type' => 'url',
            ),

            // Tab 5: Figma mockups
            array(
                'key' => 'field_tab_figma',
                'label' => 'Figma Freebies',
                'type' => 'tab',
            ),
            // Figma 1
            array(
                'key' => 'field_figma_1_title',
                'label' => 'Figma 1 Title',
                'name' => 'figma_1_title',
                'type' => 'text',
                'default_value' => 'iPhone 12 Mockup',
            ),
            array(
                'key' => 'field_figma_1_tag',
                'label' => 'Figma 1 Badge / Users (e.g. 6.2k users)',
                'name' => 'figma_1_tag',
                'type' => 'text',
                'default_value' => '6.2k users',
            ),
            array(
                'key' => 'field_figma_1_image',
                'label' => 'Figma 1 Image',
                'name' => 'figma_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_figma_1_link',
                'label' => 'Figma 1 Link URL',
                'name' => 'figma_1_link',
                'type' => 'url',
            ),
            // Figma 2
            array(
                'key' => 'field_figma_2_title',
                'label' => 'Figma 2 Title',
                'name' => 'figma_2_title',
                'type' => 'text',
                'default_value' => 'iPhone 13 Mockup',
            ),
            array(
                'key' => 'field_figma_2_tag',
                'label' => 'Figma 2 Badge / Users',
                'name' => 'figma_2_tag',
                'type' => 'text',
                'default_value' => '13k users',
            ),
            array(
                'key' => 'field_figma_2_image',
                'label' => 'Figma 2 Image',
                'name' => 'figma_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_figma_2_link',
                'label' => 'Figma 2 Link URL',
                'name' => 'figma_2_link',
                'type' => 'url',
            ),
            // Figma 3
            array(
                'key' => 'field_figma_3_title',
                'label' => 'Figma 3 Title',
                'name' => 'figma_3_title',
                'type' => 'text',
                'default_value' => 'iPhone 15 Mockup',
            ),
            array(
                'key' => 'field_figma_3_tag',
                'label' => 'Figma 3 Badge / Users',
                'name' => 'figma_3_tag',
                'type' => 'text',
                'default_value' => '326 users',
            ),
            array(
                'key' => 'field_figma_3_image',
                'label' => 'Figma 3 Image',
                'name' => 'figma_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_figma_3_link',
                'label' => 'Figma 3 Link URL',
                'name' => 'figma_3_link',
                'type' => 'url',
            ),

            // Tab 6: Fun Section
            array(
                'key' => 'field_tab_fun',
                'label' => 'Fun Section',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_fun_text',
                'label' => 'Fun description text',
                'name' => 'fun_text',
                'type' => 'textarea',
                'default_value' => 'I like to unwind by watching something good on Netflix with my family – if we ever actually get past searching for what to watch.',
            ),
            array(
                'key' => 'field_fun_image_filled',
                'label' => 'Fun Image Filled',
                'name' => 'fun_image_filled',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_fun_image_outline',
                'label' => 'Fun Image Outline',
                'name' => 'fun_image_outline',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // Tab 7: Contact & Footer
            array(
                'key' => 'field_tab_contact',
                'label' => 'Contact & Footer',
                'type' => 'tab',
            ),
            array(
                'key' => 'field_contact_email',
                'label' => 'Hire Me / Contact Email',
                'name' => 'contact_email',
                'type' => 'text',
                'default_value' => 'design@chimdi.co',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'templates/template-home.php',
                ),
            ),
        ),
    ));
}
