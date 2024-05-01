function valid() {
    var sodienthoai = document.getElementById("sodienthoai").value;
    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$|^\d{10}$/;

    if (regex.test(sodienthoai)) {
        // Valid username
        // alert("Username is valid");
        return true;
    } else {
        // Invalid username
        // alert("Username is invalid");
        window.location.href = "./login.php?error=invalidusername";
        return false;
    }
}