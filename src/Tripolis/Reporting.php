<?php

namespace jobcastrop\tripolis;

class Reporting extends TripolisService
{
	public function getDeliveredBySmsJobId ($mailJobId, $returnContactFields)
	{
		$request = array(
			'getDeliveredBySmsJobIdRequest' => array(
				'mailJobId' => $mailJobId,
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getDeliveredBySmsJobId', $request);
			$request['getDeliveredBySmsJobIdRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getBouncedBySmsJobId ($timeRange)
	{
		$request = array(
			'getBouncedBySmsJobIdRequest' => array(
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getBouncedBySmsJobId', $request);
			$request['getBouncedBySmsJobIdRequest']['paging']['pageNr']++;
			foreach($result->bouncedContacts->bouncedContact as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getClickedByMailJobId ($timeRange)
	{
		$request = array(
			'getClickedByMailJobIdRequest' => array(
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getClickedByMailJobId', $request);
			$request['getClickedByMailJobIdRequest']['paging']['pageNr']++;
			foreach($result->clicks->click as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getSkippedBySmsJobId ($timeRange)
	{
		$request = array(
			'getSkippedBySmsJobIdRequest' => array(
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getSkippedBySmsJobId', $request);
			$request['getSkippedBySmsJobIdRequest']['paging']['pageNr']++;
			foreach($result->skippedContacts->skippedContact as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getSmsSummary ($mailJobId)
	{
		$request = array(
			'getSmsSummaryRequest' => array(
				'mailJobId' => $mailJobId,			)		);

		$result = $this->send("/api2/soap/ReportingService?wsdl", 'getSmsSummary', $request);
		return $result->smsSummary->job;
	}

	public function getClicksPerLinkInHtmlByMailJobId ($mailJobId)
	{
		$request = array(
			'getClicksPerLinkInHtmlByMailJobIdRequest' => array(
				'mailJobId' => $mailJobId,			)		);

		$result = $this->send("/api2/soap/ReportingService?wsdl", 'getClicksPerLinkInHtmlByMailJobId', $request);
		return $result;
	}

	public function getEmailSummary ($mailJobId)
	{
		$request = array(
			'getEmailSummaryRequest' => array(
				'mailJobId' => $mailJobId,			)		);

		$result = $this->send("/api2/soap/ReportingService?wsdl", 'getEmailSummary', $request);
		return $result->emailSummary->job;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ReportingService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

	public function getDeliveredByMailJobId ($mailJobId, $returnContactFields)
	{
		$request = array(
			'getDeliveredByMailJobIdRequest' => array(
				'mailJobId' => $mailJobId,
				'returnContactFields' => $returnContactFields,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getDeliveredByMailJobId', $request);
			$request['getDeliveredByMailJobIdRequest']['paging']['pageNr']++;
			foreach($result->contacts->contact as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getBouncedByMailJobId ($timeRange)
	{
		$request = array(
			'getBouncedByMailJobIdRequest' => array(
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getBouncedByMailJobId', $request);
			$request['getBouncedByMailJobIdRequest']['paging']['pageNr']++;
			foreach($result->bouncedContacts->bouncedContact as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getSkippedByMailJobId ($timeRange)
	{
		$request = array(
			'getSkippedByMailJobIdRequest' => array(
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getSkippedByMailJobId', $request);
			$request['getSkippedByMailJobIdRequest']['paging']['pageNr']++;
			foreach($result->skippedContacts->skippedContact as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getOpenedByMailJobId ($timeRange)
	{
		$request = array(
			'getOpenedByMailJobIdRequest' => array(
				'timeRange' => $timeRange,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)			)		);

		$return = [];		do {
			$result = $this->send("/api2/soap/ReportingService?wsdl", 'getOpenedByMailJobId', $request);
			$request['getOpenedByMailJobIdRequest']['paging']['pageNr']++;
			foreach($result->opens->open as $row) {
				$return[] = $row;			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

}