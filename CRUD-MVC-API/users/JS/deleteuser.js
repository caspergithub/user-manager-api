        // DELETE USER CONTROL CODE
        const id = window.location.search.substr(4);
        jsonid = JSON.stringify({"id": id});

        const url = 'http://localhost:8888/user-manager-REST-API-master-kopi/users/PHP/API/entrypoint.php';

        const deletebutton = document.getElementById("deletebtn");

        deletebutton.onclick=()=>{
            fetch(url, {
                method: 'DELETE',
                body: jsonid,
                headers: {
                    'Content-Type': 'application/json'
                }
            })
        }

        function showuser() {
            document.getElementById("selecteduser").innerHTML = "User" + " " + window.location.search.substr(4);
        }

        showuser();