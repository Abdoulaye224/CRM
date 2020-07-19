<?php

namespace App\Tests\Unit;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function testUser(){
        $user = new User();
        $user->setFirstName('ryan');
        $user->setLastName('Daoud');
        $user->setEmail('ryan@live.fr'); 
        $user->setPassword("ryan");
        $user->setTag("commercial");
        $user->setPhoneNumber("09.98.89.92.92");

        $this->assertNotEmpty($user->getFirstName());
        $this->assertNotEmpty($user->getLastName());
        $this->assertNotEmpty($user->getPassword());
        $this->assertNotEmpty($user->getTag());

        $this->assertEquals('ryan',$user->getFirstName());
        $this->assertEquals('Daoud',$user->getLastName());
        $this->assertEquals('ryan@live.fr',$user->getEmail());
        $this->assertEquals('ryan',$user->getPassword());
        $this->assertEquals('commercial',$user->getTag());
        $this->assertEquals("09.98.89.92.92",$user->GetPhoneNumber());

        $this->assertRegExp('/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/',$user->getEmail());
      //  $this->assertRegExp('/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/', $user->getPhoneNumber());

        $this->assertEquals(true,$this->isValid($user));


    }

    public function isValid(User $user){

        if( empty($user->getFirstName()) || count_chars($user->getFirstName()) < 0 ){
          return "firstName is not valid";
        }
        if( empty($user->getLastName()) || count_chars($user->getLastName()) < 0 ){
          return "lastName is not valid ";
        }
        if( empty($user->getEmail()) || !filter_var($user->getEmail(),FILTER_VALIDATE_EMAIL) ){
          {
            return "email is not valid";
          }
        }
        if( empty($user->getPassword()) || count_chars($user->getPassword()) < 0 ){
            return "password is not valid ";
        }
        if( empty($user->getTag()) || count_chars($user->getTag()) < 0 ){
            return "tag is not valid ";
        }

        return true;
      }

}