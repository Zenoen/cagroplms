document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("editModal");
    var span = document.getElementsByClassName("close")[0];

    // Add click event listeners to all elements with the "edit-icon" class
    document.querySelectorAll('.edit-icon').forEach(function(icon) {
        icon.onclick = function() {
            // Open the modal and add the active class
            modal.style.display = "flex";
            modal.classList.add("active"); 

            // Use a helper function to fill modal fields
            fillModalFields(this);
        }
    });

    // Close modal when the close button is clicked
    span.onclick = function() {
        modal.style.display = "none";
        modal.classList.remove("active"); // Remove active class
    }

    // Close modal if the user clicks outside the modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            modal.classList.remove("active"); // Remove active class
        }
    } 

    // Function to populate modal fields with data attributes
    function fillModalFields(iconElement) {
        // Ensure that the data from the icon element is sourced in accordance with relevant licensing
        const fields = [
            { field: 'id', dataAttribute: 'data-id' },
            { field: 'fname', dataAttribute: 'data-fname' },
            { field: 'mname', dataAttribute: 'data-mname' },
            { field: 'lname', dataAttribute: 'data-lname' },
            { field: 'approval_type', dataAttribute: 'data-approval_type' },
            { field: 'email', dataAttribute: 'data-email' },
            { field: 'postal', dataAttribute: 'data-postal' },
            { field: 'province', dataAttribute: 'data-province' },
            { field: 'municipal', dataAttribute: 'data-municipal' },
            { field: 'barangay', dataAttribute: 'data-barangay' },
            { field: 'street', dataAttribute: 'data-street' },
            { field: 'OR', dataAttribute: 'data-or' }
        ];

        // Set each field's value
        fields.forEach(function(item) {
            const inputElement = document.getElementById('edit-' + item.field);
            if (inputElement) {
                inputElement.value = iconElement.getAttribute(item.dataAttribute) || '';
            }
        });
    }
});
