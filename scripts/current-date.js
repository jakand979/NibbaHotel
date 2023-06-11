var checkIn = document.getElementById('check_in');
var checkOut = document.getElementById('check_out');

var currentDate = new Date();

checkIn.min = currentDate.toISOString().split('T')[0];

checkIn.addEventListener('change', function() {
    var selectedDate = new Date(this.value);

    selectedDate.setDate(selectedDate.getDate() + 1);

    checkOut.min = selectedDate.toISOString().split('T')[0];
});