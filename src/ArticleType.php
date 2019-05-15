<?php

namespace jobcastrop\tripolis;

class ArticleType extends TripolisService
{
	public function getByWorkspaceId ($workspaceId, $returnArticleFields)
	{
		$request = array(
			'getByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'returnArticleFields' => $returnArticleFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ArticleTypeService?wsdl", 'getByWorkspaceId', $request);
			$request['getByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->articleTypes->articleType as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function create($workspaceId, $label, $name = null, $articleFields = null, $properties = null)
	{
		$request = array(
			'createRequest' => array(
				'workspaceId' => $workspaceId,
				'label' => $label,
				'name' => $name,
				'articleFields' => $articleFields,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/ArticleTypeService?wsdl", 'create', $request);
		return $result;
	}

    public function update($id, $label = null, $name = null)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
			)
		);

		$result = $this->send("/api2/soap/ArticleTypeService?wsdl", 'update', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ArticleTypeService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ArticleTypeService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function countByWorkspaceId ($workspaceId)
	{
		$request = array(
			'countByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
			)
		);

		$result = $this->send("/api2/soap/ArticleTypeService?wsdl", 'countByWorkspaceId', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ArticleTypeService?wsdl", 'getById', $request);
		return $result->articleType;
	}

}