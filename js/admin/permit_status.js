document.querySelectorAll('.edit-icon, .view-icon').forEach(button => {
    button.addEventListener('click', function () {

        const status = this.getAttribute('data-status');
        
        const statusSpan = document.querySelector('.modal-status span');
        // const renewButton = document.querySelector('#renewButton');
        const approvalButton = document.querySelector('#insertButton');
        const updateButton = document.querySelector('#updateButton');
        if (status == 1) {
            statusSpan.textContent = 'Pending';
            statusSpan.classList.add('stats-pending');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-complete');
            approvalButton.hidden = false;
            renewButton.hidden = true;
            updateButton.hidden = false;
        } else if (status == 2) {
            statusSpan.textContent = 'Requirements Issued';
            statusSpan.classList.add('stats-pending');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-complete');
            approvalButton.hidden = false;
            renewButton.hidden = true;
            updateButton.hidden = false;
        }
        else if (status == 3) {
            statusSpan.textContent = 'Awaiting Approval';
            statusSpan.classList.add('stats-pending');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-complete');
            approvalButton.hidden = false;
            renewButton.hidden = true;
            updateButton.hidden = false;
        }
        else if (status == 4) {
            statusSpan.textContent = 'Registered';
            approvalButton.hidden = true;
            renewButton.hidden = false;
            updateButton.hidden = false;
            statusSpan.classList.add('stats-complete');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-pending');
        }
        else if (status == 5) {
            approvalButton.hidden = true;
            renewButton.hidden = false;

            statusSpan.textContent = 'Expiry Notice';
            statusSpan.classList.add('stats-expiry');
            statusSpan.classList.remove('stats-complete');
            statusSpan.classList.remove('stats-pending');
            statusSpan.classList.add('stats-complete');
            statusSpan.classList.remove('stats-expiry');
            statusSpan.classList.remove('stats-pending');
        } else if (status == 6) {
            statusSpan.textContent = 'Decline';
            statusSpan.classList.add('stats-expiry');
            statusSpan.classList.remove('stats-complete');
            statusSpan.classList.remove('stats-pending');
            approvalButton.hidden = false;
            renewButton.hidden = true;
            updateButton.hidden = false;
        }
        else {
            statusSpan.textContent = '';
        }


    });
});