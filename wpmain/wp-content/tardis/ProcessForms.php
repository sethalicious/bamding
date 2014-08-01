<?php
require_once(ABSPATH. '/wp-content/tardis/Venues.php');
require_once(ABSPATH. '/wp-content/tardis/Venue.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProcessForms
 *
 * @author Seth
 */
class ProcessForms
{
  /**
   * Processes the add new venue submission.
   * Displays errors in divs if couldn't add the venue.
   * Otherwise, it displays a success message and adds the venue to the
   * customer venue database.
   * 
   * @param type $hPostData $_POST variable from submission
   * @todo 
   */
  public static function addNewVenue($hPostData)
  {
    // No post data to process. No form submitted.
    if(empty($hPostData))
    {
      return;
    }
    
    $oVenue = new Venue();
    
    //User login
    $sUserLogin = "";
    if( array_key_exists('bd_user_login', $hPostData) 
            && !empty($hPostData['bd_user_login']) )
    {
      $sUserLogin = $hPostData['bd_user_login'];
    }

    // Venue name
    if( array_key_exists('bd_venue_name', $hPostData) 
            && !empty($hPostData['bd_venue_name']) )
    {
      $oVenue->setName($hPostData['bd_venue_name']);
    }
    else
    {
      // Display error and return
      echo '<div class="bdFormError">ERROR: Venue name is required.</div>';
      return;
    }
    
    // Email
    if( array_key_exists('bd_venue_email', $hPostData) 
            && !empty($hPostData['bd_venue_email']) )
    {
      $oVenue->setEmail($hPostData['bd_venue_email']);
    }
    
    // contact form url
    if( array_key_exists('bd_venue_contact_url', $hPostData) 
            && !empty($hPostData['bd_venue_contact_url']) )
    {
      $oVenue->setContactForm($hPostData['bd_venue_contact_url']);
    }
    
    // Booker's First Name
    if( array_key_exists('bd_venue_booker_fname', $hPostData) 
            && !empty($hPostData['bd_venue_booker_fname']) )
    {
      $oVenue->setBookerFirstName($hPostData['bd_venue_booker_fname']);
    }
    
    // Booker's Last Name
    if( array_key_exists('bd_venue_booker_lname', $hPostData) 
            && !empty($hPostData['bd_venue_booker_lname']) )
    {
      $oVenue->setBookerLastName($hPostData['bd_venue_booker_lname']);
    }
    
    // Street Address 1
    if( array_key_exists('bd_venue_address1', $hPostData) 
            && !empty($hPostData['bd_venue_address1']) )
    {
      $oVenue->setAddress1($hPostData['bd_venue_address1']);
    }
    
    // Street Address 1
    if( array_key_exists('bd_venue_address2', $hPostData) 
            && !empty($hPostData['bd_venue_address2']) )
    {
      $oVenue->setAddress2($hPostData['bd_venue_address2']);
    }
    
    // City
    if( array_key_exists('bd_venue_city', $hPostData) 
            && !empty($hPostData['bd_venue_city']) )
    {
      $oVenue->setCity($hPostData['bd_venue_city']);
    }
    else
    {
      // Display error and return
      echo '<div class="bdFormError">ERROR: The city is required.</div>';
      return;
    }
    
    // State
    if( array_key_exists('bd_venue_state', $hPostData) 
            && !empty($hPostData['bd_venue_state']) )
    {
      $oVenue->setState($hPostData['bd_venue_state']);
    }
    else
    {
      // Display error and return
      echo '<div class="bdFormError">ERROR: The state is required.</div>';
      return;
    }
    
    // Zip/Postal code
    if( array_key_exists('bd_venue_zip', $hPostData) 
            && !empty($hPostData['bd_venue_zip']) )
    {
      $oVenue->setZip($hPostData['bd_venue_zip']);
    }
    
    // Country
    if( array_key_exists('bd_venue_country', $hPostData) 
            && !empty($hPostData['bd_venue_country']) )
    {
      $oVenue->setCountry($hPostData['bd_venue_country']);
    }
    else
    {
      // Display error and return
      echo '<div class="bdFormError">ERROR: The country is required.</div>';
      return;
    }
    
    // Website
    if( array_key_exists('bd_venue_website', $hPostData) 
            && !empty($hPostData['bd_venue_website']) )
    {
      $oVenue->setWebsite($hPostData['bd_venue_website']);
    }
    
    $oVenues = new Venues('my_venues', $sUserLogin);
    $oVenues->addVenue($oVenue);
    
    // Display success message
    echo '<div class="bdFormSuccess">Venue ' . $oVenue->getName() . ' added.</div>';
  }
}
