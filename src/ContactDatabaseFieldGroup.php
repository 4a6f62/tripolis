<?php

namespace jobcastrop\tripolis;

class ContactDatabaseFieldGroup extends TripolisService
{
	public function getByContactDatabaseId ($contactDatabaseId)
	{
		$request = array(
			'getByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ContactDatabaseFieldGroupService?wsdl", 'getByContactDatabaseId', $request);
			$request['getByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->contactDatabaseFieldGroups->contactDatabaseFieldGroup as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function delete ($id, $reassignContactDatabaseFieldGroupId)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,
				'reassignContactDatabaseFieldGroupId' => $reassignContactDatabaseFieldGroupId,			)		);

		$result = $this->send("/api2/soap/ContactDatabaseFieldGroupService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ContactDatabaseFieldGroupService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function create ($contactDatabaseId, $label, $name, $position, $properties)
	{
		$request = array(
			'createRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'label' => $label,
				'name' => $name,
				'position' => $position,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/ContactDatabaseFieldGroupService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $position, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'position' => $position,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/ContactDatabaseFieldGroupService?wsdl", 'update', $request);
		return $result;
	}

}