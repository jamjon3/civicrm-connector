<?php

namespace YMD\CiviCRMconnector\Entity;

class Contact 
{
  use YMD\CiviCRMconnector\ApiConfig;
  
  /**
   * Find all Contacts
   * 
   * @return array
   */
  public function findAll(): array {    
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get'));
  }
  /**
   * Find Contact by Id
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
   * Find Contacts by an array of conditions
   * 
   * @param array $conditions
   * @return array
   */
  public function findByConditions(array $conditions = []): array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'get',$conditions));
  }
  /**
   * Create a new Contact
   * 
   * @param array $contactarray
   * 
   * Available keys:
   * 
   * 'contact_type' => 'Individual',
   * 'contact_sub_type' => '',
   * 'do_not_email' => 0,
   * 'do_not_phone' => 0,
   * 'do_not_mail' => 0,
   * 'do_not_sms' => 0,
   * 'do_not_trade' => 0,
   * 'is_opt_out' => 0,
   * 'legal_identifier' => '',
   * 'external_identifier' => '',
   * 'sort_name' => 'xyz1, abc1',
   * 'display_name' => 'abc1 xyz1',
   * 'nick_name' => '',
   * 'legal_name' => '',
   * 'image_URL' => '',
   * 'preferred_communication_method' => '',
   * 'preferred_language' => 'en_US',
   * 'preferred_mail_format' => 'Both',
   * 'first_name' => 'abc1',
   * 'middle_name' => '',
   * 'last_name' => 'xyz1',
   * 'prefix_id' => '',
   * 'suffix_id' => '',
   * 'formal_title' => '',
   * 'communication_style_id' => '',
   * 'email_greeting_id' => '1',
   * 'email_greeting_custom' => '',
   * 'email_greeting_display' => '',
   * 'postal_greeting_id' => '1',
   * 'postal_greeting_custom' => '',
   * 'postal_greeting_display' => '',
   * 'addressee_id' => '1',
   * 'addressee_custom' => '',
   * 'addressee_display' => '',
   * 'job_title' => '',
   * 'gender_id' => '',
   * 'birth_date' => '',
   * 'is_deceased' => 0,
   * 'deceased_date' => '',
   * 'household_name' => '',
   * 'primary_contact_id' => '',
   * 'organization_name' => '',
   * 'sic_code' => '',
   * 'user_unique_id' => '',
   */
  public function create(array $contactarray): array {
    return $this->getClient()->request('GET', $this->generateCiviCompatibleQueryString($this->getEntity($this),'create',$contactarray));    
  }
  /**
   * Show the Contact Create fields
   * 
   * @return array
   */
  public function getCreateFields(): array {
    return [
      'contact_type' => 'string',
      'contact_sub_type' => 'string',
      'display_name' => 'string',
      'nick_name' => 'string',
      'legal_name' => 'string',
      'image_URL' => 'string',
      'first_name' => 'string',
      'middle_name' => 'string',
      'last_name' => 'string',
      'prefix_id' => 'string',
      'suffix_id' => 'string',
      'formal_title' => 'string',
      'job_title' => 'string',
      'gender_id' => 'string',
      'birth_date' => 'string',
      'organization_name' => 'string',
    ];
  }
}