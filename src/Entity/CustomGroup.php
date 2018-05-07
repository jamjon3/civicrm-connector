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
  use \YMD\CiviCRMconnector\ApiConfig;
  
  /**
   * Find all CustomGroup
   * 
   * @return object
   */
  public function findAll(): object {    
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get'))->getBody();
  }
  /**
   * Find CustomGroup by Id
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
   * Find CustomGroup by Title
   * 
   * @param string $title
   * @return object
   */
  public function findByTitle(string $title): object {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      title => $title
    ]))->getBody();
  }
}
