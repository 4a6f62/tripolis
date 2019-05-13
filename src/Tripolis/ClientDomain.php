<?php

namespace jobcastrop\tripolis;

class ClientDomain extends TripolisService
{
	public function getByPartnerDomain ()
	{
		$request = array(
			'getByPartnerDomainRequest' => array(
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ClientDomainService?wsdl", 'getByPartnerDomain', $request);
			$request['getByPartnerDomainRequest']['paging']['pageNr']++;
			foreach($result->clientDomains->clientDomain as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ClientDomainService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function getByUser ()
	{
		$request = array(
			'getByUserRequest' => array(
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ClientDomainService?wsdl", 'getByUser', $request);
			$request['getByUserRequest']['paging']['pageNr']++;
			foreach($result->clientDomains->clientDomain as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function create ($label, $name, $domainType, $partnerDomainId, $supportPhone, $supportEmail, $partnerRss, $virtualMtaId, $properties)
	{
		$request = array(
			'createRequest' => array(
				'label' => $label,
				'name' => $name,
				'domainType' => $domainType,
				'partnerDomainId' => $partnerDomainId,
				'supportPhone' => $supportPhone,
				'supportEmail' => $supportEmail,
				'partnerRss' => $partnerRss,
				'virtualMtaId' => $virtualMtaId,
				'properties' => $properties,			)		);

		$result = $this->send("/api2/soap/ClientDomainService?wsdl", 'create', $request);
		return $result;
	}

	public function getByAuthInfo ()
	{
		$request = array(
			'getByAuthInfoRequest' => array(			)		);

		$result = $this->send("/api2/soap/ClientDomainService?wsdl", 'getByAuthInfo', $request);
		return $result->clientDomain;
	}

}