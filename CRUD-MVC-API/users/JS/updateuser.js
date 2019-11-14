// MY UPDATE USER CONTROL CODE
async function updateUser() {
    const url = 'http://localhost:8888/user-manager-REST-API-master-kopi/users/PHP/API/entrypoint.php';
    const data = {
        id: document.forms["submituser"]["id"].value,
        username: document.forms["submituser"]["username"].value,
        email: document.forms["submituser"]["email"].value,
        password: document.forms["submituser"]["password"].value
    };
    jsonid = JSON.stringify(data); 

    console.log(data);
    try {
        const response = await fetch(url, {
            method: 'PUT',
            body: jsonid,
            headers: {
                'Content-Type': 'application/json'
            }
        });
        
    } catch (error) {
        console.error('Error:', error);
        
    }

}

// Get the user id into the value input
function copyuserid() {
    document.getElementById("useridvalue").value = window.location.search.substr(4);
}

copyuserid();


// Get user id to show in the H1 tag
function showuser() {
    document.getElementById("thisuser").innerHTML = " " + window.location.search.substr(4);
}

showuser();

