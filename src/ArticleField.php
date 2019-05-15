<?php

namespace jobcastrop\tripolis;

class ArticleField extends TripolisService
{
    public function create(
        $label,
        $name = null,
        $defaultValue = null,
        $required,
        $articleTypeId,
        $position,
        $articleFieldType,
        $properties = null,
        $picklistItems = null
    )
	{
		$request = array(
			'createRequest' => array(
				'label' => $label,
				'name' => $name,
				'defaultValue' => $defaultValue,
				'required' => $required,
				'articleTypeId' => $articleTypeId,
				'position' => $position,
				'articleFieldType' => $articleFieldType,
				'properties' => $properties,
				'picklistItems' => $picklistItems,
			)
		);

		$result = $this->send("/api2/soap/ArticleFieldService?wsdl", 'create', $request);
		return $result;
	}

    public function update(
        $id,
        $label = null,
        $name = null,
        $defaultValue = null,
        $required = null,
        $position,
        $articleFieldType = null,
        $properties = null,
        $picklistItems = null
    )
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'defaultValue' => $defaultValue,
				'required' => $required,
				'position' => $position,
				'articleFieldType' => $articleFieldType,
				'properties' => $properties,
				'picklistItems' => $picklistItems,
			)
		);

		$result = $this->send("/api2/soap/ArticleFieldService?wsdl", 'update', $request);
		return $result;
	}

	public function countByArticleTypeId ($articleTypeId)
	{
		$request = array(
			'countByArticleTypeIdRequest' => array(
				'articleTypeId' => $articleTypeId,
			)
		);

		$result = $this->send("/api2/soap/ArticleFieldService?wsdl", 'countByArticleTypeId', $request);
		return $result;
	}

	public function getByArticleTypeId ($articleTypeId)
	{
		$request = array(
			'getByArticleTypeIdRequest' => array(
				'articleTypeId' => $articleTypeId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ArticleFieldService?wsdl", 'getByArticleTypeId', $request);
			$request['getByArticleTypeIdRequest']['paging']['pageNr']++;
			foreach($result->articleFields->articleField as $row) {
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

		$result = $this->send("/api2/soap/ArticleFieldService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ArticleFieldService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ArticleFieldService?wsdl", 'getById', $request);
		return $result->articleField;
	}

}