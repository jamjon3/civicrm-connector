<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace YMD\CiviCRMconnector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
/**
 *
 * @author jam
 */
trait ApiConfig {
  /**
   * The Guzzle Client variable
   * 
   * @var type Client
   */
  private static $client;
  /**
   * Returns a Guzzle Client with the base URL set
   * 
   * @return Client
   */
  public function getClient(): \GuzzleHttp\Client {
    if(isset(self::$client)) {
      return self::$client;
    } else {
      return $this->buildClient();
    }
  }
  /**
   * Combines a provided array with the default array for making
   * CiviCRM requests. Default without parameter is the default array.
   * 
   * @param array $query
   * @return array
   */
  public function buildQuery(string $entity,array $query = []): array {
    return \array_merge($this->getDefaultQuery(),[
      'entity' => $entity
    ],$query);    
  }
  /**
   * Builds a query string that's compatible with CiviCRM without encoding the json value
   * 
   * @param string $entity
   * @param string $action
   * @param array $query
   * @return string
   */
  public function generateCiviCompatibleQueryString(string $entity,string $action, array $query = []): string {    
    return \join('?',[ 
      $this->getConfig()['base_url'], 
      \join('&json=', [ 
        \http_build_query(\array_merge($this->getDefaultQuery(),[
          'entity' => $entity,
          'action' => $action
        ])),
        empty($query)?"1":\json_encode($query) 
      ])
    ]);
  }  
  /**
   * Take a class instance and returns the short class name (detecting the entity)
   * 
   * @param type $apiEntity
   * @return string
   */
  public function getEntity($apiEntity): string {
    return (new \ReflectionClass($apiEntity))->getShortName();
  }
  /**
   * Returns the configuration array for CiviCRM api request from the environment
   * 
   * @return array
   */
  private function getConfig(): array {
    return [
      'base_url' => \getenv('CIVICRM_REST_URL', true) ?: \getenv('CIVICRM_REST_URL'),
      'site_key' => \getenv('CIVICRM_SITE_KEY', true) ?: \getenv('CIVICRM_SITE_KEY'),
      'api_key' => \getenv('CIVICRM_API_KEY', true) ?: \getenv('CIVICRM_API_KEY')  
    ];
  }
  /**
   * Returns the default query parameters for a CiviCRM request
   * 
   * @return array
   */
  private function getDefaultQuery(): array {
    return [
      'key' => $this->getConfig()['site_key'],
      'api_key' => $this->getConfig()['api_key'],
      'json' => '{"sequential":1}'
    ];
  }
  /**
   * Builds the Guzzle Client, sets it and returns it.
   * 
   * @return Client
   */
  private function buildClient(): \GuzzleHttp\Client {
    self::$client = new Client([
      // Base URI is used with relative requests
      'base_uri' => $this->getConfig()['base_url'],
      // You can set any number of default request options.
      'headers' => [
        'Accept' => 'application/json',
        'Content-type' => 'application/json'
      ]
    ]);
    return self::$client;
  }  
}
