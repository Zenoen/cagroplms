document.addEventListener('DOMContentLoaded', function() {
    var viewModal = document.getElementById("viewModal");
    var span = document.getElementsByClassName("viewclose")[0];

    // Add click event listeners to all elements with the "view-icon" class
    document.querySelectorAll('.view-icon').forEach(function(icon) {
        icon.onclick = function() {
            // Open the modal and add the active class
            viewModal.style.display = "flex";
            viewModal.classList.add("active");

            // Use a helper function to fill modal fields
            fillModalFields(this);

            // Optionally disable all inputs in the view modal to prevent editing
            disableModalInputs(true);
        };
    });

    // Close modal when the close button is clicked
    span.onclick = function() {
        viewModal.style.display = "none";
        viewModal.classList.remove("active"); // Remove active class
    };

    // Close modal if the user clicks outside the modal
    window.onclick = function(event) {
        if (event.target == viewModal) {
            viewModal.style.display = "none";
            viewModal.classList.remove("active"); // Remove active class
        }
    };

    // Function to populate modal fields with data attributes
    function fillModalFields(iconElement) {
        // List of modal fields and corresponding data attributes
        const fields = [
            { field: 'id', dataAttribute: 'data-id' },
            { field: 'fname', dataAttribute: 'data-fname' },
            { field: 'mname', dataAttribute: 'data-mname' },
            { field: 'lname', dataAttribute: 'data-lname' },
            { field: 'appell', dataAttribute: 'data-appell' },
            { field: 'postal', dataAttribute: 'data-postal' },
            { field: 'province', dataAttribute: 'data-province' },
            { field: 'municipal', dataAttribute: 'data-municipal' },
            { field: 'barangay', dataAttribute: 'data-barangay' },
            { field: 'street', dataAttribute: 'data-street' },
            { field: 'contact', dataAttribute: 'data-contact' },
            { field: 'invcategory', dataAttribute: 'data-invcategory' },
            { field: 'cagetype', dataAttribute: 'data-cagetype' },
            { field: 'culturedspicies', dataAttribute: 'data-culturedspicies' },
            { field: 'dimension_size', dataAttribute: 'data-dimension_size' },
            { field: 'intendedfor', dataAttribute: 'data-intendedfor' },
            { field: 'businessname', dataAttribute: 'data-businessname' },
            { field: 'businessadd', dataAttribute: 'data-businessadd' },
            { field: 'businessreg', dataAttribute: 'data-businessreg' },
            { field: 'capitalinv', dataAttribute: 'data-capitalinv' },
            { field: 'source', dataAttribute: 'data-source' },
            { field: 'email', dataAttribute: 'data-email' },
            { field: 'role', dataAttribute: 'data-role' },
            { field: 'reason', dataAttribute: 'data-reason' },
            { field: 'status', dataAttribute: 'data-status' },
            { field: 'approval_type', dataAttribute: 'data-approval_type' }
        ];

        // Iterate through the fields array and set the values
        fields.forEach(function(item) {
            const inputElement = document.getElementById('view-' + item.field);
            if (inputElement) {
                inputElement.value = iconElement.getAttribute(item.dataAttribute) || ''; // Set value or empty string if not found
            }
        });
    }

    // Function to disable or enable modal inputs (for view mode)
    function disableModalInputs(disable) {
        const modalInputs = viewModal.querySelectorAll('input');
        modalInputs.forEach(function(input) {
            input.disabled = disable; // Set the "disabled" attribute based on the "disable" parameter
        });
    }
});
