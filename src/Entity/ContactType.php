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
  use YMD\CiviCRMconnector\ApiConfig;
  
  /**
   * Find all ContactTypes
   * 
   * @return array
   */
  public function findAll(): array {    
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get'));
  }
  /**
   * Find ContactType by Id
   * 
   * @param int $id
   * @return array
   */
  public function findById(int $id): array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      id => $id
    ]));
  }
  /**
   * Find Contact by Name
   * 
   * @param string $name
   * @return array
   */
  public function findByName(string $name): array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      id => $name
    ]));
  }
}
