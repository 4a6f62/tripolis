<?php

namespace jobcastrop\tripolis;

class Contact extends TripolisService
{
    public function getContactGroupSubscriptions($groupTypes = null)
	{
		$request = array(
			'getContactGroupSubscriptionsRequest' => array(
				'groupTypes' => $groupTypes,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactService?wsdl", 'getContactGroupSubscriptions', $request);
			$request['getContactGroupSubscriptionsRequest']['paging']['pageNr']++;
			foreach($result->contactGroupSubscriptions->contactGroupSubscription as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function getByContactDatabaseId($contactDatabaseId, $returnContactFields = null)
	{
		$request = array(
			'getByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactService?wsdl", 'getByContactDatabaseId', $request);
			$request['getByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function countBySearch(
        $contactDatabaseId,
        $contactGroupSearchParameters = null,
        $contactFieldSearchParameters = null,
        $fieldConditionType = null
    )
	{
		$request = array(
			'countBySearchRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'contactGroupSearchParameters' => $contactGroupSearchParameters,
				'contactFieldSearchParameters' => $contactFieldSearchParameters,
				'fieldConditionType' => $fieldConditionType,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'countBySearch', $request);
		return $result;
	}

	public function update ($id, $contactFields)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'contactFields' => $contactFields,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'update', $request);
		return $result;
	}

	public function countByContactDatabaseId ($contactDatabaseId)
	{
		$request = array(
			'countByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'countByContactDatabaseId', $request);
		return $result;
	}

    public function getBlacklistedByContactDatabaseId(
        $contactDatabaseId,
        $returnContactFields = null,
        $timeRange = null
    )
	{
		$request = array(
			'getBlacklistedByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'returnContactFields' => $returnContactFields,
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactService?wsdl", 'getBlacklistedByContactDatabaseId', $request);
			$request['getBlacklistedByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->blacklistedContacts->blacklistedContact as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function getCommunicationHistory(
        $contactId,
        $workspaceId = null,
        $jobId = null,
        $timeRange = null,
        $includeFullDetails = null,
        $includeTransactionalJobs = null,
        $includeTestJobs = null
    )
	{
		$request = array(
			'getCommunicationHistory' => array(
				'contactId' => $contactId,
				'workspaceId' => $workspaceId,
				'jobId' => $jobId,
				'timeRange' => $timeRange,
				'includeFullDetails' => $includeFullDetails,
				'includeTransactionalJobs' => $includeTransactionalJobs,
				'includeTestJobs' => $includeTestJobs,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'getCommunicationHistory', $request);
		return $result;
	}

    public function removeFromContactGroup($contactId, $contactGroupIds, $reference = null, $ip = null)
	{
		$request = array(
			'removeFromContactGroupRequest' => array(
				'contactId' => $contactId,
				'contactGroupIds' => $contactGroupIds,
				'reference' => $reference,
				'ip' => $ip,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'removeFromContactGroup', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ContactService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

    public function getBySmartGroupId($returnContactFields = null)
	{
		$request = array(
			'getBySmartGroupIdRequest' => array(
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactService?wsdl", 'getBySmartGroupId', $request);
			$request['getBySmartGroupIdRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function updateBulk(
        $contactDatabaseId,
        $bulkContacts,
        $contactGroupSubscriptions = null,
        $contactGroupUnSubscriptions = null,
        $reference = null,
        $ip,
        $returnContactFields = null
    )
	{
		$request = array(
			'updateBulkRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'bulkContacts' => $bulkContacts,
				'contactGroupSubscriptions' => $contactGroupSubscriptions,
				'contactGroupUnSubscriptions' => $contactGroupUnSubscriptions,
				'reference' => $reference,
				'ip' => $ip,
				'returnContactFields' => $returnContactFields,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'updateBulk', $request);
		return $result->contacts->contact;
	}

    public function search(
        $contactDatabaseId,
        $contactGroupSearchParameters = null,
        $contactFieldSearchParameters = null,
        $fieldConditionType = null,
        $returnContactFields = null
    )
	{
		$request = array(
			'searchRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'contactGroupSearchParameters' => $contactGroupSearchParameters,
				'contactFieldSearchParameters' => $contactFieldSearchParameters,
				'fieldConditionType' => $fieldConditionType,
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactService?wsdl", 'search', $request);
			$request['searchRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function getById($id, $returnContactFields = null)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
				'returnContactFields' => $returnContactFields,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'getById', $request);
		return $result->contact;
	}

	public function deleteBulk ($contactIds)
	{
		$request = array(
			'deleteBulkRequest' => array(
				'contactIds' => $contactIds,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'deleteBulk', $request);
		return $result->deletedContacts;
	}

    public function getByContactGroupId($contactGroupId, $returnContactFields = null)
	{
		$request = array(
			'getByContactGroupIdRequest' => array(
				'contactGroupId' => $contactGroupId,
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ContactService?wsdl", 'getByContactGroupId', $request);
			$request['getByContactGroupIdRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function countByContactGroupIds ($contactGroupIds)
	{
		$request = array(
			'countByContactGroupIdsRequest' => array(
				'contactGroupIds' => $contactGroupIds,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'countByContactGroupIds', $request);
		return $result->counts->count;
	}

	public function create ($contactDatabaseId, $contactFields)
	{
		$request = array(
			'createRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'contactFields' => $contactFields,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'create', $request);
		return $result;
	}

    public function createBulk(
        $contactDatabaseId,
        $createBulkContacts,
        $contactGroupSubscriptions = null,
        $reference = null,
        $ip,
        $returnContactFields = null
    )
	{
		$request = array(
			'createBulkRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'createBulkContacts' => $createBulkContacts,
				'contactGroupSubscriptions' => $contactGroupSubscriptions,
				'reference' => $reference,
				'ip' => $ip,
				'returnContactFields' => $returnContactFields,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'createBulk', $request);
		return $result->contacts->contact;
	}

    public function addToContactGroup($contactId, $contactGroupSubscriptions, $reference = null, $ip = null)
	{
		$request = array(
			'addToContactGroupRequest' => array(
				'contactId' => $contactId,
				'contactGroupSubscriptions' => $contactGroupSubscriptions,
				'reference' => $reference,
				'ip' => $ip,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'addToContactGroup', $request);
		return $result;
	}

    public function addBulkToContactGroup($contactGroupId, $contactIds, $reference = null, $ip = null)
	{
		$request = array(
			'addBulkToContactGroupRequest' => array(
				'contactGroupId' => $contactGroupId,
				'contactIds' => $contactIds,
				'reference' => $reference,
				'ip' => $ip,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'addBulkToContactGroup', $request);
		return $result->addedContacts;
	}

	public function countBySmartGroupIds ($smartGroupIds)
	{
		$request = array(
			'countBySmartGroupIdsRequest' => array(
				'smartGroupIds' => $smartGroupIds,
			)
		);

		$result = $this->send("/api2/soap/ContactService?wsdl", 'countBySmartGroupIds', $request);
		return $result->counts->count;
	}

}