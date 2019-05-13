<?php

namespace jobcastrop\tripolis;

class NewsletterArticleTemplate extends TripolisService
{
	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterArticleTemplateService?wsdl", 'getById', $request);
		return $result->newsletterArticleTemplate;
	}

	public function create ($newsletterTemplateId, $articleTypeId, $label, $name, $description, $source, $properties)
	{
		$request = array(
			'createRequest' => array(
				'newsletterTemplateId' => $newsletterTemplateId,
				'articleTypeId' => $articleTypeId,
				'label' => $label,
				'name' => $name,
				'description' => $description,
				'source' => $source,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/NewsletterArticleTemplateService?wsdl", 'create', $request);
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

		$result = $this->send("/api2/soap/NewsletterArticleTemplateService?wsdl", 'update', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterArticleTemplateService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/NewsletterArticleTemplateService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function getByNewsletterTemplateId ($newsletterTemplateId)
	{
		$request = array(
			'getByNewsletterTemplateIdRequest' => array(
				'newsletterTemplateId' => $newsletterTemplateId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/NewsletterArticleTemplateService?wsdl", 'getByNewsletterTemplateId', $request);
			$request['getByNewsletterTemplateIdRequest']['paging']['pageNr']++;
			foreach($result->newsletterArticleTemplates->newsletterArticleTemplate as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

}