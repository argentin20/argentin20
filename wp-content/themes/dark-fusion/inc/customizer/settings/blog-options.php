<?php
/**
 * Blog Options Customizer
 *
 * @package Dark Fusion Theme
*/

function dark_fusion_blog_customizer ( $wp_customize ) {

	$wp_customize->add_panel('dark_fusion_theme_panel',
        array(
            'priority' 		=> 2,
            'capability' 	=> 'edit_theme_options',
            'title' 		=> esc_html__('Blog Options', 'dark-fusion' )
        )
    );

	$wp_customize->add_section('dark_fusion_blog_section', 
		array(
			'title' 	=> esc_html__('Blog Page' , 'dark-fusion' ),
			'panel' 	=> 'dark_fusion_theme_panel',
			'priority' 	=> 1
		)
	);


	/* ====================
	* Blog Page
	==================== */
	$wp_customize->add_setting('blog_page_title_option', 
		array(
			'default' 			=> esc_html__('Home','dark-fusion' ),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'dark_fusion_sanitize_text'
		)
	);
	$wp_customize->add_control( 'blog_page_title_option',
		array(
			'label'		=> esc_html__('Main Title','dark-fusion' ),
			'section'	=> 'dark_fusion_blog_section',
			'type' 		=> 'text',
			'priority' 	=> 1
		)
	);


	/* ====================
	* Blog Content 
	==================== */
	$wp_customize->add_setting('dark_fusion_blog_content', 
		array(
			'default' 			=> esc_html__('excerpt','dark-fusion' ),
			'sanitize_callback' => 'dark_fusion_sanitize_select'
		)
	);

	$wp_customize->add_control('dark_fusion_blog_content', 
		array(		
			'label' 	=> esc_html__('Choose Options', 'dark-fusion' ),		
			'section' 	=> 'dark_fusion_blog_section',
			'type' 		=> 'radio',
			'priority' 	=> 2,
			'choices' 	=>  
			array(
				'excerpt' 	=> esc_html__('Excerpt', 'dark-fusion' ),
				'content' 	=> esc_html__('Full Content', 'dark-fusion' )
			)
		)
	);


	/* ====================
	* Blog Length 
	==================== */
	$wp_customize->add_setting( 'dark_fusion_blog_content_length',
		array(
			'default'           => 30,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'dark_fusion_sanitize_number_range'
		)
	);
	$wp_customize->add_control( 'dark_fusion_blog_content_length',
		array(
			'label'       	=> esc_html__( 'Excerpt Length', 'dark-fusion'  ),
			'section'     	=> 'dark_fusion_blog_section',
			'type'        	=> 'number',
			'priority'		=> 3,
			'input_attrs' 	=> 
			array( 
				'min' => 10, 
				'max' => 200, 
				'step' => 1, 
				'style' => 'width: 200px;' 
			)
		)
	);


	/* ====================
    * Blog Post Order 
    ==================== */
    $default = array( 'blog_meta', 'blog_title','blog_content');
    $choices = array(       
        'blog_meta'   => esc_html__( 'Meta', 'dark-fusion'  ),
        'blog_title'  => esc_html__( 'Title', 'dark-fusion'  ),
        'blog_content'=> esc_html__( 'Content', 'dark-fusion'  ),
    );

    $wp_customize->add_setting( 'dark_fusion_blog_post_order', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_array',
            'default'           => $default
        ) 
    );

    $wp_customize->add_control( new Dark_Fusion_Control_Sortable( $wp_customize, 'dark_fusion_blog_post_order', 
        array(
            'label'     => esc_html__( 'Blog Post Order', 'dark-fusion'  ),
            'description' => esc_html__( 'Drag And Drop To Rearrange', 'dark-fusion'  ),
            'section'   => 'dark_fusion_blog_section',
            'setting'   => 'dark_fusion_blog_post_order',
            'priority'  => 10,
            'type'      => 'sortable',
            'choices'   => $choices
        ) 
    ));

	/* ====================
	* Blog Meta Rearrange
	==================== */

	$default = array( 'blog_date','blog_author','blog_category');

	$choices = array(
        'blog_date' 		=> esc_html__( 'Date', 'dark-fusion'  ),
        'blog_author' 		=> esc_html__( 'Author', 'dark-fusion'  ),
        'blog_category' 	=> esc_html__( 'Category', 'dark-fusion'  )    
    );
    
	$wp_customize->add_setting( 'dark_fusion_blog_meta_sort', 
	    array(
	        'capability'  		=> 'edit_theme_options',
	        'sanitize_callback' => 'dark_fusion_sanitize_array',
	        'default'     		=> $default
	    ) 
	);

	$wp_customize->add_control( new Dark_Fusion_Control_Sortable( $wp_customize, 'dark_fusion_blog_meta_sort', 
	    array(
	        'label' 	=> esc_html__( 'Drag And Drop To Rearrange', 'dark-fusion'  ),
	        'section' 	=> 'dark_fusion_blog_section',
	        'setting' 	=> 'dark_fusion_blog_meta_sort',
	        'priority'	=> 10,
	        'type'		=> 'sortable',
	        'choices'   => $choices
    	) 
	));


	$wp_customize->add_setting('dark_fusion_enable_post_read_more',
        array(
            'default'           => true,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control($wp_customize, 'dark_fusion_enable_post_read_more',
        array(
            'label'     => esc_html__('Hide/Show Read More', 'dark-fusion' ),
            'type'      => 'toggle',
            'section'   => 'dark_fusion_blog_section',
            'priority'  => 11
        )
    ));
    $wp_customize->add_setting('dark_fusion_enable_post_comment',
        array(
            'default'           => true,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control($wp_customize, 'dark_fusion_enable_post_comment',
        array(
            'label'     => esc_html__('Hide/Show Comments', 'dark-fusion' ),
            'type'      => 'toggle',
            'section'   => 'dark_fusion_blog_section',
            'priority'  => 11
        )
    ));
    
}
add_action( 'customize_register', 'dark_fusion_blog_customizer' );