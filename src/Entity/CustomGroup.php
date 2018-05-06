<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace YMD\CiviCRMconnector\Entity;

/**
 * CustomGroup containing custom fields in CiviCRM
 *
 * @author jam
 */
class CustomGroup {
  use YMD\CiviCRMconnector\ApiConfig;
  
  /**
   * Find all CustomGroup
   * 
   * @return array
   */
  public function findAll(): array {    
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get'));
  }
  /**
   * Find CustomGroup by Id
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
   * Find CustomGroup by Title
   * 
   * @param string $title
   * @return array
   */
  public function findByTitle(string $title): array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      title => $title
    ]));
  }
}
