<?php
/** @package Showcase::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ObservationMap.php");

/**
 * ObservationDAO provides object-oriented access to the observation table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Showcase::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ObservationDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var int */
	public $Version;

	/** @var date */
	public $DateCreated;

	/** @var string */
	public $NodeId;

	/** @var string */
	public $SensorId;

	/** @var string */
	public $Value;


	/**
	 * Returns a dataset of Alarm objects with matching ObservationId
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetAlarms($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_27v5pji13cutepjuv9ox0glwp", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of SensorId
	 * @return Sensor
	 */
	public function GetSensor()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_3vtmlnui6re2o9jq4vqpa2t06");
	}

	/**
	 * Returns the foreign object based on the value of NodeId
	 * @return Node
	 */
	public function GetNode()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_smi270lm0koqq55tj5bfisawt");
	}


}
?>