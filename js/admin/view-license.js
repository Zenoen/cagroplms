document.addEventListener('DOMContentLoaded', function() {
    var viewModal = document.getElementById("viewModal");
    var closeModal = document.getElementsByClassName("viewclose")[0];

    // Add click event listeners to all elements with the "view-icon" class
    document.querySelectorAll('.view-icon').forEach(function(icon) {
        icon.onclick = function() {
            // Open the modal and add the active class
            viewModal.style.display = "flex";
            viewModal.classList.add("active");

            // Use a helper function to fill modal fields
            fillViewModalFields(this);
        }
    });

    // Close modal when the close button is clicked
    closeModal.onclick = function() {
        viewModal.style.display = "none";
        viewModal.classList.remove("active"); // Remove active class
    }

    // Close modal if the user clicks outside the modal
    window.onclick = function(event) {
        if (event.target == viewModal) {
            viewModal.style.display = "none";
            viewModal.classList.remove("active"); // Remove active class
        }
    }

    // Function to populate modal fields with data attributes
    function fillViewModalFields(iconElement) {
        // Ensure that the data from the icon element is sourced
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
            const inputElement = document.getElementById('view-' + item.field);
            if (inputElement) {
                inputElement.value = iconElement.getAttribute(item.dataAttribute) || '';
            }
        });

        // Update permit status dynamically
        const statusElement = document.getElementById('view-status');
        const status = iconElement.getAttribute('data-status');
        if (statusElement) {
            statusElement.textContent = status ? status : "Unknown";
        }
    }
});
