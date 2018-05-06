<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace YMD\CiviCRMconnector\Entity;

/**
 * Description of CustomField
 *
 * @author jam
 */
class CustomField {
  /**
   * Find CustomField by Name
   * 
   * @param string $name
   * @return array
   */
  public function findByGroupAndConditions(string $group,array $conditions = []): array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',\array_merge([
      custom_group_id => $group
    ],$conditions)));
  }
  /**
   * Find the CustomField by it's group and label
   * 
   * @param string $group
   * @param string $label
   * @return array
   */
  public function findByGroupAndLabel(string $group,string $label): array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      custom_group_id => $group,
      label => $label
    ]));
  }
  /**
   * Find all the fields in a custom group
   * 
   * @param string $group
   * @param int $limit
   * @return array
   */
  public function findAllByGroup(string $group,int $limit=100):array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',[
      custom_group_id => $group,
      options => [
        limit => $limit
      ]
    ]));
  }
}
