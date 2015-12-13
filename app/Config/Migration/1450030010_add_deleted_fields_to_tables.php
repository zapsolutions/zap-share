<?php
class AddDeletedFieldsToTables extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'Add_deleted_fields_to_tables';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_field' => array(
				'clients' => array(
					'deleted_flag' => array(
						'type' => 'boolean',
						'null' => true,
						'default' => false
					),
					'deleted' => array(
						'type' => 'datetime',
						'null' => true,
						'default' => null
					)
				),
				'data' => array(
					'deleted_flag' => array(
						'type' => 'boolean',
						'null' => true,
						'default' => false
					),
					'deleted' => array(
						'type' => 'datetime',
						'null' => true,
						'default' => null
					)
				),
				'projects' => array(
					'deleted_flag' => array(
						'type' => 'boolean',
						'null' => true,
						'default' => false
					),
					'deleted' => array(
						'type' => 'datetime',
						'null' => true,
						'default' => null
					)
				),
			)
		),
		'down' => array(
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
