document.querySelectorAll('.verify-button').forEach(button => {
    button.addEventListener('click', function () {
        const userId = this.getAttribute('data-id');
        const userName = this.getAttribute('data-name');

        // SweetAlert2 confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to verify ${userName}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, verify!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request to verify the user
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "functions/verify.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Success message
                        Swal.fire(
                            'Verified!',
                            `${userName} has been verified.`,
                            'success'
                        );
                        // Optionally reload the page to reflect changes
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        Swal.fire(
                            'Error!',
                            'There was a problem verifying the user.',
                            'error'
                        );
                    }
                };
                xhr.send("user_id=" + userId);
            }
        });
    });
});