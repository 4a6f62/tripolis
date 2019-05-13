<?php
/**
 * Created by PhpStorm.
 * User: j.castrop
 * Date: 9-10-2018
 * Time: 11:46
 */

namespace jobcastrop\tripolis;

class Tripolis
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

    public function getService($name)
    {
        $name = 'jobcastrop\tripolis\\' .$name;
        if(!class_exists($name)) {
            throw new \Exception('Service not found.');
        }
        return new $name($this->authInfoVarClient, $this->authInfoVarUsername, $this->authInfoVarPassword, $this->endpoint);
    }
}