<?php

namespace jobcastrop\tripolis;

class SmsType extends TripolisService
{
	public function getByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/SmsTypeService?wsdl", 'getByWorkspaceId', $request);
			$request['getByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->smsTypes->smsType as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function create(
        $workspaceId,
        $label,
        $name = null,
        $defaultOriginatorNumber = null,
        $defaultOriginator = null,
        $toMobileFieldId,
        $longSmsEnabled = null,
        $properties = null
    )
	{
		$request = array(
			'createRequest' => array(
				'workspaceId' => $workspaceId,
				'label' => $label,
				'name' => $name,
				'defaultOriginatorNumber' => $defaultOriginatorNumber,
				'defaultOriginator' => $defaultOriginator,
				'toMobileFieldId' => $toMobileFieldId,
				'longSmsEnabled' => $longSmsEnabled,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/SmsTypeService?wsdl", 'create', $request);
		return $result;
	}

    public function update(
        $id,
        $label = null,
        $name = null,
        $defaultOriginatorNumber = null,
        $defaultOriginator = null,
        $toMobileFieldId = null,
        $longSmsEnabled = null,
        $properties = null
    )
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'defaultOriginatorNumber' => $defaultOriginatorNumber,
				'defaultOriginator' => $defaultOriginator,
				'toMobileFieldId' => $toMobileFieldId,
				'longSmsEnabled' => $longSmsEnabled,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/SmsTypeService?wsdl", 'update', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/SmsTypeService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/SmsTypeService?wsdl", 'delete', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/SmsTypeService?wsdl", 'getById', $request);
		return $result->smsType;
	}

}