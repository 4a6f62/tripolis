<?php

namespace jobcastrop\tripolis;

class Newsletter extends TripolisService
{
	public function preview ($id, $contactId)
	{
		$request = array(
			'previewRequest' => array(
				'id' => $id,
				'contactId' => $contactId,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'preview', $request);
		return $result->newsletter;
	}

	public function getByNewsletterTypeId ($newsletterTypeId)
	{
		$request = array(
			'getByNewsletterTypeIdRequest' => array(
				'newsletterTypeId' => $newsletterTypeId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/NewsletterService?wsdl", 'getByNewsletterTypeId', $request);
			$request['getByNewsletterTypeIdRequest']['paging']['pageNr']++;
			foreach($result->newsletters->newsletter as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'getById', $request);
		return $result->newsletter;
	}

	public function copy ($newsletterId, $label, $name)
	{
		$request = array(
			'copyRequest' => array(
				'newsletterId' => $newsletterId,
				'label' => $label,
				'name' => $name,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'copy', $request);
		return $result;
	}

	public function create ($newsletterTypeId, $label, $name, $subject, $fromName, $fromAddress, $properties)
	{
		$request = array(
			'createRequest' => array(
				'newsletterTypeId' => $newsletterTypeId,
				'label' => $label,
				'name' => $name,
				'subject' => $subject,
				'fromName' => $fromName,
				'fromAddress' => $fromAddress,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $subject, $fromName, $fromAddress, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'subject' => $subject,
				'fromName' => $fromName,
				'fromAddress' => $fromAddress,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'update', $request);
		return $result;
	}

	public function assignAttachment ($id, $attachmentId)
	{
		$request = array(
			'assignAttachmentRequest' => array(
				'id' => $id,
				'attachmentId' => $attachmentId,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'assignAttachment', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function unassignAttachment ($id, $attachmentId)
	{
		$request = array(
			'unassignAttachmentRequest' => array(
				'id' => $id,
				'attachmentId' => $attachmentId,			)		);

		$result = $this->send("/api2/soap/NewsletterService?wsdl", 'unassignAttachment', $request);
		return $result;
	}

}