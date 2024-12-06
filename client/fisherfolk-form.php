<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipal Fisherfolk Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>
    <script src="path/to/zipcodes-ph/build/index.umd.min.js"></script>
    


</head>
    <style>
        .form-container {
            padding: 15px; /* Padding inside the border */
        }
        label
        {
            font-weight: 400;
            font-size: 14px !important;
        }
        .card-header
        {
            background-color: #024072;
        }
        .required
        {
            font-weight: bolder;
            color:red;
        }
    </style>
<body>
    <div class="container py-3">
        <div class="card">
        <h5 class="card-header text-white p-3">Application for Municipal Fisher Folk Registration</h5>
        <div class="card-body">
        <form autocomplete="off" id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-container overflow-auto">
                
                <div class="mb-5">
                    <input type="hidden" name="form_type" value="fisherfolk">
                    <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($userData['email']); ?>">
                    <input type="hidden" name="roles" id="roles" value="fisherfolk">
                    <h5 class="mb-3">Registration Type</h5>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="registration_type" value="new" id="new" checked>
                            <label class="form-check-label" for="new">New Registration</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="registration_type" value="renewal" id="renew">
                            <label class="form-check-label" for="renew">Renewal</label>
                        </div>
                    </div>
                </div>

                <h5>Personal Information</h5>
                <div class="mb-3">
                    <label class="form-label">Complete Name <span class="required">&nbsp;*</span></label>
                    <div class="row">
                        <div class="col-md-2  mb-3">
                            <select class="form-select" name="salutation">
                                <option value="">Salutation</option>
                                <option value="mr">Mr.</option>
                                <option value="ms">Ms.</option>
                                <option value="mrs">Mrs.</option>
                            </select>
                        </div>
                        <div class="col-md-3  mb-3">
                            <input type="text" class="form-control" placeholder="First Name" name="fffname" required value="<?php echo htmlspecialchars($fisherfolkData['ff_fname'] ?? ''); ?>">
                        </div>
    
                        <div class="col-md-3  mb-3">
                            <input type="text" class="form-control" placeholder="Middle Name" name="ffmname" required value="<?php echo htmlspecialchars($fisherfolkData['ff_mname'] ?? ''); ?>">
                        </div>
                        <div class="col-md-3  mb-3">
                            <input type="text" class="form-control" placeholder="Last Name" name="fflname" required value="<?php echo htmlspecialchars($fisherfolkData['ff_lname'] ?? ''); ?>">
                        </div>
                        <div class="col-md-1  mb-3">
                            <input type="text" class="form-control" placeholder="Jr.,Sr.,III." name="ffappell" required value="<?php echo htmlspecialchars($fisherfolkData['ff_appell'] ?? ''); ?>">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address <span class="required">&nbsp;*</span></label>
                    <div class="row">
                        <div class="col-md-2  mb-3">
                            <input type="text" id="postal" class="form-control" placeholder="Postal Code" name="fpostal" required  value="<?php echo htmlspecialchars($fisherfolkData['ff_postall'] ?? ''); ?>">
                        </div>
                        <div class="col-md-2  mb-3">
                            <input type="text" id="brgy" class="form-control" placeholder="Barangay" name="ffbrgy" required value="<?php echo htmlspecialchars($fisherfolkData['ff_prov'] ?? ''); ?>">
                        </div>
                        <div class="col-md-3  mb-3">
                            <input type="text" id="strt" class="form-control" placeholder="Street" name="ffstreet" required>
                        </div>
                        <div class="col-md-3  mb-3">
                            <input type="text" id="city" class="form-control" placeholder="City / Municipality" name="ffcity" required>
                        </div>
                        <div class="col-md-2  mb-3">
                            <input type="text" id="ffprov" class="form-control" placeholder="Province" name="ffprov" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact No. <span class="required">&nbsp;*</span></label>
                            <input type="text" class="form-control" name="ffcontact" placeholder="+63">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Date of Birth <span class="required">&nbsp;*</span></label>
                            <input type="date" class="form-control" name="ffdob" max="2001-12-31" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Resident of Municipality Since <span class="required">&nbsp;*</span></label>
                            <input type="text" class="form-control" name="ffresidence" placeholder="Indicate Year" required>
                        </div>
                    </div>
                </div>
            
                <div class="mb-3" hidden>
                    <label class="form-label">Age</label>
                    <input type="text" class="form-control" name="ffage">
                </div>

                <div class="mb-3">
                    <label class="form-label">Place of Birth <span class="required">&nbsp;*</span></label>
                    <input type="text" class="form-control" name="ffpob" placeholder="Municipality/City, Province" required>
                </div>
                            
                <div class="mb-3">
                    <div class="row">
                        <!-- Gender -->
                        <div class="col-md-2 mb-2">
                            <label class="form-label">Gender</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="male" name="ffgender" value="Male" checked>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="female" name="ffgender" value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <!-- Nationality -->
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Nationality</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="ffnation" id="pinoyYes" value="Filipino" class="form-check-input" checked>
                                    <label for="pinoyYes" class="form-check-label">Filipino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="pinoyNo" name="ffnation" class="form-check-input">
                                    <label for="pinoyNo" class="form-check-label">Other</label>
                                </div>
                                <div>
                                    <input type="text" id="nationalityid" class="form-control" name="ffnation" placeholder="Pls Specify." hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Civil Status <span class="required">&nbsp;*</span></label>
                            <select class="form-select" name="ffciv" required>
                                <option value="">Select</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Legally Separated">Legally Separated</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Educational Background <span class="required">&nbsp;*</span></label>
                            <select class="form-select" name="ffeduc" required>
                                <option value="">Select</option>
                                <option value="Elementary">Elementary</option>
                                <option value="High School">High School</option>
                                <option value="Vocational">Vocational</option>
                                <option value="College">College</option>
                                <option value="Post_graduate">Post Graduate</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">On Number of Household Members</label>
                    <div class="row">
                        <div class="col-md-2  mb-2">
                            <input type="text" class="form-control" placeholder="No.Children" name="ffchild">
                        </div>
                        <div class="col-md-2  mb-2">
                            <input type="text" class="form-control" placeholder="No. of Male" name="ffmale">
                        </div>
                        <div class="col-md-2  mb-2">
                            <input type="text" class="form-control" placeholder="No. of Female" name="fffemale">
                        </div>
                        <div class="col-md-2  mb-2">
                            <input type="text" class="form-control" placeholder="No. of In-School" name="ffinschool">
                        </div>
                        <div class="col-md-2  mb-2">
                            <input type="text" class="form-control" placeholder="No. of Out-School" name="ffoutschool">
                        </div>
                        <div class="col-md-2  mb-2">
                            <input type="text" class="form-control" placeholder="No. of Employed" name="ffemployed">
                        </div>
                        <div class="col-md-2  mb-2">
                            <input type="text" class="form-control" placeholder="No. of Unemployed" name="ffunemployed">
                        </div>
                    </div>
                </div>

                
                <div class="mb-3">
                    <label class="form-label">Household Monthly Income <span class="required">&nbsp;*</span></label>
                    <input type="text" class="form-control" name="ffmonthin" placeholder="PHP" >
                </div>

                <div class="mb-4">
                    <label class="form-label">Other Sources of Income:</label>
                    <div class="row">
                        <div class="col-md-3  mb-2">
                            <label class="form-label">Farming:</label>
                            <input type="text" class="form-control" name="fffarm">
                        </div>
                        <div class="col-md-3  mb-2">
                            <label class="form-label">Income Value:</label>
                            <input type="number" class="form-control" name="fffarmin" placeholder="PHP">
                        </div>
                        <div class="col-md-3  mb-2">
                            <label class="form-label">Non-Farming:</label>
                            <input type="text" class="form-control" name="ffnfarm">
                        </div>
                        <div class="col-md-3  mb-2">
                            <label class="form-label">Income Value:</label>
                            <input type="number" class="form-control" name="ffnfarmin" placeholder="PHP">
                        </div>
                    </div>
                </div>


                <!--EMERGENCY CONTACT SECTION-->
                <h5>Emergency Contact Information</h5>
                <div class="row">
                    <div class="col-md-5  mb-2">
                        <label class="form-label">Name:<span class="required">&nbsp;*</span></label>
                        <input type="text" class="form-control" placeholder="First Name, Last Name" name="ffename" required>
                    </div>
                    <div class="col-md-4  mb-2">
                        <label class="form-label">Relationship:<span class="required">&nbsp;*</span></label>
                        <input type="text" class="form-control" name="fferelation" required>
                    </div>
                    <div class="col-md-3  mb-2">
                        <label class="form-label">Contact Number:<span class="required">&nbsp;*</span></label>
                        <input type="number" class="form-control" placeholder="+63" name="ffecontact" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address<span class="required">&nbsp;*</span></label>
                    <input type="text" class="form-control" name="ffeaddress" placeholder="Barangay, Municipal, Province" required>
                </div>

                <!--INCLUSION SECTION-->
                <h5>Inclusion</h5>
                <div class="row mb-4">
                    <!-- With Voter's ID -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">With Voter's ID: </label>
                        <div>
                            <input type="radio" name="votersId" id="voterYes" class="form-check-input">
                            <label for="voterYes" class="form-check-label">Yes</label>
                            <input type="radio" name="votersId" id="voterNo" value="None" class="form-check-input ms-3">
                            <label for="voterNo" class="form-check-label">None</label>
                        </div>
                        <input type="text" id="idNumber"  name="votersId" class="form-control mt-2" placeholder="ID No." hidden>
                    </div>

                    <!-- CCT / 4Ps Beneficiary -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label">CCT / 4Ps Beneficiary?</label>
                        <div>
                            <input type="radio" name="4ps" id="cctYes" value="yes" class="form-check-input">
                            <label for="cctYes" class="form-check-label">Yes</label>
                            <input type="radio" name="4ps" id="cctNo" value="no" class="form-check-input ms-3">
                            <label for="cctNo" class="form-check-label">No</label>
                        </div>
                    </div>

                    <!-- Indigenous Cultural Community -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Indigenous Cultural Community (IP)?</label>
                        <div>
                            <input type="radio" name="ip" id="ipYes" value="yes" class="form-check-input">
                            <label for="ipYes" class="form-check-label">Yes</label>
                            <input type="radio" name="ip" id="ipNo" value="no" class="form-check-input ms-3">
                            <label for="ipNo" class="form-check-label">No</label>
                        </div>
                    </div>

                    <!-- SAAD Area -->
                    <div class="col-md-2 mb-3">
                        <label class="form-label">SAAD Area?</label>
                        <div>
                            <input type="radio" name="saad" id="saadYes" value="yes" class="form-check-input">
                            <label for="saadYes" class="form-check-label">Yes</label>
                            <input type="radio" name="saad" id="saadNo" value="no" class="form-check-input ms-3">
                            <label for="saadNo" class="form-check-label">No</label>
                        </div>
                    </div>
                </div>

                <!--LIVELIHOOD SECTION-->
                <h5>Livelihood</h5>
                <div class="row mb-4">
                <!-- Main Source of Income -->
                <div class="col-md-6 mb-3">
                    <h6>Main Source of Income: <span class="required">&nbsp;*</span></h6>
                    <div class="form-check mb-2">
                        <input type="radio" id="mainCaptureFishing" name="mainincome" class="form-check-input">
                        <label for="mainCaptureFishing" class="form-check-label">
                        Capture Fishing (Specify gear used)
                        </label>
                        <input type="text" id="mainCaptureFishingInput" name="mainincome" value="Capture Fishing"  class="form-control mt-2" placeholder="Specify gear used" disabled>
                    </div>
                    <div class="form-check mb-2">
                        <input type="radio" id="mainAquaculture" name="mainincome" class="form-check-input">
                        <label for="mainAquaculture" class="form-check-label" name="mainincome">
                        Aquaculture (Specify culture method used)
                        </label>
                        <input type="text" value="Aquaculture" name="mainincome" id="mainAquacultureInput" class="form-control mt-2" placeholder="Specify culture method used" disabled>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="mainFishVending" name="mainincome" value="Fish Vending" class="form-check-input">
                        <label for="mainFishVending" class="form-check-label">Fish Vending</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" value="Gleaning" id="mainGleaning" name="mainincome" class="form-check-input">
                        <label for="mainGleaning" class="form-check-label">Gleaning</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="mainFishProcessing" name="mainincome" value="Fish Processing" class="form-check-input">
                        <label for="mainFishProcessing"  class="form-check-label">Fish Processing</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="radio" id="mainOthers" name="mainincome" class="form-check-input">
                        <label for="mainOthers" class="form-check-label">Others (Please specify)</label>
                        <input type="text" id="mainOthersInput" name="mainincome" class="form-control mt-2" placeholder="Specify other source" disabled>
                    </div>
                </div>

                <!-- Other Sources of Income -->
                <div class="col-md-6">
                    <h6>Other Sources of Income:</h6>
                    <div class="form-check mb-2">
                        <input type="radio" id="otherCaptureFishing" name="otherincome" class="form-check-input">
                        <label for="otherCaptureFishing" class="form-check-label">
                        Capture Fishing (Specify gear used)
                        </label>
                        <input type="text" id="otherCaptureFishingInput" name="otherincome" value="Capture Fishing" class="form-control mt-2" placeholder="Specify gear used" disabled>
                    </div>
                    <div class="form-check mb-2">
                        <input type="radio" id="otherAquaculture" name="otherincome" class="form-check-input">
                        <label for="otherAquaculture" class="form-check-label">
                        Aquaculture (Specify culture method used)
                        </label>
                        <input type="text" id="otherAquacultureInput" name="otherincome" value="Aquaculture" class="form-control mt-2" placeholder="Specify culture method used" disabled>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="otherFishVending" name="otherincome" value="Fish Vending" class="form-check-input">
                        <label for="otherFishVending" class="form-check-label">Fish Vending</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="otherGleaning" name="otherincome"  value="Gleaning" class="form-check-input">
                        <label for="otherGleaning" class="form-check-label">Gleaning</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="otherFishProcessing" name="otherincome" value="Fish Processing" class="form-check-input">
                        <label for="otherFishProcessing" class="form-check-label">Fish Processing</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="radio" id="otherOthers" name="otherincome" class="form-check-input" >
                        <label for="otherOthers" class="form-check-label">Others (Please specify)</label>
                        <input type="text" id="otherOthersInput" name="otherincome" class="form-control mt-2" placeholder="Specify other source" disabled>
                    </div>
                </div>
            </div>

            <h5>Organization</h5>
            <div class="row mb-3">
                <div class="col-md-5  mb-2">
                    <label class="form-label">Name of Organization: <span class="required">&nbsp;*</span></label>
                    <input type="text" class="form-control" name="fforg" required>
                </div>
                <div class="col-md-4  mb-2">
                    <label class="form-label">Member Since:<span class="required">&nbsp;*</span></label>
                    <input type="text" class="form-control" name="ffmemberyear" required>
                </div>
                <div class="col-md-3  mb-2">
                    <label class="form-label">Position/Official Designation:<span class="required">&nbsp;*</span></label>
                    <input type="text" class="form-control" name="fforgpos" required>
                </div>
            </div>
      
            <button type="submit" class="btn btn-success float-end" name="submit">Submit</button>
            </div>
        </form>
        </div>
        
        </div>
        
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const idNumberField = document.getElementById('idNumber');
            const voterYes = document.getElementById('voterYes');
            const voterNo = document.getElementById('voterNo');

            // Function to toggle visibility of ID Number field
            function toggleIdField() {
                if (voterYes.checked) {
                    idNumberField.hidden = false; // Show the field
                } else {
                    idNumberField.hidden = true; // Hide the field
                    idNumberField.value = ''; // Clear its value
                }
            }

            // Add event listeners to radio buttons
            voterYes.addEventListener('change', toggleIdField);
            voterNo.addEventListener('change', toggleIdField);

            // Ensure the field is hidden on page load
            idNumberField.hidden = true;
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const pinoyYes = document.getElementById("pinoyYes");
        const pinoyNo = document.getElementById("pinoyNo");
        const nationalityField = document.getElementById("nationalityid");

        // Function to toggle the visibility of the "Pls Specify" field
        function toggleNationalityField() {
            if (pinoyYes.checked) {
                nationalityField.hidden = true; // Hide the field
                nationalityField.value = ""; // Clear any existing value
            } else if (pinoyNo.checked) {
                nationalityField.hidden = false; // Show the field
            }
        }

        // Add event listeners to the radio buttons
        pinoyYes.addEventListener("change", toggleNationalityField);
        pinoyNo.addEventListener("change", toggleNationalityField);
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Array of input groups for Main Source of Income
    const mainIncomeInputs = [
        { radio: 'mainCaptureFishing', text: 'mainCaptureFishingInput' },
        { radio: 'mainAquaculture', text: 'mainAquacultureInput' },
        { radio: 'mainOthers', text: 'mainOthersInput' },
    ];

    // Array of input groups for Other Sources of Income
    const otherIncomeInputs = [
        { radio: 'otherCaptureFishing', text: 'otherCaptureFishingInput' },
        { radio: 'otherAquaculture', text: 'otherAquacultureInput' },
        { radio: 'otherOthers', text: 'otherOthersInput' },
    ];

    // Function to toggle input fields
    function toggleInputs(inputs, selectedRadio) {
        inputs.forEach(({ radio, text }) => {
            const radioElement = document.getElementById(radio);
            const textElement = document.getElementById(text);

            if (radioElement && textElement) {
                textElement.disabled = !radioElement.checked;
                if (!radioElement.checked) {
                    textElement.value = ''; // Clear the input when disabled
                }
            }
        });
    }

    // Add event listeners for Main Source of Income radios
    mainIncomeInputs.forEach(({ radio }) => {
        const radioElement = document.getElementById(radio);
        if (radioElement) {
            radioElement.addEventListener('change', () => {
                toggleInputs(mainIncomeInputs, radio);
            });
        }
    });

    // Add event listeners for Other Sources of Income radios
    otherIncomeInputs.forEach(({ radio }) => {
        const radioElement = document.getElementById(radio);
        if (radioElement) {
            radioElement.addEventListener('change', () => {
                toggleInputs(otherIncomeInputs, radio);
            });
        }
    });
});

</script>

<script>function initAutocomplete() {
    const autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocomplete'),
        { types: ['geocode'] } // You can restrict types if needed
    );

    autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();
        console.log(place);
        // Use place.address_components to fill other fields (e.g., city, postal code).
    });
}</script>

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
                                text: 'Your Fisherfolk Application Form is sent to admin, please download the given requirements',
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
