document.addEventListener('DOMContentLoaded', function() {
    var editModal = document.getElementById("editModal");
    var closeBtn = document.getElementsByClassName("close")[0];

    // Add click event listeners to all elements with the "edit-icon" class
    document.querySelectorAll('.edit-icon').forEach(function(icon) {
        icon.onclick = function() {
            // Open the modal and add the active class
            editModal.style.display = "flex";
            editModal.classList.add("active");

            // Use a helper function to fill modal fields
            populateEditModalFields(this);
        };
    });

    // Close modal when the close button is clicked
    closeBtn.onclick = function() {
        editModal.style.display = "none";
        editModal.classList.remove("active");
    };

    // Close modal if the user clicks outside the modal
    window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
            editModal.classList.remove("active");
        }
    };

    // Function to populate modal fields with data attributes
    function populateEditModalFields(iconElement) {
        // List of modal fields and corresponding data attributes
        const fields = [
            { field: 'id', dataAttribute: 'data-id' },
            { field: 'gender', dataAttribute: 'data-gender' },
            { field: 'fname', dataAttribute: 'data-fname' },
            { field: 'mname', dataAttribute: 'data-mname' },
            { field: 'lname', dataAttribute: 'data-lname' },
            { field: 'dob', dataAttribute: 'data-dob' },
            { field: 'province', dataAttribute: 'data-province' },
            { field: 'municipal', dataAttribute: 'data-municipal' },
            { field: 'barangay', dataAttribute: 'data-barangay' },
            { field: 'street', dataAttribute: 'data-street' },
            { field: 'or', dataAttribute: 'data-or' },
            { field: 'type', dataAttribute: 'data-type' },
            { field: 'email', dataAttribute: 'data-email' },
            { field: 'rowid', dataAttribute: 'data-rowid' },
            { field: 'rowtype', dataAttribute: 'data-rowtype' }
        ];

        // Iterate through the fields array and set the values
        fields.forEach(function(item) {
            const inputElement = document.getElementById('edit-' + item.field);
            if (inputElement) {
                inputElement.value = iconElement.getAttribute(item.dataAttribute) || ''; // Set value or empty string if not found
            }
        });
    }
});
