<?php

namespace jobcastrop\tripolis;

class SmsMessage extends TripolisService
{
	public function create ($smsTypeId, $label, $name, $originatorNumber, $originator, $message, $alternativeMessage, $description, $properties)
	{
		$request = array(
			'createRequest' => array(
				'smsTypeId' => $smsTypeId,
				'label' => $label,
				'name' => $name,
				'originatorNumber' => $originatorNumber,
				'originator' => $originator,
				'message' => $message,
				'alternativeMessage' => $alternativeMessage,
				'description' => $description,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/SmsMessageService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $originatorNumber, $originator, $message, $alternativeMessage, $description, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'originatorNumber' => $originatorNumber,
				'originator' => $originator,
				'message' => $message,
				'alternativeMessage' => $alternativeMessage,
				'description' => $description,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/SmsMessageService?wsdl", 'update', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/SmsMessageService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmsMessageService?wsdl", 'delete', $request);
		return $result;
	}

	public function getBySmsMessageTypeId ($smsTypeId)
	{
		$request = array(
			'getBySmsMessageTypeIdRequest' => array(
				'smsTypeId' => $smsTypeId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/SmsMessageService?wsdl", 'getBySmsMessageTypeId', $request);
			$request['getBySmsMessageTypeIdRequest']['paging']['pageNr']++;
			foreach($result->smsMessages->smsMessage as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmsMessageService?wsdl", 'getById', $request);
		return $result->smsMessage;
	}

}