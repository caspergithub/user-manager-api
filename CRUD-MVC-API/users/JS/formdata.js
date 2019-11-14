function testResults (form) {
  alert("beep");
    let TestVar = form.inputbox.value;

   postData(TestVar);


}

function postData(myName) {
    alert ("You typed: " + myName);


  xhttp.open("POST", "PHP/user.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("fname=Henry&lname=Ford");

   }
