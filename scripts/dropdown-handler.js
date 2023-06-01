function redirectToPage() {
    var selectBox = document.getElementById("dropdown");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    if (selectedValue !== "") {
        if (selectedValue !== "profile.php") {
            window.location.href = selectedValue;
        } else {
            window.location.href = selectedValue;
        }
    }
}

function removeDefaultOption() {
    var selectBox = document.getElementById("dropdown");
    selectBox.remove(0);
}