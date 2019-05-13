<?php

namespace jobcastrop\tripolis;

class CampaignDefinition extends TripolisService
{
	public function getCampaigns ($id)
	{
		$request = array(
			'getCampaignsRequest' => array(
				'id' => $id,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/CampaignDefinitionService?wsdl", 'getCampaigns', $request);
			$request['getCampaignsRequest']['paging']['pageNr']++;
			foreach($result->campaigns->campaign as $row) {
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
			$result = $this->send("/api2/soap/CampaignDefinitionService?wsdl", 'getByWorkspaceId', $request);
			$request['getByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->campaignDefinitions->campaignDefinition as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/CampaignDefinitionService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

}