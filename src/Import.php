<?php

namespace jobcastrop\tripolis;

class Import extends TripolisService
{
	public function unscheduleImportContacts ($id)
	{
		$request = array(
			'unscheduleImportContactsRequest' => array(
				'id' => $id,
			)
		);

		$result = $this->send("/api2/soap/ImportService?wsdl", 'unscheduleImportContacts', $request);
		return $result;
	}

	public function getImportStatus ($importId)
	{
		$request = array(
			'getImportStatusRequest' => array(
				'importId' => $importId,
			)
		);

		$result = $this->send("/api2/soap/ImportService?wsdl", 'getImportStatus', $request);
		return $result;
	}

    public function importContactsFromFtp(
        $contactDatabaseId = null,
        $contactGroupIds = null,
        $reportReceiverAddress = null,
        $importMode,
        $fileName,
        $extension,
        $ftpAccountId,
        $scheduleAt = null
    )
	{
		$request = array(
			'importContactsFromFtpRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'contactGroupIds' => $contactGroupIds,
				'reportReceiverAddress' => $reportReceiverAddress,
				'importMode' => $importMode,
				'fileName' => $fileName,
				'extension' => $extension,
				'ftpAccountId' => $ftpAccountId,
				'scheduleAt' => $scheduleAt,
			)
		);

		$result = $this->send("/api2/soap/ImportService?wsdl", 'importContactsFromFtp', $request);
		return $result;
	}

    public function importContacts(
        $contactDatabaseId = null,
        $contactGroupIds = null,
        $reportReceiverAddress = null,
        $importMode,
        $fileName = null,
        $extension,
        $importFile
    )
	{
		$request = array(
			'importContactsRequest' => array(
				'contactDatabaseId' => $contactDatabaseId,
				'contactGroupIds' => $contactGroupIds,
				'reportReceiverAddress' => $reportReceiverAddress,
				'importMode' => $importMode,
				'fileName' => $fileName,
				'extension' => $extension,
				'importFile' => $importFile,
			)
		);

		$result = $this->send("/api2/soap/ImportService?wsdl", 'importContacts', $request);
		return $result;
	}

	public function getSchedulesByContactDatabaseId ($contactDatabase)
	{
		$request = array(
			'getSchedulesByContactDatabaseIdRequest' => array(
				'contactDatabase' => $contactDatabase,
				'paging' => array('pageSize' => 100, 'pageNr' => 1)
			)
		);

		$return = [];
		do {
			$result = $this->send("/api2/soap/ImportService?wsdl", 'getSchedulesByContactDatabaseId', $request);
			$request['getSchedulesByContactDatabaseIdRequest']['paging']['pageNr']++;
			foreach($result->importSchedules->importSchedule as $row) {
				$return[] = $row;
			}
		} while(isset($result->paging->totalItems) && $result->paging->totalItems > count($return));

		return $return;
	}

	public function getServiceInfo ()
	{
		$request = array();

		$result = $this->send("/api2/soap/ImportService?wsdl", 'getServiceInfo', $request);
		return $result;
	}

    public function scheduleImportContacts(
        $contactDatabase,
        $contactGroupIds = null,
        $reportReceiverAddress = null,
        $importMode,
        $fileName,
        $extension,
        $ftpAccountId,
        $schedule
    )
	{
		$request = array(
			'scheduleImportContactsRequest' => array(
				'contactDatabase' => $contactDatabase,
				'contactGroupIds' => $contactGroupIds,
				'reportReceiverAddress' => $reportReceiverAddress,
				'importMode' => $importMode,
				'fileName' => $fileName,
				'extension' => $extension,
				'ftpAccountId' => $ftpAccountId,
				'schedule' => $schedule,
			)
		);

		$result = $this->send("/api2/soap/ImportService?wsdl", 'scheduleImportContacts', $request);
		return $result;
	}

}