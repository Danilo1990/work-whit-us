<?php

namespace Elementor;

use Elementor\Controls_Manager;

class Widget_All_Annunci extends \Elementor\Widget_Base {
	
	public function get_name() {
		return 'all_annunci';
	}
	
	public function get_title() {
		return 'The Ads';
	}
	
	public function get_icon() {
		return 'eicon-site-identity';
	}
		
    protected function _register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);	
		
		$this->add_control(
			'stylist',
			[
				'label' => esc_html__( 'Style visual', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'one',
				'options' => [
					'one' => esc_html__( 'One colums', 'textdomain' ),
					'grid'  => esc_html__( 'Grid', 'textdomain' ),
				],
			]
		);

		$this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 4,
				'step' => 1,
				'default' => 2,
				'condition' => [
                    'stylist' => [ 'grid' ],
                ],
			]
		);

        $this->add_control(
			'show_excepert',
			[
				'label' => esc_html__( 'Show ecepert', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'number_characters',
			[
				'label' => esc_html__( 'Number characters', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 100,
				'step' => 1,
				'default' => 20,
                'condition' => [
                    'show_excepert' => [ 'yes' ],
                ],
			]
		);

        $this->add_control(
			'show_place',
			[
				'label' => esc_html__( 'Show place', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'show_contract',
			[
				'label' => esc_html__( 'Show contract', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Button text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read more', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);

		$this->add_control(
			'hide_expire_date',
			[
				'label' => esc_html__( 'Hide expired ads', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'filter_section',
			[
				'label' => esc_html__( 'Filter', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_filter',
			[
				'label' => esc_html__( 'Show filter', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'filter_btn_text',
			[
				'label' => esc_html__( 'Button submit text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Filter', 'textdomain' ),
				'condition' => [
                    'show_filter' => [ 'yes' ],
                ],
			]
		);

		$this->add_control(
			'show_btn_reset',
			[
				'label' => esc_html__( 'Show reset button', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
                    'show_filter' => [ 'yes' ],
                ],
			]
		);

		$this->add_control(
			'filter_btn_reset_text',
			[
				'label' => esc_html__( 'Button reset text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Reset', 'textdomain' ),
				'condition' => [
                    'show_filter' => [ 'yes' ],
                ],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'pagination_section',
			[
				'label' => esc_html__( 'Pagination', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'active_pagination',
			[
				'label' => esc_html__( 'Active pagination', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'textdomain' ),
				'label_off' => esc_html__( 'Hide', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'items_num',
			[
				'label' => esc_html__( 'Number Items display', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 3,
				'max' => 50,
				'step' => 1,
				'default' => 3,
				'condition' => [
                    'active_pagination' => [ 'yes' ],
                ],
			]
		);

		$this->add_control(
			'text_previous',
			[
				'label' => esc_html__( 'Previous text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Previous', 'textdomain' ),
				'condition' => [
                    'active_pagination' => [ 'yes' ],
                ],
			]
		);

		$this->add_control(
			'text_next',
			[
				'label' => esc_html__( 'Next text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Next', 'textdomain' ),
				'condition' => [
                    'active_pagination' => [ 'yes' ],
                ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'filter_style_section',
			[
				'label' => esc_html__( 'Filter', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
                    'show_filter' => [ 'yes' ],
                ],
			]
		);

		$this->add_control(
			'gap_input_filter',
			[
				'label' => esc_html__( 'Gap filter', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .field-filter' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'radius_input',
			[
				'label' => esc_html__( 'Border radius field', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .field-filter input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .field-filter select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .btn-submit-filter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .btn-reset-filter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'filter_submit_options',
			[
				'label' => esc_html__( 'Submit', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_submit_filter_bg_olor',
			[
				'label' => esc_html__( 'Button submit color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-submit-filter' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_submit_filter_text_color',
			[
				'label' => esc_html__( 'Button submit text color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-submit-filter' => 'color: {{VALUE}}',
				],
				
			]
		);

		$this->add_control(
			'filter_reset_options',
			[
				'label' => esc_html__( 'Reset', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btn_reset_filter_bg_olor',
			[
				'label' => esc_html__( 'Button reset color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-reset-filter' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_reset_filter_text_color',
			[
				'label' => esc_html__( 'Button reset text color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-reset-filter' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'distance_filter',
			[
				'label' => esc_html__( 'Filter distance', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .annunci-filter-form' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Item', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'distance_item',
			[
				'label' => esc_html__( 'Row gap', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .annuncio-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'columns_gap',
			[
				'label' => esc_html__( 'Gap columns', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .grid-system' => 'column-gap: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
                    'stylist' => [ 'grid' ],
                ],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_item',
				'selector' => '{{WRAPPER}} .annuncio-item',
			]
		);

		$this->add_responsive_control(
			'radius_item',
			[
				'label' => esc_html__( 'Border radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .annuncio-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding_item',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .annuncio-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_shadow',
				'selector' => '{{WRAPPER}} .annuncio-item',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'text_section',
			[
				'label' => esc_html__( 'Text', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'title_options',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .text-annuncio h2',
			]
		);

        $this->add_control(
			'title_distance',
			[
				'label' => esc_html__( 'Distance', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .text-annuncio h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-annuncio h2' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'excepert_options',
			[
				'label' => esc_html__( 'Excepert', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excepert_typography',
				'selector' => '{{WRAPPER}} .excepert-item',
			]
		);

        $this->add_control(
			'excepert_distance',
			[
				'label' => esc_html__( 'Distance', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .text-annuncio h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'excepert_color',
			[
				'label' => esc_html__( 'Excepert color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .excepert-item' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'aree_options',
			[
				'label' => esc_html__( 'Area', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'aree_typography',
				'selector' => '{{WRAPPER}} .text-annuncio h4',
			]
		);

        $this->add_control(
			'area_color',
			[
				'label' => esc_html__( 'Area color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-annuncio h4' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'meta_section',
			[
				'label' => esc_html__( 'Meta', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'meta_align_text',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .meta-annuncio li' => 'text-align: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .meta-annuncio li',
			]
		);

		$this->add_control(
			'meta_bg_color',
			[
				'label' => esc_html__( 'Meta background color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .meta-annuncio li' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'meta_text_color',
			[
				'label' => esc_html__( 'Meta text color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .meta-annuncio li' => 'color: {{VALUE}}',
				],
				
			]
		);

		$this->add_responsive_control(
			'padding_meta',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .meta-annuncio li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->start_controls_tabs(
            'style_tabs'
        );
        
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'textdomain' ),
            ]
        );
        
        $this->add_control(
			'button_color',
			[
				'label' => esc_html__( 'Buttom color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Buttom text color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();
        
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'textdomain' ),
            ]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' => esc_html__( 'Buttom color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'text_btn_color_hover',
			[
				'label' => esc_html__( 'Buttom text color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio:hover' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_tab();

        $this->end_controls_tabs();
               
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .btn-cta-annuncio',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_btn',
				'selector' => '{{WRAPPER}} .btn-cta-annuncio',
			]
		);

        $this->add_control(
			'border_radius_btn',
			[
				'label' => esc_html__( 'Border radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_align_text_btn',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'padding_btn',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default' => [
					'top' => 10,
					'right' => 10,
					'bottom' => 10,
					'left' => 10,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'distance_btn_grid',
			[
				'label' => esc_html__( 'Button distance', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .btn-cta-annuncio' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'pagination_style_section',
			[
				'label' => esc_html__( 'Pagination', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
                    'active_pagination' => [ 'yes' ],
                ],
			]
		);

		$this->add_responsive_control(
			'pagination_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .pagination' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pag_typography',
				'selector' => '{{WRAPPER}} .pagination',
			]
		);

		$this->add_control(
			'page_color',
			[
				'label' => esc_html__( 'Color text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination .page-numbers' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'page_color_active',
			[
				'label' => esc_html__( 'Text Color active', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pagination .current ' => 'color: {{VALUE}}',
					'{{WRAPPER}} .page-numbers:hover ' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'distance_between_items',
			[
				'label' => esc_html__( 'Distance between items', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .pagination .page-numbers' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'distance_top',
			[
				'label' => esc_html__( 'Distance top element', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .pagination' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'date_section',
			[
				'label' => esc_html__( 'Expire date', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .expire-date',
			]
		);

		$this->add_control(
			'distance_date',
			[
				'label' => esc_html__( 'Distance', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .expire-date' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
    }

	protected function get_terms_array($taxonomy) {
		$terms = get_the_terms(get_the_ID(), $taxonomy);
		if (!empty($terms) && !is_wp_error($terms)) {
			return array_map('esc_html', wp_list_pluck($terms, 'name'));
		}
		return [];
	}

	protected function get_all_luoghi() {
		global $wpdb;
	
		$results = $wpdb->get_col("
			SELECT DISTINCT meta_value 
			FROM $wpdb->postmeta 
			WHERE meta_key = '_annuncio_luogo' 
			AND meta_value != ''
		");
	
		$luoghi = [];
		foreach ($results as $val) {
			$decoded = maybe_unserialize($val);
			if (is_array($decoded)) {
				$luoghi = array_merge($luoghi, $decoded);
			} else {
				$luoghi[] = $decoded;
			}
		}
	
		return array_unique(array_map('trim', $luoghi));
	}


	protected function get_all_contracts() {
		global $wpdb;
	
		$results = $wpdb->get_col("
			SELECT DISTINCT meta_value 
			FROM $wpdb->postmeta 
			WHERE meta_key = '_annuncio_contract' 
			AND meta_value != ''
		");
	
		$contracts = [];
		foreach ($results as $val) {
			$decoded = maybe_unserialize($val);
			if (is_array($decoded)) {
				$contracts = array_merge($contracts, $decoded);
			} else {
				$contracts[] = $decoded;
			}
		}
	
		return array_unique(array_map('trim', $contracts));

	var_dump(array_unique(array_map('trim', $contracts)));exit;
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$paged = 1;
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} elseif (isset($_GET['paged'])) {
			$paged = (int) $_GET['paged'];
		}


		$today = date('Y-m-d');
		$hideExpireDate = $settings['hide_expire_date'];

		$stylist = $settings['stylist'];
		$columns = $settings['columns'];
		$showFilter = $settings['show_filter'];
		$showBtnReset = $settings['show_btn_reset'];
		$showExcepert = $settings['show_excepert'];
		$numberCharacters = $settings['number_characters'];
		$showPlace = $settings['show_place'];
		$showContract = $settings['show_contract'];

		$activePagination = $settings['active_pagination'];
		$itemsNum = $settings['items_num'];
		$textPrevious = $settings['text_previous'];
		$textNext = $settings['text_next'];

		$btnText = $settings['btn_text'];
		$filterBtnText = $settings['filter_btn_text'];
		$filterBtnResetText = $settings['filter_btn_reset_text'];

		$selected_aree = isset($_GET['filter_aree']) ? sanitize_text_field($_GET['filter_aree']) : '';
		$selected_tipologia = isset($_GET['filter_type']) ? sanitize_text_field($_GET['filter_type']) : '';
		$selected_luogo = isset($_GET['filter_place']) ? sanitize_text_field($_GET['filter_place']) : '';
		$selected_contract = isset($_GET['filter_contracts']) ? sanitize_text_field($_GET['filter_contracts']) : '';
		$search_text =  isset($_GET['search_annuncio']) ? sanitize_text_field($_GET['search_annuncio']) : '';


		if($activePagination == 'yes') {
			$itemsNum = $itemsNum;
		} else {
			$itemsNum = -1;
		}		

		$args = array(
			'post_type'      => 'annuncio',
			'paged'          => $paged,
			'posts_per_page' => $itemsNum,
			'post_status'    => 'publish',
		);

		if ($hideExpireDate == 'yes') {
			$args['meta_query'][] = [
				'key'     => '_annuncio_expiry_date',
				'value'   => $today,
				'compare' => '>=',
				'type'    => 'DATE',
			];
		}

		if ($search_text) {
			$args['s'] = $search_text;
		}

		// Filtro Aree
		if ($selected_aree) {
			$args['tax_query'][] = [
				'taxonomy' => 'aree',
				'field'    => 'slug',
				'terms'    => $selected_aree,
			];
		}

		// Filtro Tipologia
		if ($selected_tipologia) {
			$args['tax_query'][] = [
				'taxonomy' => 'tipologia',
				'field'    => 'slug',
				'terms'    => $selected_tipologia,
			];
		}

		// Filtro contratto 
		if ($selected_contract) {
			$args['meta_query'][] = [
				'key'     => '_annuncio_contract',
				'value'   => $selected_contract,
				'compare' => 'LIKE', 
			];
		}

		// Filtro Luogo
		if ($selected_luogo) {
			$args['meta_query'][] = [
				'key'     => '_annuncio_luogo',
				'value'   => $selected_luogo,
				'compare' => 'LIKE', 
			];
		}

		$query = new \WP_Query($args);

		$output = '';

		if ($showFilter === 'yes') {
			$output .= '<form method="GET" class="annunci-filter-form">';

			$output .= '<div class="field-filter">';
		
				// Search
				$search_val = isset($_GET['search_annuncio']) ? esc_attr($_GET['search_annuncio']) : '';
				$output .= '<div class="filter-item">';
					$output .= '<label for="search_annuncio" class="screen-reader-text">'.__('Search...', 'wwu-plugin').'</label>';
					$output .= '<input type="text" id="search_annuncio" name="search_annuncio" placeholder="Search..." value="' . $search_val . '" />';
				$output .= '</div>';
		
				// Select Aree
				$selected_aree = $_GET['filter_aree'] ?? '';
				$output .= '<div class="filter-item">';
					$output .= '<label for="filter_aree" class="screen-reader-text">Seleziona area</label>';
					$output .= '<select name="filter_aree" id="filter_aree">';
					$output .= '<option value="">'.__('All aree', 'wwu-plugin').'</option>';
						foreach (get_terms(['taxonomy' => 'aree', 'hide_empty' => true]) as $term) {
							$selected = selected($selected_aree, $term->slug, false);
							$output .= '<option value="' . esc_attr($term->slug) . '"' . $selected . '>' . esc_html($term->name) . '</option>';
						}
					$output .= '</select>';
				$output .= '</div>';
		

				// Select Contract
				$selected_contract = $_GET['filter_contracts'] ?? '';
				$output .= '<div class="filter-item">';
					$output .= '<label for="filter_contracts" class="screen-reader-text">Seleziona luogo</label>';
					$output .= '<select name="filter_contracts" id="filter_contracts">';
					$output .= '<option value="">'.__('All contracts', 'wwu-plugin').'</option>';
						foreach ($this->get_all_contracts() as $contract_option) {
							$selected = selected($selected_contract, $contract_option, false);
							$output .= '<option value="' . esc_attr($contract_option) . '"' . $selected . '>' . esc_html($contract_option) . '</option>';
						}
					$output .= '</select>';
				$output .= '</div>';
		
				// Select Luogo
				$selected_luogo = $_GET['filter_place'] ?? '';
				$output .= '<div class="filter-item">';
					$output .= '<label for="filter_place" class="screen-reader-text">Seleziona luogo</label>';
					$output .= '<select name="filter_place" id="filter_place">';
						$output .= '<option value="">'.__('All place', 'wwu-plugin').'</option>';
						foreach ($this->get_all_luoghi() as $luogo_option) {
							$selected = selected($selected_luogo, $luogo_option, false);
							$output .= '<option value="' . esc_attr($luogo_option) . '"' . $selected . '>' . esc_html($luogo_option) . '</option>';
						}
					$output .= '</select>';
				$output .= '</div>';
		
				// Bottoni
				$output .= '<div class="filter-buttons">';
					$output .= '<button class="btn-submit-filter" type="submit">' . esc_html($filterBtnText) . '</button>';
					if ($showBtnReset === 'yes') {
						$output .= '<button class="btn-reset-filter" type="button" onclick="window.location.href=\'' . esc_url(get_permalink()) . '\'">' . esc_html($filterBtnResetText) . '</button>';
					}
				$output .= '</div>';
		
			$output .= '</div>';
		
		$output .= '</form>';
		
		}

		$wrapper_classes = ['annunci-wrapper'];
		$wrapper_style = '';

		if ($stylist === 'grid') {
			$wrapper_classes[] = 'grid-system';
			$wrapper_style = 'style="display:grid; grid-template-columns: repeat(' . intval($columns) . ', 1fr);"';
		}

		$output .= '<div ' . $wrapper_style . ' class="' . implode(' ', $wrapper_classes) . '">';

			if ($query->have_posts()) {
				while ($query->have_posts()) {

					$query->the_post();
					$tipologiaArray = $this->get_terms_array('tipologia');
					$areeArray = $this->get_terms_array('aree');

					$salary = get_post_meta(get_the_ID(), '_annuncio_salary', true);
					$expiry = get_post_meta(get_the_ID(), '_annuncio_expiry_date', true);
					$luogo  = get_post_meta(get_the_ID(), '_annuncio_luogo', true);
					$contract  = get_post_meta(get_the_ID(), '_annuncio_contract', true);

					if (is_array($luogo)) {
						$luogoDisplay = implode(', ', array_map('esc_html', $luogo));
					} else {
						$luogoDisplay = esc_html($luogo);
					}

					if (is_array($contract)) {
						$contractDisplay = implode(', ', array_map('esc_html', $contract));
					} else {
						$contractDisplay = esc_html($contract);
					}

					$trimmedContent = wp_trim_words( get_the_content() , $numberCharacters );
					
					$output .= '<div class="annuncio-item '.($stylist == 'grid' ? 'grid-item' : '').'">';
						$output .= '<div class="text-annuncio">';
							$output .= '<h2>' . get_the_title() . '</h2>';
							foreach ($areeArray as $area) {
								$output .= '<h4>' . $area .'</h4>';
							}
							if($showExcepert == 'yes') {
								$output .= '<div class="excepert-item">' . $trimmedContent . '</div>';
							}
							$output .= '<ul class="meta-annuncio">';
								if($luogoDisplay && $showPlace == 'yes') {
									$output .= '<li>' . $luogoDisplay .'</li>';
								}
								if($showContract  == 'yes') {
									if($contractDisplay && $showPlace == 'yes') {
										$output .= '<li>' . $contractDisplay .'</li>';
									}
								} 								                       
							$output .= '</ul>';
							$expireNewDate = date("d/m/Y", strtotime($expiry));
							if($hideExpireDate  == 'yes') {
								$output .= '<div class="expire-date"><span>'.__('Expire date', 'wwu-plugin').' ' . $expireNewDate .'</span></div>';
							} 
						$output .= '</div>';
						$output .= '<div class="cta-annuncio">';
							$output .= '<a class="btn btn-cta-annuncio" href="' . get_the_permalink() . '">';
								$output .= '<span class="btn-text">' . $btnText . '</span>';
							$output .= '</a>';
						$output .= '</div>';
					$output .= '</div>';
				}
				wp_reset_postdata(); 

			} else {
				$output .= '<p>Nessun annuncio disponibile.</p>';
			}

		$output .= '</div>';

		if($activePagination == 'yes') {
			$output .= '<div class="pagination">';
				$output .= paginate_links(array(
					'total'   => $query->max_num_pages,
					'current' => $paged,
					'prev_text' => '« '.$textPrevious.'',
					'next_text' => ''.$textNext.' »',
				));
			$output .= '</div>';
		};
		
		echo $output;
    }
	protected function _content_template() { }	
}
