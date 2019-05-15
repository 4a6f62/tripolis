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

    public function subscribeContact(
        $contactDatabase,
        $workspace = null,
        $contactId = null,
        $contactFields = null,
        $contactGroupSubscriptions,
        $contactGroupUnSubscriptions = null,
        $directEmail = null,
        $newsletter = null,
        $smsMessageId = null,
        $jobProperties = null,
        $ip,
        $reference = null
    )
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
				'reference' => $reference,
			)
		);

		$result = $this->send("/api2/soap/SubscriptionService?wsdl", 'subscribeContact', $request);
		return $result;
	}

}