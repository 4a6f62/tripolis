<?php

namespace jobcastrop\tripolis;

class DirectEmailType extends TripolisService
{
	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/DirectEmailTypeService?wsdl", 'getById', $request);
		return $result->directEmailType;
	}

	public function getByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/DirectEmailTypeService?wsdl", 'getByWorkspaceId', $request);
			$request['getByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->directEmailTypes->directEmailType as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function create ($workspaceId, $label, $name, $fromName, $fromAddress, $toEmailFieldId, $replyToAddress, $externalHtmlUrl, $externalTextUrl, $enableWysiwygEditor, $encoding, $enableAttachments, $properties)
	{
		$request = array(
			'createRequest' => array(
				'workspaceId' => $workspaceId,
				'label' => $label,
				'name' => $name,
				'fromName' => $fromName,
				'fromAddress' => $fromAddress,
				'toEmailFieldId' => $toEmailFieldId,
				'replyToAddress' => $replyToAddress,
				'externalHtmlUrl' => $externalHtmlUrl,
				'externalTextUrl' => $externalTextUrl,
				'enableWysiwygEditor' => $enableWysiwygEditor,
				'encoding' => $encoding,
				'enableAttachments' => $enableAttachments,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/DirectEmailTypeService?wsdl", 'create', $request);
		return $result;
	}

	public function update ($id, $label, $name, $fromName, $fromAddress, $toEmailFieldId, $replyToAddress, $externalHtmlUrl, $externalTextUrl, $enableWysiwygEditor, $encoding, $enableAttachments, $properties)
	{
		$request = array(
			'updateRequest' => array(
				'id' => $id,
				'label' => $label,
				'name' => $name,
				'fromName' => $fromName,
				'fromAddress' => $fromAddress,
				'toEmailFieldId' => $toEmailFieldId,
				'replyToAddress' => $replyToAddress,
				'externalHtmlUrl' => $externalHtmlUrl,
				'externalTextUrl' => $externalTextUrl,
				'enableWysiwygEditor' => $enableWysiwygEditor,
				'encoding' => $encoding,
				'enableAttachments' => $enableAttachments,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/DirectEmailTypeService?wsdl", 'update', $request);
		return $result;
	}

	public function delete ($id)
	{
		$request = array(
			'deleteRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/DirectEmailTypeService?wsdl", 'delete', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/DirectEmailTypeService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

}