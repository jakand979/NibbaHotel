$(document).ready(function() {

    function addContact() {
        var contact = $('<div class="contact">' +
            '<input type="text" name="type" placeholder="contact type">' +
            '<input type="text" name="phone" placeholder="phone"' +
            '<button type="button" class="contact-btn" name="accept">ACCEPT</button>' +
            '<button type="button" class="contact-btn delete-btn" name="delete">DELETE</button>' +
            '</div>');
        $(".profile").append(contact);
        contact.find('.delete-btn').click(function() {
            $(this).parent().remove();
        });
    }

    $(".add-contact").click(function() {
        addContact();
    });

    function saveProfileState() {
        var profileHTML = $(".profile").html();
        localStorage.setItem("profileState", profileHTML);
    }

    function restoreProfileState() {
        var profileState = localStorage.getItem("profileState");
        if (profileState) {
            $(".profile").html(profileState);
            $(".delete-btn").click(function() {
                $(this).parent().remove();
            });
        }
    }

    restoreProfileState();

    $(".accept-btn").click(function() {
        $.ajax({
            url: "insert-contact.php",
            type: "POST",
            data: {
                profileData: $(".profile").html()
            },
            success: function(response) {
                if (response === "success") {
                    saveProfileState();
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
});