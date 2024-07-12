<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;

class GoogleSheetsService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        // Initialize the Google Sheets API client
        $this->client = new Google_Client();
        $this->client->setApplicationName('planning_opc');
        // $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAuthConfig(config('services.google.service_account_credentials'));

        // Initialize the Google Sheets service
        // $this->service = new Google_Service_Sheets($this->client);
    }

    public function fetchDataFromGoogleSheet($spreadsheetId, $range)
{
    $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
    return $response->getValues();
}

}