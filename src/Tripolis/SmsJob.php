<?php

namespace jobcastrop\tripolis;

class SmsJob extends TripolisService
{
	public function resume ($id)
	{
		$request = array(
			'resumeRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmsJobService?wsdl", 'resume', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmsJobService?wsdl", 'getById', $request);
		return $result->smsJob;
	}

	public function pause ($id)
	{
		$request = array(
			'pauseRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmsJobService?wsdl", 'pause', $request);
		return $result;
	}

	public function remove ($id)
	{
		$request = array(
			'removeRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmsJobService?wsdl", 'remove', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/SmsJobService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function getStatus ($id)
	{
		$request = array(
			'getStatusRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/SmsJobService?wsdl", 'getStatus', $request);
		return $result;
	}

}