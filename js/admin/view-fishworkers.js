document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("viewModal");
    var span = document.getElementsByClassName("viewclose")[0];

    // Add click event listeners to all elements with the "view-icon" class
    document.querySelectorAll('.view-icon').forEach(function(icon) {
        icon.onclick = function() {
            // Open the modal and add the active class
            modal.style.display = "flex";
            modal.classList.add("active");

            // Fill the modal fields using a helper function
            fillModalFields(this);
        }
    });

    // Close modal when the close button is clicked
    span.onclick = function() {
        modal.style.display = "none";
        modal.classList.remove("active"); // Remove active class
    };

    // Close modal if the user clicks outside the modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            modal.classList.remove("active"); // Remove active class
        }
    };

    // Function to populate modal fields with data attributes
    function fillModalFields(iconElement) {
        // List of modal fields and corresponding data attributes
        const fields = [
            { field: 'id', dataAttribute: 'data-id' },
            { field: 'gender', dataAttribute: 'data-gender' },
            { field: 'fname', dataAttribute: 'data-fname' },
            { field: 'mname', dataAttribute: 'data-mname' },
            { field: 'lname', dataAttribute: 'data-lname' },
            { field: 'dob', dataAttribute: 'data-dob' },
            { field: 'contact', dataAttribute: 'data-contact' },
            { field: 'postal', dataAttribute: 'data-postal' },
            { field: 'province', dataAttribute: 'data-province' },
            { field: 'municipal', dataAttribute: 'data-municipal' },
            { field: 'barangay', dataAttribute: 'data-barangay' },
            { field: 'street', dataAttribute: 'data-street' },
            { field: 'or', dataAttribute: 'data-or' },
            { field: 'uemail', dataAttribute: 'data-email' },
            { field: 'locator', dataAttribute: 'data-locator' },
            { field: 'reason', dataAttribute: 'data-reason' }
        ];

        // Iterate through the fields array and set the values
        fields.forEach(function(item) {
            const inputElement = document.getElementById('view-' + item.field);
            if (inputElement) {
                inputElement.value = iconElement.getAttribute(item.dataAttribute) || ''; // Set value or empty string if not found
            }
        });
    }
});
