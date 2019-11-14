async function createUser() {

    const url = 'http://localhost:8888/user-manager-REST-API-master-kopi/users/PHP/API/entrypoint.php';
    const data = {
        username: document.forms["submituser"]["username"].value,
        email: document.forms["submituser"]["email"].value,
        password: document.forms["submituser"]["password"].value
    };

    try {
        const response = await fetch(url, {
            method: 'POST', // or 'PUT'
            mode: "no-cors",
            body: JSON.stringify(data), // username can be `string` or {object}!
            headers: {
                'Content-Type': 'application/json'
            }
        });
    } catch (error) {
        console.error('Error:', error);
    }
}