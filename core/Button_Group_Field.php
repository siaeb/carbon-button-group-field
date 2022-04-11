<?php

namespace Carbon_Field_Button_Group;

use Carbon_Fields\Field\Field;
use Carbon_Fields\Field\Radio_Field;

class Button_Group_Field extends Radio_Field {


	/**
	 * @var string
	 */
	protected $wrapper_class = '';

	/**
	 * @var string
	 */
	protected $label_class = '';

	/**
	 * @var string
	 */
	protected $input_class = '';

	/**
	 * @var bool
	 */
	protected $disabled = false;

	/**
	 * @var string
	 */
	protected $button_type = EnumButtonGroupType::SQUARE;

	/**
	 * Prepare the field type for use.
	 * Called once per field type when activated.
	 *
	 * @static
	 * @access public
	 *
	 * @return void
	 */
	public static function field_type_activated() {
		$dir    = \Carbon_Field_Button_Group\DIR . '/languages/';
		$locale = get_locale();
		$path   = $dir . $locale . '.mo';
		load_textdomain( 'carbon-field-Button_Group', $path );
	}

	/**
	 * Enqueue scripts and styles in admin.
	 * Called once per field type.
	 *
	 * @static
	 * @access public
	 *
	 * @return void
	 */
	public static function admin_enqueue_scripts() {
		$root_uri = \Carbon_Fields\Carbon_Fields::directory_to_url( \Carbon_Field_Button_Group\DIR );

		// Enqueue field styles.
		wp_enqueue_style( 'carbon-field-Button_Group', $root_uri . '/build/bundle' . ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min' ) . '.css', [], time() );

		// Enqueue field scripts.
		wp_enqueue_script( 'carbon-field-Button_Group', $root_uri . '/build/bundle' . ( ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min' ) . '.js', array( 'carbon-fields-core' ), time() );
	}

	/**
	 * @return string
	 */
	public function get_wrapper_class(): string {
		return $this->wrapper_class;
	}

	/**
	 * @param string $wrapper_class
	 */
	public function set_wrapper_class( string $wrapper_class ): Button_Group_Field {
		$this->wrapper_class = $wrapper_class;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_label_class(): string {
		return $this->label_class;
	}

	/**
	 * @param string $label_class
	 */
	public function set_label_class( string $label_class ): Button_Group_Field {
		$this->label_class = $label_class;

		return $this;
	}

	/**
	 * @return string
	 */
	public function get_input_class(): string {
		return $this->input_class;
	}

	/**
	 * @param string $input_class
	 */
	public function set_input_class( string $input_class ): Button_Group_Field {
		$this->input_class = $input_class;

		return $this;
	}

	/**
	 * @return bool
	 */
	public function isDisabled(): bool {
		return $this->disabled;
	}

	/**
	 * @param bool $disabled
	 */
	public function set_disabled( bool $disabled ): Button_Group_Field{
		$this->disabled = $disabled;
		return $this;
	}


	/**
	 * Set button type
	 *
	 * @return Button_Group_Field
	 * @since 1.0
	 * @author BleezLabs
	 */
	public function set_button_type( $value ) {
		$this->button_type = $value;

		return $this;
	}

	/**
	 * Get button type
	 *
	 * @return string
	 * @since 1.0
	 * @author BleezLabs
	 */
	public function get_button_type() {
		return $this->button_type;
	}

	/**
	 * @param bool $load
	 *
	 * @return array
	 */
	public function to_json( $load ) {
		$data = parent::to_json( $load );

		return array_merge( $data, [
			'wrapperClass' => $this->get_wrapper_class(),
			'labelClass'   => $this->get_label_class(),
			'inputClass'   => $this->get_input_class(),
			'isDisabled'   => $this->isDisabled(),
			'buttonType'   => $this->get_button_type(),
		] );
	}

}
