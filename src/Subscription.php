<?php

namespace jobcastrop\tripolis;

class Subscription extends TripolisService
{
	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/SubscriptionService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function subscribeContact ($contactDatabase, $workspace, $contactId, $contactFields, $contactGroupSubscriptions, $contactGroupUnSubscriptions, $directEmail, $newsletter, $smsMessageId, $jobProperties, $ip, $reference)
	{
		$request = array(
			'subscribeContactRequest' => array(
				'contactDatabase' => $contactDatabase,
				'workspace' => $workspace,
				'contactId' => $contactId,
				'contactFields' => $contactFields,
				'contactGroupSubscriptions' => $contactGroupSubscriptions,
				'contactGroupUnSubscriptions' => $contactGroupUnSubscriptions,
				'directEmail' => $directEmail,
				'newsletter' => $newsletter,
				'smsMessageId' => $smsMessageId,
				'jobProperties' => $jobProperties,
				'ip' => $ip,
				'reference' => $reference,			)		);

		$result = $this->send("/api2/soap/SubscriptionService?wsdl", 'subscribeContact', $request);
		return $result;
	}

}