<?php
/**
 * Created by PhpStorm.
 * User: j.castrop
 * Date: 9-10-2018
 * Time: 11:46
 */

namespace jobcastrop\tripolis;

class TripolisService
{
	private $authInfoVarClient;
    private $authInfoVarUsername ;
    private $authInfoVarPassword ;
    private $endpoint;
    private $ns = "http://services.tripolis.com/";

    public function __construct($client, $username, $password, $endpoint)
    {
        $this->authInfoVarClient = $client;
        $this->authInfoVarUsername = $username;
        $this->authInfoVarPassword = $password;

        if(is_numeric($endpoint)) {
            $endpoint = sprintf('https://td%d.tripolis.com', $endpoint);
        }
        $this->endpoint = $endpoint;
    }

	public function authInfo($client, $username, $password)
	{
		$authInfoVar = array(
			'client' => $client,
			'username' => $username,
			'password' => $password,
		);
		return $authInfoVar;
	}

	public function send($service, $method, $params, $set_header = true)
	{
		// Options http://php.net/manual/en/soapclient.soapclient.php
		$soap_options = array(
			'trace' => TRUE,
			'exceptions' => TRUE,
			'connection_timeout' => 30, // in seconds
			'features' => SOAP_USE_XSI_ARRAY_TYPE + SOAP_SINGLE_ELEMENT_ARRAYS,
			'encoding' => 'utf-8',
			'soap_version' => SOAP_1_2
		);

		$soapClient = new \SoapClient($this->endpoint . $service, $soap_options);

		if ($set_header) {
			$authInfo = $this->authInfo($this->authInfoVarClient, $this->authInfoVarUsername, $this->authInfoVarPassword);
			$header = new \SoapHeader($this->ns, 'authInfo', $authInfo);
			$soapClient->__setSoapHeaders(array($header));
		}

		try {
			$response = $soapClient->$method($params);
			$request = $soapClient->__getLastRequest();
		} catch (\SoapFault $fault) {
			$request = $soapClient->__getLastRequest();
            $response = $soapClient->__getLastResponse();
            throw new \Exception($fault->getMessage(), $fault->getCode());
		}
		if (isset($response->response))
			return $response->response;

		return false;
	}
}