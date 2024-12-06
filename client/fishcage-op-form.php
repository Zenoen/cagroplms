<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Cage Operator Registration</title>
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
            <h4 class="card-header text-white p-3">Application for Registration To Operate Marine Fish Cage</h4>
            <div class="card-body">
                <form autocomplete="off" id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-container overflow-auto">
                    <div class="mb-4">
                        <h5>Permit Type</h5>
                        <div>
                        <input type="hidden" name="form_type" value="fishcage">
                        <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($userData['email']); ?>">
                        <input type="hidden" name="roles" id="roles" value="fishcage">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="registration_type" value="new" id="new">
                                <label class="form-check-label" for="new">New Registration</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="registration_type" value="renewal" id="renewal">
                                <label class="form-check-label" for="renewal">Renewal</label>
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
                                <input type="text" class="form-control" placeholder="First Name" name="fcfname" required>
                            </div>
                            <div class="col-md-3  mb-2">
                                <input type="text" class="form-control" placeholder="Middle Name" name="fcmname" required>
                            </div>
                            <div class="col-md-3  mb-2">
                                <input type="text" class="form-control" placeholder="Last Name" name="fclname" required>
                            </div>
                            <div class="col-md-1  mb-2">
                                <input type="text" class="form-control" placeholder="Appellation" name="fcapp" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <div class="row">
                            <div class="col-md-2  mb-2">
                                <input type="number" class="form-control" placeholder="Postal Code" name="fpostal">
                            </div>
                            <div class="col-md-2  mb-2">
                                <input type="text" class="form-control" placeholder="Barangay" name="fcbrgy">
                            </div>
                            <div class="col-md-3  mb-2">
                                <input type="text" class="form-control" placeholder="Purok" name="fcstrt">
                            </div>
                            <div class="col-md-3  mb-2">
                                <input type="text" class="form-control" placeholder="City / Municipality" name="fccity">
                            </div>
                            <div class="col-md-2  mb-2">
                                <input type="text" class="form-control" placeholder="Province" name="fcprov">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact No.</label>
                        <input type="number" class="form-control" name="fccon" placeholder="+63">
                    </div>

                
                    <div class="mb-4">
                        <label class="col-sm-3 col-form-label">Citizenship:</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-sm-2">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="fcciv" id="pinoyYes" value="yes" class="form-check-input">
                                <label for="pinoyYes" class="form-check-label">Filipino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="fcciv" id="pinoyNo" value="no" class="form-check-input">
                                <label for="pinoyNo" class="form-check-label">Other</label>
                            </div>
                            </div>
                            <div class="col-sm-10">
                            <input type="text" id="nationalityid" name="fcciv" class="form-control" placeholder="Pls Specify." hidden>
                            </div>
                        </div>
                    </div>

                    <h5>Investment Category</h5>
                    <div class="mb-3">
                        <h6>Zone A</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="zoneA1" name="fccat" value="Marginalized Sectors (1 unit)">
                            <label class="form-check-label" for="zoneA1">
                                Marginalized Sectors (1 unit)
                            </label>
                        </div>
                    </div>

                    <!-- Zone B -->
                    <div class="mb-3">
                        <h6>Zone B</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="zoneB1" name="fccat" value="Small Locators Investor (2-8 units - individual/family)">
                            <label class="form-check-label" for="zoneB1">
                                Small Locators Investor (2-8 units - individual/family)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="zoneB2" name="fccat" value="Small Local Investor (2-12 units - Cooperatives/Association)">
                            <label class="form-check-label" for="zoneB2">
                                Small Local Investor (2-12 units - Cooperatives/Association)
                            </label>
                        </div>
                    </div>

                    <!-- Zone C -->
                    <div class="mb-4">
                        <h6>Zone C</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="zoneC1" name="fccat" value="Big Locators Investor (9-20 units - individual/family)">
                            <label class="form-check-label" for="zoneC1">
                                Big Locators Investor (9-20 units - individual/family)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="zoneC2" name="fccat" value="Big Locators Investor (13-20 units - Cooperative/Organization)">
                            <label class="form-check-label" for="zoneC2">
                                Big Locators Investor (13-20 units - Cooperative/Organization)
                            </label>
                        </div>
                    </div>

                    <h6>Business Information:</h6>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-3  mb-2">
                                <label class="form-label" for="businessname">Business Name:</label>
                                <input type="text" class="form-control" name="fcbname" required id="businessname">
                            </div>
                            <div class="col-md-9  mb-2">
                                <label class="form-label" for="businessadd">Business Address:</label>
                                <input type="text" class="form-control" name="fcbadd" required id="businessadd">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="col-sm-3 col-form-label">Business Registration:</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="fcbreg" id="dti" value="DTI" class="form-check-input">
                                <label for="dti" class="form-check-label">DTI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="fcbreg" id="sec" value="SEC" class="form-check-input">
                                <label for="sec" class="form-check-label">SEC</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="fcbreg" id="cda" value="CDA" class="form-check-input">
                                <label for="cda" class="form-check-label">CDA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="fcbreg" id="lgu" value="no" class="form-check-input">
                                <label for="lgu" class="form-check-label">LGU</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="fcbreg" id="otherreg" value="no" class="form-check-input">
                                <label for="otherreg" class="form-check-label">Other</label>
                            </div>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="otherregid" name="fcbreg" class="form-control" placeholder="Pls Specify." hidden>
                            </div>
                        </div>
                    </div>

                    <h5>Technical/Project Descriptions:</h5>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Type of Marine Fishcage:</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-sm-4">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fccage" id="bamboo" value="Bamboo" class="form-check-input">
                                    <label for="bamboo" class="form-check-label">Bamboo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fccage" id="glpipe" value="GL Pipe" class="form-check-input">
                                    <label for="glpipe" class="form-check-label">GL Pipe</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fccage" id="anahaw" value="Anahaw" class="form-check-input">
                                    <label for="anahaw" class="form-check-label">Anahaw</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fccage" id="othercage" class="form-check-input">
                                    <label for="othercage" class="form-check-label">Other</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="othercageid" name="fccage" class="form-control" placeholder="Pls Specify." hidden>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="units">Number of Units:</label>
                        <input type="number" class="form-control" name="fcunits" id="units">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cage Dimension/Size:</label>
                        <div class="d-flex gap-3">
                        <h6>Square:</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="4sq" name="fcdem" value="4x4x4m">
                                <label class="form-check-label" for="4sq">
                                    4x4x4m
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="6sq" name="fcdem" value="6x6x6m">
                                <label class="form-check-label" for="6sq">
                                    6x6x6m
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="10sq" name="fcdem" value="10x10x4m">
                                <label class="form-check-label" for="10sq">
                                    10x10x4m
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex gap-3">
                        <h6>Circle:</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="10m" name="fcdem" value="10-20m">
                                <label class="form-check-label" for="10m">
                                    10-20m
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="20m" name="fcdem" value="20-40m">
                                <label class="form-check-label" for="20m">
                                    21-40m
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fish Cage Inteded For:</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="growout" name="fcint" value="Grow-out">
                                <label class="form-check-label" for="growout">
                                    Grow-out
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="conditioning" name="fcint" value="Conditioning Cage">
                                <label class="form-check-label" for="conditioning">
                                    Conditioning Cage
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="research" name="fcint" value="Research">
                                <label class="form-check-label" for="research">
                                    Research
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="col-sm-3 col-form-label">Kinds of Species to be Cultured :</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-sm-4">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fccul" id="bangus" value="Bangues" class="form-check-input">
                                    <label for="bangus" class="form-check-label">Bangus</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fccul" id="dangit" value="Dangit" class="form-check-input">
                                    <label for="dangit" class="form-check-label">Dangit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fccul" id="otherspecies" class="form-check-input">
                                    <label for="otherspecies" class="form-check-label">Other</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="otherspeciesid" name="fccul" class="form-control" placeholder="Pls Specify." hidden>
                            </div>
                        </div>
                    </div>

                    <h5>Financial Aspect</h5>
                    <div class="mb-3">
                        <label class="form-label" for="capinvestment">Capital Investment Amount:</label>
                        <input type="number" class="form-control" name="fccap" id="capinvestment" placeholder="PHP">
                    </div>

                    <div class="mb-4">
                        <label class="col-sm-5 col-form-label">Source of Capitalization/Working Capital/Investment:</label>
                        <div class="row align-items-center mb-3">
                            <div class="col-sm-4">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fcsrc" id="savings" value="Savings" class="form-check-input">
                                    <label for="savings" class="form-check-label">Savings</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fcsrc" id="loan" value="Loan" class="form-check-input">
                                    <label for="loan" class="form-check-label">Loan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fcsrc" id="otherinv" class="form-check-input">
                                    <label for="otherinv" class="form-check-label">Other</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="otherinvid" name="fcsrc" class="form-control" placeholder="Pls Specify." hidden>
                            </div>
                        </div>
                    </div>

                    <h5>Environmental Aspect</h5>

                    <div class="mb-2 text-justify">
                        <p class="text-justify">&emsp;&emsp;&emsp;&emsp;I agree to follow proper garbage disposal, waste management, and other Aquaculture Practices and Code of Conduct for Responsible Aquaculture/Marine Fish Cage operation to safeguard the marine environment for sustainable and other operations of the project.
                        </p>
                        <p class="text-justify">&emsp;&emsp;&emsp;&emsp;I have personally reviewed the information on this application and I certify under penalty of perjury that, to the best of my knowledge and belief, the information on this application is true and correct, and that I understand this information is subject to public disclosure.
                        </p>
                    </div>
                    
                    <div class="form-check mb-5">
                        <input class="form-check-input" type="checkbox" id="agreeCheckbox" required>
                        <label class="form-check-label fw-bold" for="agreeCheckbox">
                            By ticking, you are confirming that you have read, understood and agree to the terms stated above.
                        </label>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the radio buttons and the "Other" input field
        const radioButtons = document.querySelectorAll('input[name="businessreg"]');
        const otherInput = document.getElementById('otherregid');

        // Add an event listener to each radio button
        radioButtons.forEach((radio) => {
            radio.addEventListener('change', function () {
                if (this.id === 'otherreg' && this.checked) {
                    // Show the "Other" input field
                    otherInput.hidden = false;
                } else {
                    // Hide the "Other" input field
                    otherInput.hidden = true;
                    // Clear the "Other" input field value
                    otherInput.value = '';
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the radio buttons and the "Other" input field
        const radioButtons = document.querySelectorAll('input[name="cagetype"]');
        const otherInput = document.getElementById('othercageid');

        // Add an event listener to each radio button
        radioButtons.forEach((radio) => {
            radio.addEventListener('change', function () {
                if (this.id === 'othercage' && this.checked) {
                    // Show the "Other" input field
                    otherInput.hidden = false;
                } else {
                    // Hide the "Other" input field
                    otherInput.hidden = true;
                    // Clear the "Other" input field value
                    otherInput.value = '';
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the radio buttons and the "Other" input field
        const radioButtons = document.querySelectorAll('input[name="culturedspecies"]');
        const otherInput = document.getElementById('otherspeciesid');

        // Add an event listener to each radio button
        radioButtons.forEach((radio) => {
            radio.addEventListener('change', function () {
                if (this.id === 'otherspecies' && this.checked) {
                    // Show the "Other" input field
                    otherInput.hidden = false;
                } else {
                    // Hide the "Other" input field
                    otherInput.hidden = true;
                    // Clear the "Other" input field value
                    otherInput.value = '';
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the radio buttons and the "Other" input field
        const radioButtons = document.querySelectorAll('input[name="sourceinv"]');
        const otherInput = document.getElementById('otherinvid');

        // Add an event listener to each radio button
        radioButtons.forEach((radio) => {
            radio.addEventListener('change', function () {
                if (this.id === 'otherinv' && this.checked) {
                    // Show the "Other" input field
                    otherInput.hidden = false;
                } else {
                    // Hide the "Other" input field
                    otherInput.hidden = true;
                    // Clear the "Other" input field value
                    otherInput.value = '';
                }
            });
        });
    });
</script>

<script>
        $(document).ready(function() {
            // Prevent form submission on Enter key press
            $('#registrationForm').on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
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
                                text: 'Your Fishcage Application Form is sent to admin, please download the requirements.',
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
                // If required fields are not filled, show an error alert
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
