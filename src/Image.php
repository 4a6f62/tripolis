<?php

namespace jobcastrop\tripolis;

class Image extends TripolisService
{
	public function countByWorkspaceId ($workspaceId)
	{
		$request = array(
			'countByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'countByWorkspaceId', $request);
		return $result;
	}

	public function deleteTag ($tagId)
	{
		$request = array(
			'deleteTagRequest' => array(
				'tagId' => $tagId,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'deleteTag', $request);
		return $result;
	}

	public function createTag ($tag, $workspaceId)
	{
		$request = array(
			'createTagRequest' => array(
				'tag' => $tag,
				'workspaceId' => $workspaceId,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'createTag', $request);
		return $result;
	}

	public function getById ($includeContent)
	{
		$request = array(
			'getByIdRequest' => array(
				'includeContent' => $includeContent,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'getById', $request);
		return $result->image;
	}

	public function getByTagIds ($includeContent)
	{
		$request = array(
			'getByTagIdsRequest' => array(
				'includeContent' => $includeContent,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ImageService?wsdl", 'getByTagIds', $request);
			$request['getByTagIdsRequest']['paging']['pageNr']++;
			foreach($result->sorting as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function create ($workspaceId, $label, $name, $description, $imageType, $content, $imageTagIds, $properties)
	{
		$request = array(
			'createRequest' => array(
				'workspaceId' => $workspaceId,
				'label' => $label,
				'name' => $name,
				'description' => $description,
				'imageType' => $imageType,
				'content' => $content,
				'imageTagIds' => $imageTagIds,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'create', $request);
		return $result;
	}

	public function getTagsByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getTagsByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ImageService?wsdl", 'getTagsByWorkspaceId', $request);
			$request['getTagsByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->tags->tag as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getByWorkspaceId ($includeContent)
	{
		$request = array(
			'getByWorkspaceIdRequest' => array(
				'includeContent' => $includeContent,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ImageService?wsdl", 'getByWorkspaceId', $request);
			$request['getByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->images->image as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function updateTag ($tag, $tagId)
	{
		$request = array(
			'updateTagRequest' => array(
				'tag' => $tag,
				'tagId' => $tagId,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'updateTag', $request);
		return $result;
	}

	public function countByTagIds ($imageTagIds)
	{
		$request = array(
			'countByImageTagsRequest' => array(
				'imageTagIds' => $imageTagIds,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'countByTagIds', $request);
		return $result;
	}

	public function update ($id, $label, $name, $description, $imageType, $content, $imageTagIds, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'description' => $description,
				'imageType' => $imageType,
				'content' => $content,
				'imageTagIds' => $imageTagIds,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'update', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/ImageService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ImageService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

}