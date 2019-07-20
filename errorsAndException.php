<?php
 
//PHP 7 Author: Ivan Cese
//-----------------------------ERRORI------------------------------------

//Array Associativo per la gestione degli errori
$errors = array('2'=>'E_WARNING', '8'=>'E_NOTICE', '256'=>'E_USER_ERROR', '512'=>'E_USER_WARNING', '1024'=>'E_USER_NOTICE', '4096'=>'E_RECOVERABLE', '8191'=>'E_ALL');
 
//Display Errors? Modify php.ini config at runtime (modify these lines in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//Set Error criteria
error_reporting(1);

//Gestione errori
function customError($errNum, $errMess, $errFile, $errNumberLine){
  global $errors;
  echo <<<ERR
  ERRORE! <br>
  ->Nr: $errors[$errNum] <br>
  ->Message: $errMess <br>
  ->File: $errFile <br>
  ->Row: $errNumberLine <br><br>
ERR;
}

//Set Error Handler
set_error_handler("customError");


//-----------------------------ECCEZIONI-----------------------------------

//Gestione eccezioni (Da modificare se di interesse)
//Consiglio! Usala per il Re-Throwing ( try{ try{ catch} catch}) 
//Scopi vari: nascondere gli errori agli utenti (utili invece al programmatore)
class customException extends Exception{
  public function errorMessage(){
    echo <<<EXC
    ECCEZIONE UNCAUGHT! <br>
    ->Nr: {$exception->getCode()} <br>
    ->Message: {$exception->getMessage()} <br>
    ->File: {$exception->getFile()} <br>
    ->Row: {$exception->getLine()} <br><br>
EXC;
  }
}

//Top Level Exception (uncaught Exception)
function exceptionUncaught(Throwable $exception){
  echo <<<EXC
  ECCEZIONE UNCAUGHT! <br>
  ->Nr: {$exception->getCode()} <br>
  ->Message: {$exception->getMessage()} <br>
  ->File: {$exception->getFile()} <br>
  ->Row: {$exception->getLine()} <br><br>
EXC;
}

//Set Top Level Exception Handler
//set_exception_handler("invoicementManagement\architecture\ exceptionUncaught");
set_exception_handler('exceptionUncaught'); 

?>