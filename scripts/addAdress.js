$(document).ready(function() {
    function addAddress() {
        var address = $('<div class="address">' +
            '<input type="text" placeholder="street" maxlength="255" required> ' +
            '<input type="text" placeholder="city" maxlength="255" required>' +
            '<input type="number" placeholder="home number" maxlength="10" required> ' +
            '<input type="text" placeholder="zipcode" maxlength="50" required>' +
            '<input type="text" placeholder="adress type" maxlength="20" required>' +
            '<button type="button" class="accept-btn-2">ACCEPT</button>' +
            '<button type="button" class="delete-btn-2">DELETE</button>' +
            '</div>');
        $(".profile").append(address);
        address.find('.delete-btn-2').click(function() {
            $(this).parent().remove();
        });
    }

    $(".add-address").click(function() {
        addAddress();
    });

});