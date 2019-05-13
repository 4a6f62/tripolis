<?php

namespace jobcastrop\tripolis;

class Article extends TripolisService
{
	public function updateTag ($tag, $tagId)
	{
		$request = array(
			'updateTagRequest' => array(
				'tag' => $tag,
				'tagId' => $tagId,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'updateTag', $request);
		return $result;
	}

	public function assignToNewsletterSection ($id, $newsletterId, $newsletterSectionId, $position)
	{
		$request = array(
			'assignToNewsletterSectionRequest' => array(
				'id' => $id,
				'newsletterId' => $newsletterId,
				'newsletterSectionId' => $newsletterSectionId,
				'position' => $position,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'assignToNewsletterSection', $request);
		return $result;
	}

	public function getByNewsletterId ($newsletterId)
	{
		$request = array(
			'getByNewsletterIdRequest' => array(
				'newsletterId' => $newsletterId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ArticleService?wsdl", 'getByNewsletterId', $request);
			$request['getByNewsletterIdRequest']['paging']['pageNr']++;
			foreach($result->articles->article as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function countByTagIds ($tagIds)
	{
		$request = array(
			'countByTagIdsRequest' => array(
				'tagIds' => $tagIds,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'countByTagIds', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function update ($id, $label, $name, $properties, $articleTagIds, $articleFieldValues)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'properties' => $properties,
				'articleTagIds' => $articleTagIds,
				'articleFieldValues' => $articleFieldValues,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'update', $request);
		return $result;
	}

	public function countByNewsletterId ($newsletterId)
	{
		$request = array(
			'countByNewsletterIdRequest' => array(
				'newsletterId' => $newsletterId,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'countByNewsletterId', $request);
		return $result;
	}

	public function unassignFromNewsletterSection ($id, $newsletterId, $newsletterSectionId, $unassignAllArticles)
	{
		$request = array(
			'unassignFromNewsletterSectionRequest' => array(
				'id' => $id,
				'newsletterId' => $newsletterId,
				'newsletterSectionId' => $newsletterSectionId,
				'unassignAllArticles' => $unassignAllArticles,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'unassignFromNewsletterSection', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'getById', $request);
		return $result->article;
	}

	public function createTag ($tag, $workspaceId)
	{
		$request = array(
			'createTagRequest' => array(
				'tag' => $tag,
				'workspaceId' => $workspaceId,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'createTag', $request);
		return $result;
	}

	public function getByTagIds ($tagIds, $matchAnyTag)
	{
		$request = array(
			'getByTagIdsRequest' => array(
				'tagIds' => $tagIds,
				'matchAnyTag' => $matchAnyTag,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ArticleService?wsdl", 'getByTagIds', $request);
			$request['getByTagIdsRequest']['paging']['pageNr']++;
			foreach($result->sorting as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function deleteTag ($tagId)
	{
		$request = array(
			'deleteTagRequest' => array(
				'tagId' => $tagId,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'deleteTag', $request);
		return $result;
	}

	public function countByWorkspaceId ($workspaceId)
	{
		$request = array(
			'countByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'countByWorkspaceId', $request);
		return $result;
	}

	public function getByNewsletterTypeIdAndTagIds ($tagIds, $matchAnyTag)
	{
		$request = array(
			'getByNewsletterTypeIdAndTagIdsRequest' => array(
				'tagIds' => $tagIds,
				'matchAnyTag' => $matchAnyTag,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ArticleService?wsdl", 'getByNewsletterTypeIdAndTagIds', $request);
			$request['getByNewsletterTypeIdAndTagIdsRequest']['paging']['pageNr']++;
			foreach($result->articles->article as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function create ($articleTypeId, $label, $name, $properties, $articleTagIds, $articleFieldValues)
	{
		$request = array(
			'createRequest' => array(
				'articleTypeId' => $articleTypeId,
				'label' => $label,
				'name' => $name,
				'properties' => $properties,
				'articleTagIds' => $articleTagIds,
				'articleFieldValues' => $articleFieldValues,			)		);

		$result = $this->send("/api2/soap/ArticleService?wsdl", 'create', $request);
		return $result;
	}

	public function getTagsByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getTagsByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ArticleService?wsdl", 'getTagsByWorkspaceId', $request);
			$request['getTagsByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->tags->tag as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ArticleService?wsdl", 'getByWorkspaceId', $request);
			$request['getByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->articles->article as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

}