

window.onload = function() {

    var userImage = document.getElementById('user-menu-button');

    if (userImage) {

        userImage.onclick = function() {

            if (document.getElementById("user-menu").style.display === "none")
            {
                document.getElementById("user-menu").style.display = "block";

            } else {
                document.getElementById("user-menu").style.display = "none";
            }
        };
    }
};