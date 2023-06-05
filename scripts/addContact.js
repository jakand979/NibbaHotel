$(document).ready(function() {
    function addContact() {
        var contact = $(
            '<div class="contact">' +
            '<input type="text" placeholder="contact type" minlength="1" maxlength="20"> ' +
            '<input type="text" placeholder="phone" minlength="1" maxlength="20">' +
            '<button type="button" class="accept-btn">ACCEPT</button>' +
            '<button type="button" class="delete-btn">DELETE</button>' +
            '</div>');
        $(".profile").append(contact);
        contact.find('.delete-btn').click(function() {
            $(this).parent().remove();
        });
    }

    $(".add-contact").click(function() {
        addContact();
    });

    $(".profile").on("click", ".accept-btn", function() {
        var contactData = [];

        $(".contact").each(function() {
            var contactType = $(this).find('input[name="type"]').val();
            var phone = $(this).find('input[name="phone"]').val();

            var contact = {
                type: contactType,
                phone: phone
            };

            contactData.push(contact);
        });

        $.ajax({
            url: "insert-contact.php",
            type: "POST",
            data: {
                contactData: JSON.stringify(contactData)
            },
            success: function(response) {
                if (response === "success") {
                    alert("Data inserted successfully!");
                } else {
                    alert("Error occurred while inserting data.");
                }
                },
                error: function() {
                    alert("Error occurred while making the request.");
                }
            });
        });

        sessionStorage.setItem("contactState", JSON.stringify(contactData));
    }

    function saveAddressState() {
        var contactData = [];

        $(".contact").each(function() {
            var contactType = $(this).find('input[name="type"]').val();
            var phone = $(this).find('input[name="phone"]').val();

            var contact = {
                type: contactType,
                phone: phone
            };

            contactData.push(contact);
        });

        $(".accept-btn").click(function() {
            $.ajax({
                url: "./insert-contact.php",
                type: "POST",
                data: {
                    contactData: JSON.stringify(contactData)
                },
                success: function(response) {
                    if (response === "success") {
                        alert("Data inserted successfully!");
                    } else {
                        alert("Error occurred while inserting data.");
                    }
                },
                error: function() {
                    alert("Error occurred while making the request.");
                }
            });
        });
    }

    function restoreContactState() {
        var contactState = localStorage.getItem("contactState");
        if (contactState) {
            var contactData = JSON.parse(contactState);

            for (var i = 0; i < contactState.length; i++) {
                var contact = contactData[i];
                var contactElement = $('<div class="contact">' +
                    '<input type="text" name="type" placeholder="contact type" maxlength="20" required value="' + contact.type + '"> ' +
                    '<input type="text" name="phone" placeholder="phone" maxlength="20" required value="' + contact.phone + '">' +
                    '<button type="submit" form="contactForm" class="accept-btn">ACCEPT</button>' +
                    '<button type="button" class="delete-btn">DELETE</button>' +
                    '</div>');
                $(".profile").append(contactElement);
                contactElement.find('.delete-btn').click(function () {
                    $(this).parent().remove();
                    saveContactState();
                });
            }
        }
    }

    restoreContactState();
});




