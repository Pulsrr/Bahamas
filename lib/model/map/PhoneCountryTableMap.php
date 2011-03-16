<?php


/**
 * This class defines the structure of the 'phone_country' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Fri Mar 11 16:49:55 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PhoneCountryTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PhoneCountryTableMap';

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
		$this->setName('phone_country');
		$this->setPhpName('PhoneCountry');
		$this->setClassname('PhoneCountry');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('phone_country_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 100, null);
		$this->addColumn('NUMBER', 'Number', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('DriverCustomer', 'DriverCustomer', RelationMap::ONE_TO_MANY, array('id' => 'phone_country_id', ), null, null);
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
		);
	} // getBehaviors()

} // PhoneCountryTableMap
