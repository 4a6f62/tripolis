<?php

namespace jobcastrop\tripolis;

class User extends TripolisService
{
	public function getByAuthInfo ()
	{
		$request = array(
			'getByAuthInfoRequest' => array(			)		);

		$result = $this->send("/api2/soap/UserService?wsdl", 'getByAuthInfo', $request);
		return $result->user;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/UserService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function getUsersInClientDomainByAuthInfo ()
	{
		$request = array(
			'getUsersInClientDomainByAuthInfoRequest' => array(
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/UserService?wsdl", 'getUsersInClientDomainByAuthInfo', $request);
			$request['getUsersInClientDomainByAuthInfoRequest']['paging']['pageNr']++;
			foreach($result->users->user as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

}