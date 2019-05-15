<?php

namespace jobcastrop\tripolis;

class ContactDatabase extends TripolisService
{
	public function getAll ()
	{
		$request = array(
			'getAllRequest' => array(
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactDatabaseService?wsdl", 'getAll', $request);
			$request['getAllRequest']['paging']['pageNr']++;
			foreach($result->contactDatabases->contactDatabase as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ContactDatabaseService?wsdl", 'getById', $request);
		return $result->contactDatabase;
	}

    public function create($label, $name = null, $properties = null, $contactDatabaseFieldGroups)
	{
		$request = array(
			'createRequest' => array(
				'label' => $label,
				'name' => $name,
				'properties' => $properties,
				'contactDatabaseFieldGroups' => $contactDatabaseFieldGroups,
			)
		);

		$result = $this->send("/api2/soap/ContactDatabaseService?wsdl", 'create', $request);
		return $result;
	}

    public function update($id, $label = null, $name = null, $properties = null)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/ContactDatabaseService?wsdl", 'update', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ContactDatabaseService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ContactDatabaseService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

}