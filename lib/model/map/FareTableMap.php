<?php


/**
 * This class defines the structure of the 'fare' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Mar 12 00:34:49 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class FareTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.FareTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('fare');
		$this->setPhpName('Fare');
		$this->setClassname('Fare');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('fare_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('HASH', 'Hash', 'VARCHAR', true, 255, null);
		$this->addForeignKey('DRIVER_ID', 'DriverId', 'INTEGER', 'driver', 'ID', false, null, null);
		$this->addForeignKey('CUSTOMER_ID', 'CustomerId', 'INTEGER', 'driver_customer', 'ID', false, null, null);
		$this->addColumn('START_ADDRESS', 'StartAddress', 'VARCHAR', true, 255, null);
		$this->addColumn('FLIGHT_NUMBER', 'FlightNumber', 'VARCHAR', false, 100, null);
		$this->addColumn('START_LAT', 'StartLat', 'VARCHAR', false, 100, null);
		$this->addColumn('START_LNG', 'StartLng', 'VARCHAR', false, 100, null);
		$this->addColumn('END_ADDRESS', 'EndAddress', 'VARCHAR', true, 255, null);
		$this->addColumn('END_LAT', 'EndLat', 'VARCHAR', false, 100, null);
		$this->addColumn('END_LNG', 'EndLng', 'VARCHAR', false, 100, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		$this->addColumn('TIME', 'Time', 'TIME', true, null, null);
		$this->addColumn('TAXI_CODE', 'TaxiCode', 'VARCHAR', false, 50, null);
		$this->addColumn('DATETIME', 'Datetime', 'TIMESTAMP', false, null, null);
		$this->addColumn('DURATION', 'Duration', 'INTEGER', false, null, null);
		$this->addColumn('DISTANCE', 'Distance', 'INTEGER', false, null, null);
		$this->addColumn('REAL_START_LAT', 'RealStartLat', 'VARCHAR', false, 100, null);
		$this->addColumn('REAL_START_LNG', 'RealStartLng', 'VARCHAR', false, 100, null);
		$this->addColumn('REAL_END_LAT', 'RealEndLat', 'VARCHAR', false, 100, null);
		$this->addColumn('REAL_END_LNG', 'RealEndLng', 'VARCHAR', false, 100, null);
		$this->addColumn('REAL_DURATION', 'RealDuration', 'INTEGER', false, null, null);
		$this->addColumn('REAL_DISTANCE', 'RealDistance', 'INTEGER', false, null, null);
		$this->addColumn('PRICE', 'Price', 'DECIMAL', false, null, null);
		$this->addColumn('SUPPLEMENT', 'Supplement', 'DECIMAL', false, null, null);
		$this->addColumn('VAT', 'Vat', 'DECIMAL', false, null, null);
		$this->addColumn('PRICE_INCLUDING_TAX', 'PriceIncludingTax', 'DECIMAL', false, null, null);
		$this->addColumn('CONFIRMED', 'Confirmed', 'BOOLEAN', false, null, false);
		$this->addColumn('VALID', 'Valid', 'BOOLEAN', false, null, false);
		$this->addColumn('TAKEN', 'Taken', 'BOOLEAN', false, null, false);
		$this->addColumn('FINISHED', 'Finished', 'BOOLEAN', false, null, false);
		$this->addColumn('DONE', 'Done', 'BOOLEAN', false, null, false);
		$this->addColumn('CUSTOMER_AVAILABLE', 'CustomerAvailable', 'BOOLEAN', false, null, false);
		$this->addColumn('SPECIAL_REQUEST', 'SpecialRequest', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Driver', 'Driver', RelationMap::MANY_TO_ONE, array('driver_id' => 'id', ), null, null);
    $this->addRelation('DriverCustomer', 'DriverCustomer', RelationMap::MANY_TO_ONE, array('customer_id' => 'id', ), null, null);
    $this->addRelation('Prime', 'Prime', RelationMap::ONE_TO_MANY, array('id' => 'fare_id', ), null, null);
    $this->addRelation('Participation', 'Participation', RelationMap::ONE_TO_MANY, array('id' => 'fare_id', ), null, null);
    $this->addRelation('UserUnavailability', 'UserUnavailability', RelationMap::ONE_TO_MANY, array('id' => 'fare_id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // FareTableMap
