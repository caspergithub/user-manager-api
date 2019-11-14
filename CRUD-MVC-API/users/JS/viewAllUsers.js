// VIEW ALL USERS

const url = 'http://localhost:8888/user-manager-REST-API-master-kopi/users/PHP/API/entrypoint.php';

async function getData() {
    const response = await fetch(url);
    const data = await response.json();

    // get data from array and display

    let html = "<ul>";
    for (let userData of data) {

        html += "<div class='user'>";
        html += "<span>" + "User: " + userData.id + "</span>";
        html += "<li>" + "First name: " + userData.username + "</li>";
        html += "<li>" + "Email: " + userData.email + "</li>";
        html += "<li>" + "Password: " + userData.password + "</li>";
        html += "<a href='updateuser.html?id=" + userData.id + "'>Edit user</a>" + "<br>";
        html += "<a href='deleteuser.html?id=" + userData.id + "'>Delete user</a>";
        html += "</div>";

        console.log(userData);

        document.getElementById("thelist").innerHTML = html;
    }
    html += "</ul>";
}

getData();

