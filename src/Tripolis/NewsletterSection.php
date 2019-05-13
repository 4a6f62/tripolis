<?php

namespace jobcastrop\tripolis;

class NewsletterSection extends TripolisService
{
	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/NewsletterSectionService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterSectionService?wsdl", 'delete', $request);
		return $result;
	}

	public function create ($newsletterTypeId, $label, $name, $defaultArticleTypeId, $sectionFeeds, $properties)
	{
		$request = array(
			'createRequest' => array(
				'newsletterTypeId' => $newsletterTypeId,
				'label' => $label,
				'name' => $name,
				'defaultArticleTypeId' => $defaultArticleTypeId,
				'sectionFeeds' => $sectionFeeds,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/NewsletterSectionService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $defaultArticleTypeId, $sectionFeeds, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'defaultArticleTypeId' => $defaultArticleTypeId,
				'sectionFeeds' => $sectionFeeds,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/NewsletterSectionService?wsdl", 'update', $request);
		return $result;
	}

	public function getByNewsletterTypeId ($newsletterTypeId)
	{
		$request = array(
			'getByNewsletterTypeIdRequest' => array(
				'newsletterTypeId' => $newsletterTypeId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/NewsletterSectionService?wsdl", 'getByNewsletterTypeId', $request);
			$request['getByNewsletterTypeIdRequest']['paging']['pageNr']++;
			foreach($result->newsletterSections->newsletterSection as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/NewsletterSectionService?wsdl", 'getById', $request);
		return $result->newsletterSection;
	}

}