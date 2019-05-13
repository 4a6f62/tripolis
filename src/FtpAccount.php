<?php

namespace jobcastrop\tripolis;

class FtpAccount extends TripolisService
{
	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/FtpAccountService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function create ($label, $name, $properties, $protocol, $host, $port, $username, $password, $remoteFolder, $ftpMode)
	{
		$request = array(
			'createRequest' => array(
				'label' => $label,
				'name' => $name,
				'properties' => $properties,
				'protocol' => $protocol,
				'host' => $host,
				'port' => $port,
				'username' => $username,
				'password' => $password,
				'remoteFolder' => $remoteFolder,
				'ftpMode' => $ftpMode,			)		);

		$result = $this->send("/api2/soap/FtpAccountService?wsdl", 'create', $request);
		return $result;
	}

}