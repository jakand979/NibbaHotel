function redirectToPage() {
    var selectBox = document.getElementById("dropdown");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    selectBox.selectedIndex = 0;
    if (selectedValue !== "") {
        if (selectedValue !== "profile.php") {
            window.location.href = selectedValue;
        } else {
            window.location.href = selectedValue;
        }
    }

}
