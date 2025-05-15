<?php
namespace ElementorWpbingo\Widgets;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit;
class Bwp_Button extends Widget_Base {
	public function get_name() {
		return 'bwp_button';
	}
	public function get_title() {
		return __( 'Wpbingo Button', 'wpbingo' );
	}
	public function get_icon() {
		return 'eicon-button';
	}	
	public function get_categories() {
		return [ 'wpbingo' ];
	}
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'wpbingo' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Click here', 'wpbingo' ),
				'placeholder' => esc_html__( 'Click here', 'wpbingo' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'wpbingo' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'wpbingo' ),
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'wpbingo' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_html__( 'Left', 'wpbingo' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wpbingo' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpbingo' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wpbingo' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'wpbingo' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,
			]
		);
		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'wpbingo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'wpbingo' ),
					'right' => esc_html__( 'After', 'wpbingo' ),
				],
				'condition' => array_merge( [ 'selected_icon[value]!' => '' ] ),
			]
		);
		$this->add_responsive_control(
			'icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'wpbingo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button .bwp-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button .bwp-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'wpbingo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button .bwp-button-icon' => 'top: {{SIZE}}{{UNIT}};position: relative;',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Button', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .bwp-button-widget .bwp-button',
				'condition' => [],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .bwp-button-widget .bwp-button',
				'condition' => [],
			]
		);
		$this->add_control(
			'size_icon',
			[
				'label' => esc_html__( 'Size Icon', 'wpbingo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button svg path' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_button_style', [
			'condition' => [],
		] );
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbingo' ),
				'condition' => [],
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
				'condition' => [],
			]
		);
		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button' => 'background-color: {{VALUE}};',
				],
				'condition' => [],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'wpbingo' ),
				'condition' => [],
			]
		);
		$this->add_control(
			'hover_color',
			[
				'label' => esc_html__( 'Text Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button:hover, {{WRAPPER}} .bwp-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button:hover svg path, {{WRAPPER}} .bwp-button:focus svg path' => 'fill: {{VALUE}};',
				],
				'condition' => [],
			]
		);
		$this->add_control(
			'button_background_color_hover',
			[
				'label' => esc_html__( 'Background Color Hover', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button.default:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_1:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_1:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_1 .bwp-button-content-wrapper:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_1 .bwp-button-content-wrapper:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_2:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_3:before' => 'border-color: transparent transparent transparent {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_3:after' => 'border-color: transparent {{VALUE}} transparent transparent;',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_4:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_4:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_4 .bwp-button-content-wrapper:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_4 .bwp-button-content-wrapper:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_5:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_5:after' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_6:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_7:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_8:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_8:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_9:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_10:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_11:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button:focus' => 'background-color: {{VALUE}};',
				],
				'condition' => [],
			]
		);
		$this->add_control(
			'button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button:hover, {{WRAPPER}} .bwp-button:focus' => 'border-color: {{VALUE}};',
				],
				'condition' => [],
			]
		);
		$this->add_control(
			'hover_style',
			[
				'label' => __( 'Hover Style', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'wpbingo' ),
					'style_1'  => __( 'Style 1', 'wpbingo' ),
					'style_2'  => __( 'Style 2', 'wpbingo' ),
					'style_3'  => __( 'Style 3', 'wpbingo' ),
					'style_4'  => __( 'Style 4', 'wpbingo' ),
					'style_5'  => __( 'Style 5', 'wpbingo' ),
					'style_6'  => __( 'Style 6', 'wpbingo' ),
					'style_7'  => __( 'Style 7', 'wpbingo' ),
					'style_8'  => __( 'Style 8', 'wpbingo' ),
					'style_9'  => __( 'Style 9', 'wpbingo' ),
					'style_10'  => __( 'Style 10', 'wpbingo' ),
					'style_11'  => __( 'Style 11', 'wpbingo' ),
				],
			]
		);	
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .bwp-button-widget .bwp-button',
				'separator' => 'before',
				'condition' => [],
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpbingo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_5:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bwp-button-widget .bwp-button.style_5:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .bwp-button-widget .bwp-button',
				'condition' => [],
			]
		);
		$this->add_responsive_control(
			'text_padding',
			[
				'label' => esc_html__( 'Padding', 'wpbingo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-button-widget .bwp-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
				'condition' => [],
			]
		);
		
		$this->end_controls_section();
	}
	protected function render_button( Widget_Base $instance = null ) {
		if ( empty( $instance ) ) {
			$instance = $this;
		}

		$settings = $instance->get_settings_for_display();

		$instance->add_render_attribute( 'wrapper', 'class', 'bwp-button-widget' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$instance->add_link_attributes( 'button', $settings['link'] );
			$instance->add_render_attribute( 'button', 'class', 'bwp-button-link' );
		}
		$instance->add_render_attribute( 'button', 'class', $settings['hover_style'] );
		$instance->add_render_attribute( 'button', 'class', 'bwp-button' );
		$instance->add_render_attribute( 'button', 'role', 'button' );
		?>
		<div <?php $instance->print_render_attribute_string( 'wrapper' ); ?>>
			<a <?php $instance->print_render_attribute_string( 'button' ); ?>>
				<?php $this->render_text( $instance ); ?>
			</a>
		</div>
		<?php
	}

	/**
	 * Render button widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since  3.4.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<#
		view.addRenderAttribute( 'text', 'class', 'bwp-button-text' );
		view.addInlineEditingAttributes( 'text', 'none' );
		var iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' ),
		migrated = elementor.helpers.isIconMigrated( settings, 'selected_icon' );
		#>
		<div class="bwp-button-widget">
			<a id="{{ settings.button_css_id }}" class="bwp-button {{{ settings.hover_style }}}" href="{{ settings.link.url }}" role="button">
				<span class="bwp-button-content-wrapper">
					<# if ( settings.icon || settings.selected_icon ) { #>
					<span class="bwp-button-icon bwp-align-icon-{{ settings.icon_align }}">
						<# if ( ( migrated || ! settings.icon ) && iconHTML.rendered ) { #>
							{{{ iconHTML.value }}}
						<# } else { #>
							<i class="{{ settings.icon }}" aria-hidden="true"></i>
						<# } #>
					</span>
					<# } #>
					<span {{{ view.getRenderAttributeString( 'text' ) }}}>{{{ settings.text }}}</span>
				</span>
			</a>
		</div>
		<?php
	}

	/**
	 * Render button text.
	 *
	 * Render button widget text.
	 *
	 * @param \Elementor\Widget_Base|null $instance
	 *
	 * @since  3.4.0
	 * @access protected
	 */
	protected function render_text( Widget_Base $instance = null ) {
		// The default instance should be `$this` (a Button widget), unless the Trait is being used from outside of a widget (e.g. `Skin_Base`) which should pass an `$instance`.
		if ( empty( $instance ) ) {
			$instance = $this;
		}

		$settings = $instance->get_settings_for_display();

		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

		if ( ! $is_new && empty( $settings['icon_align'] ) ) {
			// @todo: remove when deprecated
			// added as bc in 2.6
			//old default
			$settings['icon_align'] = $instance->get_settings( 'icon_align' );
		}

		$instance->add_render_attribute( [
			'content-wrapper' => [
				'class' => [
					'bwp-button-content-wrapper',
				],
			],
			'icon-align' => [
				'class' => [
					'bwp-button-icon',
					'bwp-align-icon-' . $settings['icon_align'],
				],
			],
			'text' => [
				'class' => 'bwp-button-text',
			],
		] );

		// TODO: replace the protected with public
		//$instance->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php $instance->print_render_attribute_string( 'content-wrapper' ); ?>>
			<?php if ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
				<span <?php $instance->print_render_attribute_string( 'icon-align' ); ?>>
				<?php if ( $is_new || $migrated ) :
					Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
			</span>
			<?php endif; ?>
			<span <?php $instance->print_render_attribute_string( 'text' ); ?>><?php $this->print_unescaped_setting( 'text' ); ?></span>
		</span>
		<?php
	}

	public function on_import( $element ) {
		return Icons_Manager::on_import_migration( $element, 'icon', 'selected_icon' );
	}
	protected function render() {
		$this->render_button();
	}
}
