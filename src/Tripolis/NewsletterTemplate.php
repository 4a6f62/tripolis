<?php

namespace jobcastrop\tripolis;

class NewsletterTemplate extends TripolisService
{
	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterTemplateService?wsdl", 'getById', $request);
		return $result->newsletterTemplate;
	}

	public function getByNewsletterTypeId ($newsletterTypeId)
	{
		$request = array(
			'getByNewsletterTypeIdRequest' => array(
				'newsletterTypeId' => $newsletterTypeId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/NewsletterTemplateService?wsdl", 'getByNewsletterTypeId', $request);
			$request['getByNewsletterTypeIdRequest']['paging']['pageNr']++;
			foreach($result->newsletterTemplates->newsletterTemplate as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterTemplateService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/NewsletterTemplateService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function create ($newsletterTypeId, $label, $name, $newsletterTemplateType, $description, $source, $properties)
	{
		$request = array(
			'createRequest' => array(
				'newsletterTypeId' => $newsletterTypeId,
				'label' => $label,
				'name' => $name,
				'newsletterTemplateType' => $newsletterTemplateType,
				'description' => $description,
				'source' => $source,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/NewsletterTemplateService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $description, $source, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'description' => $description,
				'source' => $source,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/NewsletterTemplateService?wsdl", 'update', $request);
		return $result;
	}

}