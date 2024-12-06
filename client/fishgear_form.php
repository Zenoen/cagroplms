<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fishing Gears Registration</title>
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <style>
        .form-container {
            padding: 20px; /* Padding inside the border */
        }
        label
        {
            font-weight: 400;
        }
        .card-header
        {
            background-color: #024072;
        }
    </style>
<body>
    <div class="container py-3">
        <div class="card">
            <h4 class="card-header text-white p-3">Application for Fishing Gear Permit</h4>
                <div class="card-body">
                    <form autocomplete="off" id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="form-container overflow-auto">
                        <div class="mb-4">
                            <h5>Permit Type</h5>
                            <div>
                            <input type="hidden" name="form_type" value="fishinggear">
                            <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($userData['email']); ?>">
                            <input type="hidden" name="roles" id="roles" value="fishing gear">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="registration_type" value="new">
                                    <label class="form-check-label">New Registration</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="registration_type" value="renewal">
                                    <label class="form-check-label">Renewal</label>
                                </div>
                            </div>
                        </div>

                        <!--PERSONAL INFORMATION SECTION-->
                        <h5>Personal Information</h5>
                        <div class="mb-3">
                            <label class="form-label">Complete Name</label>
                            <div class="row">
                                <div class="col-md-2  mb-2">
                                    <select class="form-select" name="salutation">
                                        <option value="">Salutation</option>
                                        <option value="mr">Mr.</option>
                                        <option value="ms">Ms.</option>
                                        <option value="mrs">Mrs.</option>
                                    </select>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="First Name" name="fg_fname" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Middle Name" name="fg_mname" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Last Name" name="fg_lname" required>
                                </div>
                                <div class="col-md-1  mb-2">
                                    <input type="text" class="form-control" placeholder="Appellation" name="fg_appell" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <div class="row">
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Postal Code" name="fgpostal">
                                </div>
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Barangay" name="fg_brgy">
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Purok" name="fg_street">
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="City / Municipality" name="fg_city">
                                </div>
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Province" name="fg_prov">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Contact No.</label>
                            <input type="text" class="form-control" name="fg_contact" placeholder="+63">
                        </div>

                        <h5>Admeasurements</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="modifiedFishCorral" name="fg_type" value="MODIFIED FISH CORRAL (Bunsod w/Bintol)">
                            <label class="form-check-label" for="modifiedFishCorral">
                                MODIFIED FISH CORRAL (Bunsod w/Bintol)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="fishCorral" name="fg_type" value="FISH CORRAL (Bunsod)">
                            <label class="form-check-label" for="fishCorral">
                                FISH CORRAL (Bunsod)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="deepSeaFishCorral" name="fg_type" value="DEEP SEA FISH CORRAL (PAUGMAD)">
                            <label class="form-check-label" for="deepSeaFishCorral">
                                DEEP SEA FISH CORRAL (PAUGMAD)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="stationaryBagnet" name="fg_type" value="STATIONARY BAGNET (Bintol, New Look)">
                            <label class="form-check-label" for="stationaryBagnet">
                                STATIONARY BAGNET (Bintol, New Look)
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center mt-2 mb-4">
                            <input class="form-check-input me-2" type="radio" id="othersCheckbox" name="options[]">
                            <label class="form-check-label" for="othersCheckbox">
                                Others:
                            </label>
                            <input type="text" class="form-control ms-2" id="othersText" name="fg_type" placeholder="Specify here..." disabled>
                        </div>

                        <h5>Registered Dimensions</h5>
                        <div class="mb-3">
                            <label class="form-label">Wings:</label>
                            <input type="text" class="form-control" name="fg_wing">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Center Line Net:</label>
                            <input type="text" class="form-control" name="fg_center">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Other Specification:</label>
                            <input type="text" class="form-control" name="fg_other">
                        </div>

                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </div>

                    
                    </div>
                </form>
            </div>
        </div>
        
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
   document.getElementById('othersCheckbox').addEventListener('change', function () {
    const othersText = document.getElementById('othersText');
    othersText.disabled = !this.checked;
    if (!this.checked) othersText.value = ''; // Clear the text field when unchecked
});
</script>
<script>
        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault(); 

            const form = document.getElementById("myForm");

            
            function checkRequiredFields() {
                const requiredFields = form.querySelectorAll("[required]");
                let allFieldsFilled = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        allFieldsFilled = false;
                        field.classList.add("error"); 
                    } else {
                        field.classList.remove("error");
                    }
                });

                return allFieldsFilled;
            }

            if (checkRequiredFields()) {
              
                const formData = new FormData(form);

                fetch('functions/insert.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(response => {
                    if (response.trim() === "success") {
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Your Fishing Gear Application Form is sent to admin, please download the given requirements',
                            confirmButtonText: 'OK',
                            customClass: {
                            popup: 'custom-swal-popup',
                            title: 'custom-swal-title',
                            content: 'custom-swal-content',
                            confirmButton: 'custom-ok-button'
                        }
                        }).then(() => {
                            
                            window.location.href = 'index.php?page=profile';
                        });
                    } else {
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Submission Error',
                            text: response,
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Network Error',
                        text: 'There was an error connecting to the server. Please try again.',
                        confirmButtonText: 'OK'
                    });
                });
            } else {
              
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Form',
                    text: 'Please fill in all required fields before submitting.',
                    confirmButtonText: 'OK'
                });
            }
        });
    </script>


</body>
</html>
