<?php

namespace jobcastrop\tripolis;

class SmartGroup extends TripolisService
{
	public function getByContactDatabaseId ($contactDatabaseId)
	{
		$request = array(
			'getByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/SmartGroupService?wsdl", 'getByContactDatabaseId', $request);
			$request['getByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->smartGroups->smartGroup as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getContacts ($returnContactFields)
	{
		$request = array(
			'getContactsRequest' => array(
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/SmartGroupService?wsdl", 'getContacts', $request);
			$request['getContactsRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmartGroupService?wsdl", 'getById', $request);
		return $result->smartGroup;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/SmartGroupService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

}