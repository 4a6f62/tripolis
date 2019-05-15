<?php

namespace jobcastrop\tripolis;

class ContactGroup extends TripolisService
{
    public function getByContactDatabaseId($contactDatabaseId, $groupType = null)
	{
		$request = array(
			'getByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'groupType' => $groupType,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'getByContactDatabaseId', $request);
			$request['getByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->contactGroups->contactGroup as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function removeAllContactsFromGroup($reference = null, $ip = null)
	{
		$request = array(
			'removeAllContactsFromGroupRequest' => array(
				'reference' => $reference,
				'ip' => $ip,
			)
		);

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'removeAllContactsFromGroup', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'getById', $request);
		return $result->contactGroup;
	}

    public function removeContactsFromGroup($contactGroupId, $contactIds, $reference = null, $ip = null)
	{
		$request = array(
			'removeContactsFromGroupRequest' => array(
				'contactGroupId' => $contactGroupId,
				'contactIds' => $contactIds,
				'reference' => $reference,
				'ip' => $ip,
			)
		);

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'removeContactsFromGroup', $request);
		return $result;
	}

    public function getByParentGroupId($parentGroupId, $groupType = null)
	{
		$request = array(
			'getByParentGroupIdRequest' => array(
				'parentGroupId' => $parentGroupId,
				'groupType' => $groupType,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'getByParentGroupId', $request);
			$request['getByParentGroupIdRequest']['paging']['pageNr']++;
			foreach($result->contactGroups->contactGroup as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function getContacts($contactGroupId, $returnContactFields = null)
	{
		$request = array(
			'getContactsRequest' => array(
				'contactGroupId' => $contactGroupId,
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'getContacts', $request);
			$request['getContactsRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

    public function addContactsToGroup($contactGroupId, $contactIds, $reference = null, $ip = null)
	{
		$request = array(
			'addContactsToGroupRequest' => array(
				'contactGroupId' => $contactGroupId,
				'contactIds' => $contactIds,
				'reference' => $reference,
				'ip' => $ip,
			)
		);

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'addContactsToGroup', $request);
		return $result;
	}

    public function create(
        $contactDatabaseId,
        $label,
        $name = null,
        $groupType,
        $parentGroupId = null,
        $properties = null
    )
	{
		$request = array(
			'createRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'label' => $label,
				'name' => $name,
				'groupType' => $groupType,
				'parentGroupId' => $parentGroupId,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'create', $request);
		return $result;
	}

    public function update(
        $id,
        $label = null,
        $name = null,
        $groupType = null,
        $parentGroupId = null,
        $archived = null,
        $properties = null
    )
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'groupType' => $groupType,
				'parentGroupId' => $parentGroupId,
				'archived' => $archived,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/ContactGroupService?wsdl", 'update', $request);
		return $result;
	}

}