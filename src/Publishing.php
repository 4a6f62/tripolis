<?php

namespace jobcastrop\tripolis;

class Publishing extends TripolisService
{
    public function publishTransactionalSms(
        $contactId,
        $smsMessageId,
        $scheduleAt = null,
        $smsJobTagIds = null,
        $properties = null
    )
	{
		$request = array(
			'publishTransactionalSmsRequest' => array(
				'contactId' => $contactId,
				'smsMessageId' => $smsMessageId,
				'scheduleAt' => $scheduleAt,
				'smsJobTagIds' => $smsJobTagIds,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'publishTransactionalSms', $request);
		return $result;
	}

	public function getTagsByWorkspaceId ($workspaceId)
	{
		$request = array(
			'getTagsByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/PublishingService?wsdl", 'getTagsByWorkspaceId', $request);
			$request['getTagsByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->tags->tag as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

    public function getByWorkspaceId(
        $workspaceId,
        $timeRange = null,
        $volume = null,
        $status = null,
        $mailingType = null,
        $channelType = null,
        $isArchived = null,
        $contactGroupId = null,
        $smartGroupId = null,
        $userType = null
    )
	{
		$request = array(
			'jobsByWorkspaceIdRequest' => array(
				'workspaceId' => $workspaceId,
				'timeRange' => $timeRange,
				'volume' => $volume,
				'status' => $status,
				'mailingType' => $mailingType,
				'channelType' => $channelType,
				'isArchived' => $isArchived,
				'contactGroupId' => $contactGroupId,
				'smartGroupId' => $smartGroupId,
				'userType' => $userType,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/PublishingService?wsdl", 'getByWorkspaceId', $request);
			$request['jobsByWorkspaceIdRequest']['paging']['pageNr']++;
			foreach($result->jobs->job as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function deleteTag ($tagId)
	{
		$request = array(
			'deleteTagRequest' => array(
				'tagId' => $tagId,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'deleteTag', $request);
		return $result;
	}

	public function getById ($id)
	{
		$request = array(
			'getByIdRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'getById', $request);
		return $result->job;
	}

    public function publishEmail(
        $contactGroupId = null,
        $smartGroupId = null,
        $directEmailId = null,
        $newsletterId = null,
        $mailsPerHour,
        $scheduleAt = null,
        $mailJobTagIds = null
    )
	{
		$request = array(
			'publishEmailRequest' => array(
				'contactGroupId' => $contactGroupId,
				'smartGroupId' => $smartGroupId,
				'directEmailId' => $directEmailId,
				'newsletterId' => $newsletterId,
				'mailsPerHour' => $mailsPerHour,
				'scheduleAt' => $scheduleAt,
				'mailJobTagIds' => $mailJobTagIds,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'publishEmail', $request);
		return $result;
	}

	public function createTag ($tag, $workspaceId)
	{
		$request = array(
			'createTagRequest' => array(
				'tag' => $tag,
				'workspaceId' => $workspaceId,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'createTag', $request);
		return $result;
	}

	public function getByTagIds ($timeRange)
	{
		$request = array(
			'getByTagIdsRequest' => array(
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/PublishingService?wsdl", 'getByTagIds', $request);
			$request['getByTagIdsRequest']['paging']['pageNr']++;
			foreach($result->jobs->job as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

    public function viewLastMailing(
        $contactGroupId = null,
        $smartGroupId = null,
        $newsletterTypeId = null,
        $directEmailTypeId = null,
        $sampleContactId = null,
        $mailingType
    )
	{
		$request = array(
			'viewLastMailingRequest' => array(
				'contactGroupId' => $contactGroupId,
				'smartGroupId' => $smartGroupId,
				'newsletterTypeId' => $newsletterTypeId,
				'directEmailTypeId' => $directEmailTypeId,
				'sampleContactId' => $sampleContactId,
				'mailingType' => $mailingType,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'viewLastMailing', $request);
		return $result->snapshot->job;
	}

    public function viewLastSms(
        $contactGroupId = null,
        $smartGroupId = null,
        $smsTypeId = null,
        $sampleContactId = null
    )
	{
		$request = array(
			'viewLastSmsRequest' => array(
				'contactGroupId' => $contactGroupId,
				'smartGroupId' => $smartGroupId,
				'smsTypeId' => $smsTypeId,
				'sampleContactId' => $sampleContactId,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'viewLastSms', $request);
		return $result->snapshot->job;
	}

	public function updateTag ($tag, $tagId)
	{
		$request = array(
			'updateTagRequest' => array(
				'tag' => $tag,
				'tagId' => $tagId,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'updateTag', $request);
		return $result;
	}

    public function publishSampleTestEmail(
        $testContactGroupId,
        $contactGroupId = null,
        $smartGroupId = null,
        $directEmailId = null,
        $newsletterId = null,
        $sampleRate,
        $scheduleAt = null,
        $mailJobTagIds = null
    )
	{
		$request = array(
			'publishSampleTestEmailRequest' => array(
				'testContactGroupId' => $testContactGroupId,
				'contactGroupId' => $contactGroupId,
				'smartGroupId' => $smartGroupId,
				'directEmailId' => $directEmailId,
				'newsletterId' => $newsletterId,
				'sampleRate' => $sampleRate,
				'scheduleAt' => $scheduleAt,
				'mailJobTagIds' => $mailJobTagIds,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'publishSampleTestEmail', $request);
		return $result;
	}

    public function publishTestEmail(
        $testContactGroupId,
        $directEmailId = null,
        $newsletterId = null,
        $scheduleAt = null,
        $mailJobTagIds = null
    )
	{
		$request = array(
			'publishTestEmailRequest' => array(
				'testContactGroupId' => $testContactGroupId,
				'directEmailId' => $directEmailId,
				'newsletterId' => $newsletterId,
				'scheduleAt' => $scheduleAt,
				'mailJobTagIds' => $mailJobTagIds,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'publishTestEmail', $request);
		return $result;
	}

    public function publishSms(
        $smsMessageId,
        $contactGroupId = null,
        $smartGroupId = null,
        $scheduleAt = null,
        $smsJobTagIds = null
    )
	{
		$request = array(
			'publishSmsRequest' => array(
				'smsMessageId' => $smsMessageId,
				'contactGroupId' => $contactGroupId,
				'smartGroupId' => $smartGroupId,
				'scheduleAt' => $scheduleAt,
				'smsJobTagIds' => $smsJobTagIds,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'publishSms', $request);
		return $result;
	}

    public function publishTransactionalEmail(
        $contactId,
        $directEmailId = null,
        $newsletterId = null,
        $scheduleAt = null,
        $mailJobTagIds = null,
        $properties = null
    )
	{
		$request = array(
			'publishTransactionalEmailRequest' => array(
				'contactId' => $contactId,
				'directEmailId' => $directEmailId,
				'newsletterId' => $newsletterId,
				'scheduleAt' => $scheduleAt,
				'mailJobTagIds' => $mailJobTagIds,
				'properties' => $properties,
			)
		);

		$result = $this->send("/api2/soap/PublishingService?wsdl", 'publishTransactionalEmail', $request);
		return $result;
	}

}