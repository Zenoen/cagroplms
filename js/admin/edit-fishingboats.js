document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("editModal");
    var span = document.getElementsByClassName("close")[0];

    // Add click event listeners to all elements with the "edit-icon" class
    document.querySelectorAll('.edit-icon').forEach(function(icon) {
        icon.onclick = function() {
            // Open the modal and add the active class
            modal.style.display = "flex";
            modal.classList.add("active");
// alert(this.getAttribute('data-fb_contact'));
            // Fill the modal fields using a helper function
            fillModalFields(this);
        }
    });

    // Close modal when the close button is clicked
    span.onclick = function() {
        modal.style.display = "none";
        modal.classList.remove("active");
    };

    // Close modal if the user clicks outside the modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            modal.classList.remove("active");
        }
    };

    // Function to populate modal fields with data attributes
    function fillModalFields(iconElement) {
        // List of modal fields and corresponding data attributes
        const fields = [
            { field: 'id', dataAttribute: 'data-id' },
            { field: 'id2', dataAttribute: 'data-id' },
            { field: 'fb_opfname', dataAttribute: 'data-fb_opfname' },
            { field: 'fb_opmname', dataAttribute: 'data-fb_opmname' },
            { field: 'fb_oplname', dataAttribute: 'data-fb_oplname' },
            { field: 'fb_opappel', dataAttribute: 'data-fb_opappel' },
            { field: 'fb_postal', dataAttribute: 'data-fb_postal' },
            { field: 'fb_contact', dataAttribute: 'data-fb_contact' },
            { field: 'fb_opprov', dataAttribute: 'data-fb_opprov' },
            { field: 'fb_opmunicipal', dataAttribute: 'data-fb_opmunicipal' },
            { field: 'fb_opbarangay', dataAttribute: 'data-fb_opbarangay' },
            { field: 'fb_opstreet', dataAttribute: 'data-fb_opstreet' },
            { field: 'fb_homeport', dataAttribute: 'data-fb_homeport' },
            { field: 'fb_vesselname', dataAttribute: 'data-fb_vesselname' },
            { field: 'fb_vesseltype', dataAttribute: 'data-fb_vesseltype' },
            { field: 'fb_placebuilt', dataAttribute: 'data-fb_placebuilt' },
            { field: 'fb_yearbuilt', dataAttribute: 'data-fb_yearbuilt' },
            { field: 'fb_materialbuilt', dataAttribute: 'data-fb_materialbuilt' },
            { field: 'fb_RL', dataAttribute: 'data-fb_RL' },
            { field: 'fb_RB', dataAttribute: 'data-fb_RB' },
            { field: 'fb_RD', dataAttribute: 'data-fb_RD' },
            { field: 'fb_TL', dataAttribute: 'data-fb_TL' },
            { field: 'fb_TB', dataAttribute: 'data-fb_TB' },
            { field: 'fb_TD', dataAttribute: 'data-fb_TD' },
            { field: 'fb_GT', dataAttribute: 'data-fb_GT' },
            { field: 'fb_NT', dataAttribute: 'data-fb_NT' },
            { field: 'fb_enginemake', dataAttribute: 'data-fb_enginemake' },
            { field: 'fb_serial', dataAttribute: 'data-fb_serial' },
            { field: 'fb_horsepower', dataAttribute: 'data-fb_horsepower' },
            { field: 'u_email', dataAttribute: 'data-u_email' },
            { field: 'approval_type', dataAttribute: 'data-approval_type' },
            { field: 'issuance_date', dataAttribute: 'data-issuance_date' },
            { field: 'reason', dataAttribute: 'data-reason' },
            { field: 'expiration_date', dataAttribute: 'data-expiration_date' }
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
