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

// Hide default WordPress editor for the homepage template.


// 3. Register Flat ACF Fields (Static fields mapping 1-to-1)
if ( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'group_theme_homepage',
        'title' => 'Homepage Options (Flat Mode)',
        'fields' => array(
            
            // Tab 1: Intro
            array(
                'key' => 'field_tab_intro',
                'label' => 'Intro',
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
            array(
                'key' => 'field_intro_card_text',
                'label' => 'Intro Card Text',
                'name' => 'intro_card_text',
                'type' => 'textarea',
                'default_value' => 'I convert business visions and customer needs into enjoyable experiences. Welcome to a day in my life.',
            ),
            array(
                'key' => 'field_contact_email',
                'label' => 'Hire Me / Contact Email',
                'name' => 'contact_email',
                'type' => 'text',
                'default_value' => 'chimdi@dducdesign.com',
            ),
            array(
                'key' => 'field_contact_link_url',
                'label' => 'Contact / Book a Call Link URL',
                'name' => 'contact_link_url',
                'type' => 'url',
                'default_value' => 'https://calendly.com/chimdi-dducdesign/30min',
            ),
            array(
                'key' => 'field_contact_link_label',
                'label' => 'Contact Link Label',
                'name' => 'contact_link_label',
                'type' => 'text',
                'default_value' => 'Book a call',
            ),
            array(
                'key' => 'field_intro_routine_text',
                'label' => 'Intro Routine Text',
                'name' => 'intro_routine_text',
                'type' => 'textarea',
                'default_value' => 'I like to start my day with my morning routine and some study or learning',
            ),
            array(
                'key' => 'field_intro_breakfast_text',
                'label' => 'Intro Breakfast Text',
                'name' => 'intro_breakfast_text',
                'type' => 'textarea',
                'default_value' => "Then I have my breakfast which (unapologetically) is usually bread with eggs - the only recipe I've mastered besides cereal.",
            ),
            
            // Tab 2: Work
            array(
                'key' => 'field_tab_work',
                'label' => 'Work',
                'type' => 'tab',
            ),
            // Work 1
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
            // Work 2
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
            // Work 3
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

            // Tab 3: Projects
            array(
                'key' => 'field_tab_projects',
                'label' => 'Projects',
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
            // Figma 4
            array(
                'key' => 'field_figma_4_title',
                'label' => 'Figma 4 Title',
                'name' => 'figma_4_title',
                'type' => 'text',
                'default_value' => 'Galaxy S22 Mockup',
            ),
            array(
                'key' => 'field_figma_4_tag',
                'label' => 'Figma 4 Badge / Users',
                'name' => 'figma_4_tag',
                'type' => 'text',
                'default_value' => '3.3k users',
            ),
            array(
                'key' => 'field_figma_4_image',
                'label' => 'Figma 4 Image',
                'name' => 'figma_4_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_figma_4_link',
                'label' => 'Figma 4 Link URL',
                'name' => 'figma_4_link',
                'type' => 'url',
            ),
            // Figma 5
            array(
                'key' => 'field_figma_5_title',
                'label' => 'Figma 5 Title',
                'name' => 'figma_5_title',
                'type' => 'text',
                'default_value' => 'Trailing cursor prototype',
            ),
            array(
                'key' => 'field_figma_5_tag',
                'label' => 'Figma 5 Badge / Users',
                'name' => 'figma_5_tag',
                'type' => 'text',
                'default_value' => '1.4k users',
            ),
            array(
                'key' => 'field_figma_5_image',
                'label' => 'Figma 5 Image',
                'name' => 'figma_5_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_figma_5_link',
                'label' => 'Figma 5 Link URL',
                'name' => 'figma_5_link',
                'type' => 'url',
            ),
            // Figma Note Card
            array(
                'key' => 'field_figma_note_title',
                'label' => 'Figma Note Title',
                'name' => 'figma_note_title',
                'type' => 'text',
                'default_value' => 'Figma Community Assets',
            ),
            array(
                'key' => 'field_figma_note_desc',
                'label' => 'Figma Note Description',
                'name' => 'figma_note_desc',
                'type' => 'textarea',
                'default_value' => 'My figma community files have helped over 24k people cumulatively.',
            ),
            array(
                'key' => 'field_figma_note_link_label',
                'label' => 'Figma Note Link Label',
                'name' => 'figma_note_link_label',
                'type' => 'text',
                'default_value' => 'Community profile',
            ),
            array(
                'key' => 'field_figma_note_link_url',
                'label' => 'Figma Note Link URL',
                'name' => 'figma_note_link_url',
                'type' => 'url',
                'default_value' => 'https://www.figma.com/@dducdesign',
            ),

            // YouTube Videos
            array(
                'key' => 'field_yt_1_image',
                'label' => 'YouTube 1 Cover Image',
                'name' => 'yt_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_yt_1_video_id',
                'label' => 'YouTube 1 Video ID (e.g. e3h-IkgRYQg)',
                'name' => 'yt_1_video_id',
                'type' => 'text',
                'default_value' => 'e3h-IkgRYQg',
            ),
            array(
                'key' => 'field_yt_2_image',
                'label' => 'YouTube 2 Cover Image',
                'name' => 'yt_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_yt_2_video_id',
                'label' => 'YouTube 2 Video ID',
                'name' => 'yt_2_video_id',
                'type' => 'text',
                'default_value' => 'wFZ6W-63lrQ',
            ),
            array(
                'key' => 'field_yt_3_image',
                'label' => 'YouTube 3 Cover Image',
                'name' => 'yt_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_yt_3_video_id',
                'label' => 'YouTube 3 Video ID',
                'name' => 'yt_3_video_id',
                'type' => 'text',
                'default_value' => '_G2fVlp3FzU',
            ),
            array(
                'key' => 'field_yt_4_image',
                'label' => 'YouTube 4 Cover Image',
                'name' => 'yt_4_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_yt_4_video_id',
                'label' => 'YouTube 4 Video ID',
                'name' => 'yt_4_video_id',
                'type' => 'text',
                'default_value' => 'PqYNq9ZX-Zo',
            ),

            // 3D Work
            array(
                'key' => 'field_td_1_image',
                'label' => '3D Image 1',
                'name' => 'td_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_td_2_image',
                'label' => '3D Image 2',
                'name' => 'td_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_td_3_image',
                'label' => '3D Image 3',
                'name' => 'td_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_td_4_image',
                'label' => '3D Image 4',
                'name' => 'td_4_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_td_note_title',
                'label' => '3D Note Title',
                'name' => 'td_note_title',
                'type' => 'text',
                'default_value' => '3D Assets',
            ),
            array(
                'key' => 'field_td_note_desc',
                'label' => '3D Note Description',
                'name' => 'td_note_desc',
                'type' => 'textarea',
                'default_value' => 'I like to experiment with Spline and Blender to craft unique, interactive 3D assets',
            ),
            array(
                'key' => 'field_td_note_link_label',
                'label' => '3D Note Link Label',
                'name' => 'td_note_link_label',
                'type' => 'text',
                'default_value' => '3D Work',
            ),
            array(
                'key' => 'field_td_note_link_url',
                'label' => '3D Note Link URL',
                'name' => 'td_note_link_url',
                'type' => 'url',
            ),

            // Kompare
            array(
                'key' => 'field_kompare_image',
                'label' => 'Kompare Mockup Image',
                'name' => 'kompare_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_kompare_note_title',
                'label' => 'Kompare Note Title',
                'name' => 'kompare_note_title',
                'type' => 'text',
                'default_value' => 'Kompare',
            ),
            array(
                'key' => 'field_kompare_note_desc',
                'label' => 'Kompare Note Description',
                'name' => 'kompare_note_desc',
                'type' => 'textarea',
                'default_value' => 'I got tired of converting currencies, so I built a Chrome Extension with a friend, to solve this.',
            ),
            array(
                'key' => 'field_kompare_note_link_label',
                'label' => 'Kompare Note Link Label',
                'name' => 'kompare_note_link_label',
                'type' => 'text',
                'default_value' => 'Kompare on Chrome Store',
            ),
            array(
                'key' => 'field_kompare_note_link_url',
                'label' => 'Kompare Note Link URL',
                'name' => 'kompare_note_link_url',
                'type' => 'url',
                'default_value' => 'https://chromewebstore.google.com/detail/kompare/pghheioicappnlibejncaolgjicphhmi?hl=en-GB&utm_source=ext_sidebar',
            ),

            // Archive
            array(
                'key' => 'field_archive_note_title',
                'label' => 'Archive Note Title',
                'name' => 'archive_note_title',
                'type' => 'text',
                'default_value' => 'Archive',
            ),
            array(
                'key' => 'field_archive_note_desc',
                'label' => 'Archive Note Description',
                'name' => 'archive_note_desc',
                'type' => 'textarea',
                'default_value' => 'These are some of my work from way back, and a bit of history as well.',
            ),
            array(
                'key' => 'field_archive_img1',
                'label' => 'Archive Image 1',
                'name' => 'archive_img1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_archive_cap1',
                'label' => 'Archive Caption 1',
                'name' => 'archive_cap1',
                'type' => 'text',
                'default_value' => 'One of my earliest design projects from 2011.',
            ),
            array(
                'key' => 'field_archive_img2',
                'label' => 'Archive Image 2',
                'name' => 'archive_img2',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_archive_cap2',
                'label' => 'Archive Caption 2',
                'name' => 'archive_cap2',
                'type' => 'text',
                'default_value' => 'Me at my first design job in 2011.',
            ),
            array(
                'key' => 'field_archive_img3',
                'label' => 'Archive Image 3',
                'name' => 'archive_img3',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_archive_cap3',
                'label' => 'Archive Caption 3',
                'name' => 'archive_cap3',
                'type' => 'text',
                'default_value' => 'Fine Baby song art, 2012.',
            ),
            array(
                'key' => 'field_archive_img4',
                'label' => 'Archive Image 4',
                'name' => 'archive_img4',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_archive_cap4',
                'label' => 'Archive Caption 4',
                'name' => 'archive_cap4',
                'type' => 'text',
                'default_value' => 'Jasmine Magazine, 2017',
            ),
            array(
                'key' => 'field_archive_img5',
                'label' => 'Archive Image 5',
                'name' => 'archive_img5',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_archive_cap5',
                'label' => 'Archive Caption 5',
                'name' => 'archive_cap5',
                'type' => 'text',
                'default_value' => 'My first low fidelity sketch, done at a UX intro class by Google, 2016',
            ),

            // Tab 4: Fun
            array(
                'key' => 'field_tab_fun',
                'label' => 'Fun',
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
            array(
                'key' => 'field_writings_title',
                'label' => 'Writings Section Title',
                'name' => 'writings_title',
                'type' => 'text',
                'default_value' => 'Stuff I’ve written',
            ),
            array(
                'key' => 'field_writings_count',
                'label' => 'Number of Posts to Display',
                'name' => 'writings_count',
                'type' => 'number',
                'default_value' => 3,
                'min' => 1,
                'max' => 10,
            ),
            array(
                'key' => 'field_thanks_text',
                'label' => 'Thanks Message text',
                'name' => 'thanks_text',
                'type' => 'textarea',
                'default_value' => 'Thanks for hanging with me today. I love meeting people and working on cool projects, so reach out! 👇',
            ),
            array(
                'key' => 'field_book_call_title',
                'label' => 'Book Call Title',
                'name' => 'book_call_title',
                'type' => 'text',
                'default_value' => 'Book call',
            ),
            array(
                'key' => 'field_book_call_sub',
                'label' => 'Book Call Subtitle',
                'name' => 'book_call_sub',
                'type' => 'text',
                'default_value' => 'Via Calendly',
            ),
            array(
                'key' => 'field_book_call_url',
                'label' => 'Book Call URL',
                'name' => 'book_call_url',
                'type' => 'text',
                'default_value' => 'https://calendly.com/chimdi-dducdesign/30min',
            ),
            array(
                'key' => 'field_copy_email_title',
                'label' => 'Copy Email Title',
                'name' => 'copy_email_title',
                'type' => 'text',
                'default_value' => 'Copy email',
            ),
            array(
                'key' => 'field_copy_email_address',
                'label' => 'Copy Email Address',
                'name' => 'copy_email_address',
                'type' => 'text',
                'default_value' => 'chimdi@dducdesign.com',
            ),
            array(
                'key' => 'field_social_youtube',
                'label' => 'YouTube Link',
                'name' => 'social_youtube',
                'type' => 'text',
                'default_value' => 'https://www.youtube.com/@chimdiBAM',
            ),
            array(
                'key' => 'field_social_linkedin',
                'label' => 'LinkedIn Link',
                'name' => 'social_linkedin',
                'type' => 'text',
                'default_value' => 'https://www.linkedin.com/in/chimdindu-chimereze-20670468/',
            ),
            array(
                'key' => 'field_social_twitter',
                'label' => 'Twitter (X) Link',
                'name' => 'social_twitter',
                'type' => 'text',
                'default_value' => 'https://x.com/ChimdiBAM',
            ),
            array(
                'key' => 'field_social_instagram',
                'label' => 'Instagram Link',
                'name' => 'social_instagram',
                'type' => 'text',
                'default_value' => 'https://www.instagram.com/chimdibam/',
            ),
            array(
                'key' => 'field_social_tiktok',
                'label' => 'TikTok Link',
                'name' => 'social_tiktok',
                'type' => 'text',
                'default_value' => 'https://www.tiktok.com/@chimdibam?_t=ZM-8t1caHT83Qz&_r=1',
            ),
            array(
                'key' => 'field_copyright_text',
                'label' => 'Copyright Footer Text',
                'name' => 'copyright_text',
                'type' => 'textarea',
                'default_value' => '© Chimdindu Chimereze, 2025 ✦ Designed and built by DDUC Design Studio ✦ With love from 🇳🇬 ✦ Video credit - Mark Yacoub on Youtube ✦',
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
        'hide_on_screen' => array(
            'the_content',
        ),
    ));
}

/**
 * Helper function to render a work item cover image with support for ACF dynamic URL
 * and fallback to local template-html srcset responsive images.
 */
function get_work_image_html($field_name, $default_image_name, $srcset_images_data, $sizes_original = '600px', $sizes_attr = '') {
    $img_url = get_field($field_name);
    if ($img_url) {
        return '<img decoding="async" src="' . esc_url($img_url) . '" alt="" style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover" data-framer-original-sizes="' . esc_attr($sizes_original) . '">';
    } else {
        $theme_uri = get_template_directory_uri();
        $srcset = array();
        foreach ($srcset_images_data as $size => $img) {
            $srcset[] = $theme_uri . '/template-html/images/' . $img . ' ' . $size;
        }
        $srcset_str = implode(', ', $srcset);
        $src = $theme_uri . '/template-html/images/' . $default_image_name;
        return '<img decoding="async" ' . ($sizes_attr ? 'sizes="' . esc_attr($sizes_attr) . '"' : '') . ' srcset="' . esc_attr($srcset_str) . '" src="' . esc_url($src) . '" alt="" style="display:block;width:100%;height:100%;border-radius:inherit;object-position:center;object-fit:cover" data-framer-original-sizes="' . esc_attr($sizes_original) . '">';
    }
}
