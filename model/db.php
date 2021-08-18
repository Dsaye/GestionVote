<?php

function getDB()
{
  $db=null;
  try{
  $db=new PDO("mysql:dbname=sngestionvote;host=127.0.0.1","root","");
    }catch(Exception $e)
    {
      echo $e;
    }
  return $db;
}


?>