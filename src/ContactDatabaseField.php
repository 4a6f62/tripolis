<?php

namespace jobcastrop\tripolis;

class ContactDatabaseField extends TripolisService
{
	public function create ($contactDatabaseId, $label, $name, $type, $minLength, $maxLength, $defaultValue, $key, $required, $inOverview, $contactDatabaseFieldGroupId, $position, $kindOfField, $picklistItems, $properties)
	{
		$request = array(
			'createRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'label' => $label,
				'name' => $name,
				'type' => $type,
				'minLength' => $minLength,
				'maxLength' => $maxLength,
				'defaultValue' => $defaultValue,
				'key' => $key,
				'required' => $required,
				'inOverview' => $inOverview,
				'contactDatabaseFieldGroupId' => $contactDatabaseFieldGroupId,
				'position' => $position,
				'kindOfField' => $kindOfField,
				'picklistItems' => $picklistItems,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/ContactDatabaseFieldService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $minLength, $maxLength, $defaultValue, $key, $required, $inOverview, $contactDatabaseFieldGroupId, $position, $kindOfField, $picklistItems, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'minLength' => $minLength,
				'maxLength' => $maxLength,
				'defaultValue' => $defaultValue,
				'key' => $key,
				'required' => $required,
				'inOverview' => $inOverview,
				'contactDatabaseFieldGroupId' => $contactDatabaseFieldGroupId,
				'position' => $position,
				'kindOfField' => $kindOfField,
				'picklistItems' => $picklistItems,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/ContactDatabaseFieldService?wsdl", 'update', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/ContactDatabaseFieldService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ContactDatabaseFieldService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function getByContactDatabaseFieldGroupId ($contactDatabaseFieldGroupId)
	{
		$request = array(
			'getByContactDatabaseFieldGroupIdRequest' => array(
				'contactDatabaseFieldGroupId' => $contactDatabaseFieldGroupId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ContactDatabaseFieldService?wsdl", 'getByContactDatabaseFieldGroupId', $request);
			$request['getByContactDatabaseFieldGroupIdRequest']['paging']['pageNr']++;
			foreach($result->contactDatabaseFields->contactDatabaseField as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getByContactDatabaseId ($contactDatabaseId)
	{
		$request = array(
			'getByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ContactDatabaseFieldService?wsdl", 'getByContactDatabaseId', $request);
			$request['getByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->contactDatabaseFields->contactDatabaseField as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

}