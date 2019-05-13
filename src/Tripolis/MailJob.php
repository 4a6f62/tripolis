<?php

namespace jobcastrop\tripolis;

class MailJob extends TripolisService
{
	public function pause ($id)
	{
		$request = array(
			'pauseRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/MailJobService?wsdl", 'pause', $request);
		return $result;
	}

	public function remove ($id)
	{
		$request = array(
			'removeRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/MailJobService?wsdl", 'remove', $request);
		return $result;
	}

	public function getStatus ($id)
	{
		$request = array(
			'getStatusRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/MailJobService?wsdl", 'getStatus', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/MailJobService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function resume ($id)
	{
		$request = array(
			'resumeRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/MailJobService?wsdl", 'resume', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/MailJobService?wsdl", 'getById', $request);
		return $result->mailJob;
	}

}