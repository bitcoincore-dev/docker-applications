<?php
/** @package    Showcase::Model */

/** import supporting libraries */
require_once("DAO/ObservatieCriteriaDAO.php");

/**
 * The ObservatieCriteria class extends ObservatieDAOCriteria and is used
 * to query the database for objects and collections
 * 
 * @inheritdocs
 * @package Showcase::Model
 * @author ClassBuilder
 * @version 1.0
 */
class ObservatieCriteria extends ObservatieCriteriaDAO
{
	
	/**
	 * GetFieldFromProp returns the DB column for a given class property
	 * 
	 * If any fields that are not part of the table need to be supported
	 * by this Criteria class, they can be added inside the switch statement
	 * in this method
	 * 
	 * @see Criteria::GetFieldFromProp()
	 */
	
	public function GetFieldFromProp($propname)
	{
		switch($propname)
		{
			 case 'nodeAlias':
			 	return 'node.alias';
			 case 'sensorOmschrijving':
			 	return 'sensor.omschrijving';
			default:
				return parent::GetFieldFromProp($propname);
		}
	}
	
	
	/**
	 * For custom query logic, you may override OnPrepare and set the $this->_where to whatever
	 * sql code is necessary.  If you choose to manually set _where then Phreeze will not touch
	 * your where clause at all and so any of the standard property names will be ignored
	 *
	 * @see Criteria::OnPrepare()
	 */
	/*
	function OnPrepare()
	{
		if ($this->MyCustomField == "special value")
		{
			// _where must begin with "where"
			$this->_where = "where db_field ....";
		}
	}
	*/

}
?>