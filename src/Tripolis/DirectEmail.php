<?php

namespace jobcastrop\tripolis;

class DirectEmail extends TripolisService
{
	public function create ($directEmailTypeId, $label, $name, $subject, $description, $htmlSource, $textSource, $fromName, $fromAddress, $replyToAddress, $properties)
	{
		$request = array(
			'createRequest' => array(
				'directEmailTypeId' => $directEmailTypeId,
				'label' => $label,
				'name' => $name,
				'subject' => $subject,
				'description' => $description,
				'htmlSource' => $htmlSource,
				'textSource' => $textSource,
				'fromName' => $fromName,
				'fromAddress' => $fromAddress,
				'replyToAddress' => $replyToAddress,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $subject, $description, $htmlSource, $textSource, $fromName, $fromAddress, $replyToAddress, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'subject' => $subject,
				'description' => $description,
				'htmlSource' => $htmlSource,
				'textSource' => $textSource,
				'fromName' => $fromName,
				'fromAddress' => $fromAddress,
				'replyToAddress' => $replyToAddress,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'update', $request);
		return $result;
	}

	public function assignAttachment ($id, $attachmentId)
	{
		$request = array(
			'assignAttachmentRequest' => array(
				'id' => $id,
				'attachmentId' => $attachmentId,			)		);

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'assignAttachment', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function unassignAttachment ($id, $attachmentId)
	{
		$request = array(
			'unassignAttachmentRequest' => array(
				'id' => $id,
				'attachmentId' => $attachmentId,			)		);

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'unassignAttachment', $request);
		return $result;
	}

	public function getByDirectEmailTypeId ($directEmailTypeId)
	{
		$request = array(
			'getByDirectEmailTypeIdRequest' => array(
				'directEmailTypeId' => $directEmailTypeId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'getByDirectEmailTypeId', $request);
			$request['getByDirectEmailTypeIdRequest']['paging']['pageNr']++;
			foreach($result->directEmails->directEmail as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function preview ($id, $contactId)
	{
		$request = array(
			'previewRequest' => array(
				'id' => $id,
				'contactId' => $contactId,			)		);

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'preview', $request);
		return $result->directEmail;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/DirectEmailService?wsdl", 'getById', $request);
		return $result->directEmail;
	}

}