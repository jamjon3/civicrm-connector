<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace YMD\CiviCRMconnector\Entity;

/**
 * Description of ContactType
 *
 * @author jam
 */
class ContactType {
  use \YMD\CiviCRMconnector\ApiConfig;
  
  /**
   * Find all ContactTypes
   * 
   * @return object
   */
  public function findAll(): object {    
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get'))->getBody();
  }
  /**
   * Find ContactType by Id
   * 
   * @param int $id
   * @return object
   */
  public function findById(int $id): object {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      id => $id
    ]))->getBody();
  }
  /**
   * Find ContactType by label
   * 
   * @param string $label
   * @return object
   */
  public function findByLabel(string $label): object {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      label => $label
    ]))->getBody();
  }
  /**
   * Create a ContactType
   * 
   * @param array $contactTypeArray
   * @return object
   */
  public function create(array $contactTypeArray): object {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'create',$contactTypeArray))->getBody();    
  }
  /**
   * Returns the fields for CreateType
   * 
   * @return array
   */
  public function getCreateTypeFields(): array {
    return [
      "name" => "string",
      "label" => "string",
    ];
  }  
}
