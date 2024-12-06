document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("editModal");
    var span = document.getElementsByClassName("close")[0];

    // Add click event listeners to all elements with the "edit-icon" class
    document.querySelectorAll('.edit-icon').forEach(function(icon) {
        icon.onclick = function() {
            alert("");
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
        // Iterate through all the modal fields and set their values using the data-* attributes
        const fields = [
            { field: 'id', dataAttribute: 'data-id' },
             { field: 'id2', dataAttribute: 'data-id' },
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
            { field: 'status', dataAttribute: 'data-status' },
            { field: 'reason', dataAttribute: 'data-reason' },
            { field: 'approval_type', dataAttribute: 'data-approval_type' }
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
