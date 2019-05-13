<?php

namespace jobcastrop\tripolis;

class Export extends TripolisService
{
	public function exportComplained ($returnContactFields, $includeCreationDate)
	{
		$request = array(
			'exportComplainedRequest' => array(
				'returnContactFields' => $returnContactFields,
				'includeCreationDate' => $includeCreationDate,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportComplained', $request);
		return $result->data;
	}

	public function exportClicked ($returnContactFields, $includeCreationDate)
	{
		$request = array(
			'exportClickedRequest' => array(
				'returnContactFields' => $returnContactFields,
				'includeCreationDate' => $includeCreationDate,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportClicked', $request);
		return $result->data;
	}

	public function exportLinks ($contactDatabaseId, $timeRange)
	{
		$request = array(
			'exportLinksRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'timeRange' => $timeRange,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportLinks', $request);
		return $result->data;
	}

	public function exportClickedToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportClickedToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportClickedToFtp', $request);
		return $result;
	}

	public function exportSent ($returnContactFields, $includeCreationDate)
	{
		$request = array(
			'exportSentRequest' => array(
				'returnContactFields' => $returnContactFields,
				'includeCreationDate' => $includeCreationDate,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportSent', $request);
		return $result->data;
	}

	public function exportJobs ($contactDatabaseId, $timeRange)
	{
		$request = array(
			'exportJobsRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'timeRange' => $timeRange,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportJobs', $request);
		return $result->data;
	}

	public function exportSkippedToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportSkippedToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportSkippedToFtp', $request);
		return $result;
	}

	public function exportConvertedToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportConvertedToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportConvertedToFtp', $request);
		return $result;
	}

	public function exportOpenedToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportOpenedToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportOpenedToFtp', $request);
		return $result;
	}

	public function exportSentToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportSentToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportSentToFtp', $request);
		return $result;
	}

	public function exportBounced ($returnContactFields, $includeCreationDate)
	{
		$request = array(
			'exportBouncedRequest' => array(
				'returnContactFields' => $returnContactFields,
				'includeCreationDate' => $includeCreationDate,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportBounced', $request);
		return $result->data;
	}

	public function exportJobsToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportJobsToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportJobsToFtp', $request);
		return $result;
	}

	public function exportConverted ($returnContactFields, $includeCreationDate)
	{
		$request = array(
			'exportConvertedRequest' => array(
				'returnContactFields' => $returnContactFields,
				'includeCreationDate' => $includeCreationDate,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportConverted', $request);
		return $result->data;
	}

	public function exportLinksToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportLinksToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportLinksToFtp', $request);
		return $result;
	}

	public function exportOpened ($returnContactFields, $includeCreationDate)
	{
		$request = array(
			'exportOpenedRequest' => array(
				'returnContactFields' => $returnContactFields,
				'includeCreationDate' => $includeCreationDate,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportOpened', $request);
		return $result->data;
	}

	public function exportBouncedToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportBouncedToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportBouncedToFtp', $request);
		return $result;
	}

	public function exportSkipped ($returnContactFields, $includeCreationDate)
	{
		$request = array(
			'exportSkippedRequest' => array(
				'returnContactFields' => $returnContactFields,
				'includeCreationDate' => $includeCreationDate,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportSkipped', $request);
		return $result->data;
	}

	public function getExportStatus ($id)
	{
		$request = array(
			'getExportStatusRequest' => array(
				'id' => $id,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'getExportStatus', $request);
		return $result;
	}

	public function exportComplainedToFtp ($ftpAccountId, $fileName, $sendNotificationMail)
	{
		$request = array(
			'exportComplainedToFtpRequest' => array(
				'ftpAccountId' => $ftpAccountId,
				'fileName' => $fileName,
				'sendNotificationMail' => $sendNotificationMail,			)		);

		$result = $this->send("/api2/soap/ExportService?wsdl", 'exportComplainedToFtp', $request);
		return $result;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ExportService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

}