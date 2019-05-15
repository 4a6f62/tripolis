<?php

namespace jobcastrop\tripolis;

class Campaign extends TripolisService
{
	public function getByCampaignDefinitionId ($campaignDefinitionId)
	{
		$request = array(
			'getByCampaignDefinitionIdRequest' => array(
				'campaignDefinitionId' => $campaignDefinitionId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/CampaignService?wsdl", 'getByCampaignDefinitionId', $request);
			$request['getByCampaignDefinitionIdRequest']['paging']['pageNr']++;
			foreach($result->campaigns->campaign as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function deactivate ($id)
	{
		$request = array(
			'deactivateRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/CampaignService?wsdl", 'deactivate', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/CampaignService?wsdl", 'getById', $request);
		return $result->campaign;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/CampaignService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

    public function activate($name = null, $label = null, $startTime, $endTime, $description = null)
	{
		$request = array(
			'activateRequest' => array(
				'name' => $name,
				'label' => $label,
				'startTime' => $startTime,
				'endTime' => $endTime,
				'description' => $description,
			)
		);

		$result = $this->send("/api2/soap/CampaignService?wsdl", 'activate', $request);
		return $result;
	}

}