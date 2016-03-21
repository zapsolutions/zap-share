<?php
class AddFulltextIndexesToClientsDataProjectsTables extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'Add_fulltext_indexes_to_clients_data_projects_tables';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
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
		$this->Client = classRegistry::init('Client');
		
		if($direction === 'up') {
			$this->callback->out('Adding full text indexes');
			$this->Client->query('
				ALTER TABLE `zap-share`.`clients` 
					ADD FULLTEXT INDEX `FULLTEXT_NAME` (`name` ASC);

				ALTER TABLE `zap-share`.`data` 
					ADD FULLTEXT INDEX `FULLTEXT_PAIR` (`key` ASC, `value` ASC);

				ALTER TABLE `zap-share`.`projects` 
					ADD FULLTEXT INDEX `FULLTEXT_NAME` (`name` ASC);
			');
		} else {
			$this->callback->out('Removing full text indexes');
			$this->Client->query('
				ALTER TABLE `zap-share`.`clients` 
					DROP INDEX `FULLTEXT_NAME` ;

				ALTER TABLE `zap-share`.`data` 
					DROP INDEX `FULLTEXT_PAIR` ;

				ALTER TABLE `zap-share`.`projects` 
					DROP INDEX `FULLTEXT_NAME` ;
			');
		}

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
