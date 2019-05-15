<?php

namespace jobcastrop\tripolis;

class Workspace extends TripolisService
{
	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'getById', $request);
		return $result->workspace;
	}

	public function getByContactDatabaseId ($contactDatabaseId)
	{
		$request = array(
			'getByContactDatabaseIdRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'getByContactDatabaseId', $request);
			$request['getByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->workspaces->workspace as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function copyForContactDatabase ($contactDatabaseName, $contactDatabaseLabel)
	{
		$request = array(
			'copyWorkspaceForContactDatabaseRequestRequest' => array(
				'contactDatabaseName' => $contactDatabaseName,
				'contactDatabaseLabel' => $contactDatabaseLabel,
			)
		);

		$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'copyForContactDatabase', $request);
		return $result;
	}

	public function getAll ()
	{
		$request = array(
			'getAllRequest' => array(
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'getAll', $request);
			$request['getAllRequest']['paging']['pageNr']++;
			foreach($result->workspaces->workspace as $row) {
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

		$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

    public function create(
        $contactDatabaseId,
        $label,
        $name = null,
        $publicDomainName = null,
        $bounceDomainName = null,
        $listUnsubscribeHeader,
        $properties = null
    )
	{
		$request = array(
			'createRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'label' => $label,
				'name' => $name,
				'publicDomainName' => $publicDomainName,
				'bounceDomainName' => $bounceDomainName,
				'listUnsubscribeHeader' => $listUnsubscribeHeader,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'create', $request);
		return $result;
	}

    public function update(
        $id,
        $label = null,
        $name = null,
        $publicDomainName = null,
        $bounceDomainName = null,
        $listUnsubscribeHeader = null,
        $properties = null
    )
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'publicDomainName' => $publicDomainName,
				'bounceDomainName' => $bounceDomainName,
				'listUnsubscribeHeader' => $listUnsubscribeHeader,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'update', $request);
		return $result;
	}

    public function copy($id, $userId = null, $workspaceName, $workspaceLabel)
	{
		$request = array(
			'copyRequest' => array(
				'id' => $id,
				'userId' => $userId,
				'workspaceName' => $workspaceName,
				'workspaceLabel' => $workspaceLabel,
			)
		);

		$result = $this->send("/api2/soap/WorkspaceService?wsdl", 'copy', $request);
		return $result;
	}

}