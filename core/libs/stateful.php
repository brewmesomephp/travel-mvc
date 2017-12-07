<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 12/5/2017
 * Time: 2:15 PM
 */
namespace Stateful;

class Stateful
{
 private $pageLoads = 0;
 public $objects = [];
 public $vars = [];

 function addObject($obj, $objName){
     $this->objects[$objName] = $obj;
 }

 function getObject($objName){
     return $this->objects[$objName];
 }

 function extractObjects(){
     return $this->objects;
 }

 function  __construct(){
     session_start();
     $ss = session_status();
     if ($ss != 2) {
         session_name("stateful");
         session_start();

     }
     if (!isset($_SESSION['pageLoads'])){
         $_SESSION['pageLoads'] = 1;
         $_SESSION['stateful_obj'] = $this;
         $this->pageLoads = 1;

     }
     else{
         $_SESSION['pageLoads']+= 1;
         $this->pageLoads = $_SESSION['pageLoads'];
     }
     $this->pageLoads += 1;

     extract($_SESSION, EXTR_SKIP);
     return isset($pageLoads) ? $pageLoads : "0";


}

function __toString()
{
    // TODO: Implement __toString() method.
    return "" . $this->pageLoads;
}

function stateDestroy(){
     $this->pageLoads = 0;
     $_SESSION['stateful_obj'] = NULL;
}


}