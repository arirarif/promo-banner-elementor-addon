<?php
/**
 * Promotional Banner Widget
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Promo_Banner_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'promotional-banner';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return esc_html__('Promotional Banner', 'promo-banner-elementor');
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-banner';
    }

    /**
     * Get widget categories.
     */
    public function get_categories() {
        return ['basic'];
    }

    /**
     * Get widget keywords.
     */
    public function get_keywords() {
        return ['promotional', 'banner', 'cta', 'call to action', 'promo'];
    }

    /**
     * Register widget controls.
     */
    protected function _register_controls() {
        
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'promo-banner-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Left Image
        $this->add_control(
            'banner_image',
            [
                'label' => esc_html__('Banner Image', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // Heading
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('55 ETSY VIDEO TEMPLATES', 'promo-banner-elementor'),
                'placeholder' => esc_html__('Type your heading here', 'promo-banner-elementor'),
            ]
        );

        // Description
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('A vault of 55 editable video templates, perfectly designed for Etsy listings.', 'promo-banner-elementor'),
                'placeholder' => esc_html__('Type your description here', 'promo-banner-elementor'),
            ]
        );

        // Button Text
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Grab it now!', 'promo-banner-elementor'),
                'placeholder' => esc_html__('Click here', 'promo-banner-elementor'),
            ]
        );

        // Button Link
        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'promo-banner-elementor'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Container
        $this->start_controls_section(
            'container_style_section',
            [
                'label' => esc_html__('Container', 'promo-banner-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'container_background_color',
            [
                'label' => esc_html__('Background Color', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-container' => 'background-color: {{VALUE}}',
                ],
                'default' => '#ffffff',
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label' => esc_html__('Padding', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'container_border',
                'label' => esc_html__('Border', 'promo-banner-elementor'),
                'selector' => '{{WRAPPER}} .promo-banner-container',
            ]
        );

        $this->add_responsive_control(
            'container_border_radius',
            [
                'label' => esc_html__('Border Radius', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Heading
        $this->start_controls_section(
            'heading_style_section',
            [
                'label' => esc_html__('Heading', 'promo-banner-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Color', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-heading' => 'color: {{VALUE}}',
                ],
                'default' => '#8B4CB8',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => esc_html__('Typography', 'promo-banner-elementor'),
                'selector' => '{{WRAPPER}} .promo-banner-heading',
            ]
        );

        $this->add_responsive_control(
            'heading_margin',
            [
                'label' => esc_html__('Margin', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '15',
                    'left' => '0',
                    'unit' => 'px',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Description
        $this->start_controls_section(
            'description_style_section',
            [
                'label' => esc_html__('Description', 'promo-banner-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Color', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-description' => 'color: {{VALUE}}',
                ],
                'default' => '#333333',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Typography', 'promo-banner-elementor'),
                'selector' => '{{WRAPPER}} .promo-banner-description',
            ]
        );

        $this->add_responsive_control(
            'description_margin',
            [
                'label' => esc_html__('Margin', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '20',
                    'left' => '0',
                    'unit' => 'px',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section - Button
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => esc_html__('Button', 'promo-banner-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-button' => 'background-color: {{VALUE}}',
                ],
                'default' => '#8B4CB8',
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-button' => 'color: {{VALUE}}',
                ],
                'default' => '#ffffff',
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__('Hover Background Color', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-button:hover' => 'background-color: {{VALUE}}',
                ],
                'default' => '#7A3FA0',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => esc_html__('Typography', 'promo-banner-elementor'),
                'selector' => '{{WRAPPER}} .promo-banner-button',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '15',
                    'right' => '30',
                    'bottom' => '15',
                    'left' => '30',
                    'unit' => 'px',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'promo-banner-elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .promo-banner-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '5',
                    'right' => '5',
                    'bottom' => '5',
                    'left' => '5',
                    'unit' => 'px',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $this->add_inline_editing_attributes('heading', 'none');
        $this->add_inline_editing_attributes('description', 'basic');
        $this->add_inline_editing_attributes('button_text', 'none');
        
        if (!empty($settings['button_link']['url'])) {
            $this->add_link_attributes('button_link', $settings['button_link']);
        }
        ?>
        
        <div class="promo-banner-container">
            <div class="promo-banner-wrapper">
                <div class="promo-banner-image">
                    <?php if (!empty($settings['banner_image']['url'])) : ?>
                        <img src="<?php echo esc_url($settings['banner_image']['url']); ?>" alt="<?php echo esc_attr($settings['heading']); ?>">
                    <?php endif; ?>
                </div>
                <div class="promo-banner-content">
                    <?php if (!empty($settings['heading'])) : ?>
                        <h2 class="promo-banner-heading" <?php $this->print_render_attribute_string('heading'); ?>>
                            <?php echo esc_html($settings['heading']); ?>
                        </h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['description'])) : ?>
                        <div class="promo-banner-description" <?php $this->print_render_attribute_string('description'); ?>>
                            <?php echo wp_kses_post($settings['description']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($settings['button_text'])) : ?>
                        <div class="promo-banner-button-wrapper">
                            <a class="promo-banner-button" <?php $this->print_render_attribute_string('button_link'); ?>>
                                <span <?php $this->print_render_attribute_string('button_text'); ?>>
                                    <?php echo esc_html($settings['button_text']); ?>
                                </span>
                                <svg class="promo-banner-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8.5 3L13.5 8L8.5 13M13 8H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <?php
    }

    /**
     * Render widget output in the editor.
     */
    protected function content_template() {
        ?>
        <#
        view.addInlineEditingAttributes( 'heading', 'none' );
        view.addInlineEditingAttributes( 'description', 'basic' );
        view.addInlineEditingAttributes( 'button_text', 'none' );
        #>
        
        <div class="promo-banner-container">
            <div class="promo-banner-wrapper">
                <div class="promo-banner-image">
                    <# if ( settings.banner_image.url ) { #>
                        <img src="{{ settings.banner_image.url }}" alt="{{ settings.heading }}">
                    <# } #>
                </div>
                <div class="promo-banner-content">
                    <# if ( settings.heading ) { #>
                        <h2 class="promo-banner-heading" {{{ view.getRenderAttributeString( 'heading' ) }}}>
                            {{{ settings.heading }}}
                        </h2>
                    <# } #>
                    
                    <# if ( settings.description ) { #>
                        <div class="promo-banner-description" {{{ view.getRenderAttributeString( 'description' ) }}}>
                            {{{ settings.description }}}
                        </div>
                    <# } #>
                    
                    <# if ( settings.button_text ) { #>
                        <div class="promo-banner-button-wrapper">
                            <a class="promo-banner-button" href="{{ settings.button_link.url }}">
                                <span {{{ view.getRenderAttributeString( 'button_text' ) }}}>
                                    {{{ settings.button_text }}}
                                </span>
                                <svg class="promo-banner-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8.5 3L13.5 8L8.5 13M13 8H3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    <# } #>
                </div>
            </div>
        </div>
        
        <?php
    }
}
