<?php

use Carbon_Fields\Carbon_Fields;
use Carbon_Field_Button_Group\Button_Group_Field;

$constant_name = 'Carbon_Field_Button_Group\\DIR';
if (!defined($constant_name)) {
	define( $constant_name, __DIR__ );
}

require_once __DIR__ . '/core/EnumButtonGroupType.php';
require_once __DIR__ . '/core/Button_Group_Field.php';

Carbon_Fields::extend( Button_Group_Field::class, function( $container ) {
	return new Button_Group_Field(
		$container['arguments']['type'],
		$container['arguments']['name'],
		$container['arguments']['label']
	);
} );
