document.addEventListener("DOMContentLoaded", function() {
    var uStatus = window.uStatus;
    var gearStatus = window.gearStatus;
    var boatStatus = window.boatStatus;
    var showFishingGearPermit = window.showFishingGearPermit;
    var showFishingVesselPermit = window.showFishingVesselPermit;

    var statusSpan = document.querySelector('.permits span');
    updateStatusSpan(statusSpan, uStatus);

    if (showFishingGearPermit) {
        var gearStatusSpan = document.querySelector('.gear-status'); 
        updateStatusSpan(gearStatusSpan, gearStatus);

    }

    if (showFishingVesselPermit) {
        var boatStatusSpan = document.querySelector('.boat-status'); 
        updateStatusSpan(boatStatusSpan, boatStatus);

    }
});

function updateStatusSpan(span, status) {
    span.className = ''; 

    if (status == 1) {
        span.textContent = 'Pending';
        span.classList.add('stats-pending');
    } else if (status == 2) {
        span.textContent = 'Requirements Issued';
        span.classList.add('stats-pending');
    } else if (status == 3) {
        span.textContent = 'Sent for Approval';
        span.classList.add('stats-pending');
    } else if (status == 4) {
        span.textContent = 'Complete';
        span.classList.add('stats-complete');
    } else if (status == 5) {
        span.textContent = 'Expiry Notice';
        span.classList.add('stats-expiry');
    } else {
        span.textContent = 'Pending';
        span.classList.add('stats-pending');
    }
}
