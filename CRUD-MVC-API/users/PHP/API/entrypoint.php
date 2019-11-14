<?php

// THE ENTRYPOINT API

// entrypoint is where you connect to, from postman

// acces control (make it possible to edit stuff)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, POST, GET, PATCH, DELETE, PUT');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');


// get code from apifunctions.php
require "../model/apifunctions.php";


// switch that looks at what method is in use
switch ($_SERVER['REQUEST_METHOD']) {

  //----------------------------------------------------------
  // GET CODE
  // method is set to GET to show all or single user
  case 'GET':

    // if the id parameter is set then read only that user
  if(isset($_GET['id'])){
    readSIngleUser();
  }
  // if the id is not set then show all users
  else{
    readAllUsers();
  }

  // break out of the function
  break;


  //----------------------------------------------------------
  // POST CODE CREATE USER
  // method is set to POST to create a new user
  case 'POST':

    // look at what is entered in the body
  $myBody=file_get_contents('php://input');

  // if something is entered
  if($myBody){

    // then change the values to json
    // validate json format
    $jsonError=jsonValidate($myBody);

    // if values are json
    if ($jsonError === 0) {

      // then create the user
      // JSON is valid
      createUser();
    }
    // if not then show error message
    else{
      echo json_encode(['message'=>$jsonError]);

    }

  }
// if all else fails view error message "unknown data error"
  else
  {
    echo json_encode(['message'=>'Unknown data error']);
  }

  // break out of function
  break;


  //----------------------------------------------------------
  // UPDATE CODE PUT
  // method is set to PUT to update an existing user
  case 'PUT':

    // look at what is entered into the body
  $myBody=file_get_contents('php://input');

  // if something is entered 
  if($myBody){

    // change values to json
    // validate json format
    $jsonError=jsonValidate($myBody);

    // if it worked and the values are json formatted
    if ($jsonError === 0) {
      // then update the user
      // JSON is valid
      updateUser();
    }
    // if not then show error message
    else{
      echo json_encode(['message'=>$jsonError]);
    }
  }
  // and if all else fails then show "unknown data error" message
  else
  {
    echo json_encode(['message'=>'Unknown data error']);
  }

  // break out of function
  break;


  //----------------------------------------------------------
  // DELETE CODE
  // method is set to DELETE to delete an existing user
  case 'DELETE':

    // format user info to json
  echo json_encode(['response'=>'DELETE method']);

  // start delete user function 
  deleteUser();

  // break out of function
  break;


}
?>