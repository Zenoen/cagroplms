<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipal Fishworker Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/lic_per1.css">
    <link rel="stylesheet" type="text/css" href="../css/modal.css">
    <link rel="stylesheet" type="text/css" href="../css/customs.css">
    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/nxt.js" defer></script>
    <script src="../js/img.js" defer></script>

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
            <h5 class="card-header text-white p-3">Application for PCMP Fish Worker's License</h5>
            <div class="card-body">
                    <form autocomplete="off" id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="form-container overflow-auto">
                        <div class="mb-4">
                            <h5 class="mb-3">Registration Type</h5>
                            <div>
                                <input type="hidden" name="form_type" value="fishworker">
                                <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($userData['email']); ?>">
                                <input type="hidden" name="roles" id="roles" value="fishworker">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="registration_type" value="new" checked>
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
                            <label class="form-label">Complete Name <span class="required">&nbsp;*</span></label>
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
                                    <input type="text" class="form-control" placeholder="First Name" name="fwFname" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Middle Name" name="fwMname" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Last Name" name="fwLname" required>
                                </div>
                                <div class="col-md-1  mb-2">
                                    <input type="text" class="form-control" placeholder="Jr.,Sr.,III." name="fwappel">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address <span class="required">&nbsp;*</span></label>
                            <div class="row">
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Postal Code" name="fwpost" required>
                                </div>
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Barangay" name="fwbrgy" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Street" name="fwstreet" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="City / Municipality" name="fwcity" required>
                                </div>
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Province" name="fwprov" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Contact No. <span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fwcontact" placeholder="+63">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Resident of City/Municipality Since <span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fwresidentsince" placeholder="Indicate Year">
                                </div>

                                <div class="col-md-3 mb-2" hidden>
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control" name="fwage">
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Date of Birth <span class="required">&nbsp;*</span></label>
                                    <input type="date" class="form-control" name="fwdob" max="2001-12-31" required>
                                </div>
                                
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Place of Birth <span class="required">&nbsp;*</span></label>
                            <input type="text" class="form-control" name="fwpob" placeholder="Municipality/City, Province">
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">Gender</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fwgender" id="male" value="Male" checked>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="fwgender" id="female" value="Female">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Height: <span class="required">&nbsp;*</span></label>
                                    <input type="number" class="form-control" name="height" placeholder="ft-in" required>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <label class="form-label">Weight: <span class="required">&nbsp;*</span></label>
                                    <input type="number" class="form-control" name="weight" placeholder="kg" required>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Skin Complexion: <span class="required">&nbsp;*</span></label>
                                    <select class="form-select" name="fwcomplex" required>
                                        <option value="">Select</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Dark">Dark</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Civil Status <span class="required">&nbsp;*</span></label>
                                    <select class="form-select" name="fwciv" required>
                                        <option value="">Select</option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="legally_separated">Legally Separated</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Educational Background <span class="required">&nbsp;*</span></label>
                                    <select class="form-select" name="fweduc" required>
                                        <option value="">Select</option>
                                        <option value="elementary">Elementary</option>
                                        <option value="high_school">High School</option>
                                        <option value="vocational">Vocational</option>
                                        <option value="college">College</option>
                                        <option value="post_graduate">Post Graduate</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label class="form-label">Number of Children:</label>
                                    <input type="text" class="form-control" name="fwchild">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-sm-3 col-form-label">Nationality:</label>
                            <div class="row align-items-center mb-3">
                                <div class="col-sm-3">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="fwnation" id="pinoyYes" value="yes" class="form-check-input">
                                        <label for="pinoyYes" class="form-check-label" checked>Filipino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="fwnation" id="pinoyNo" value="no" class="form-check-input">
                                        <label for="pinoyNo" class="form-check-label">Other</label>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" id="nationalityid" name="fwnation" class="form-control" placeholder="Pls Specify." hidden>
                                </div>
                            </div>
                        </div>


                        <!--EMERGENCY CONTACT SECTION-->
                        <h5>Emergency Contact Information</h5>
                        <div class="row">
                            <div class="col-md-5  mb-2">
                                <label class="form-label">Name: <span class="required">&nbsp;*</span></label>
                                <input type="text" class="form-control" placeholder="First Name, Last Name" name="fwename" required>
                            </div>
                            <div class="col-md-4  mb-2">
                                <label class="form-label">Relationship: <span class="required">&nbsp;*</span></label>
                                <input type="text" class="form-control" name="fwerelation" required>
                            </div>
                            <div class="col-md-3  mb-2">
                                <label class="form-label">Contact Number: <span class="required">&nbsp;*</span></label>
                                <input type="text" class="form-control" placeholder="+63" name="fwecontact" required>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="fwaddress" placeholder="Barangay, Municipal, Province" required>
                        </div>

                        <h5>Role in Aquaculture / Mariculture</h5>
                        <label class="col-sm-3 col-form-label">Caretaker of: <span class="required">&nbsp;*</span></label>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-5 mb-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fwcrtkof" id="growout" value="Grow-out" class="form-check-input" checked>
                                    <label for="growout" class="form-check-label">Grow-Out</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fwcrtkof" id="hatchery" value="Hatchery" class="form-check-input">
                                    <label for="hatchery" class="form-check-label">Hatchery</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fwcrtkof" id="nursery" value="Nursery" class="form-check-input">
                                    <label for="nursery" class="form-check-label">Nursery</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="fwcrtkof" id="othersculture" value="no" class="form-check-input">
                                    <label for="othersculture" class="form-check-label">Others</label>
                                </div>
                            </div>
                            <div class="col-md-7">
                            <input type="text" id="aquacultureInput" class="form-control" placeholder="Pls.Specify." hidden>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6  mb-2">
                                <label class="form-label">Caretaker Since:<span class="required">&nbsp;*</span></label>
                                <input type="text" class="form-control" name="caretakersince" placeholder="Indicate Year">
                            </div>
                            <div class="col-md-6  mb-2">
                                <label class="form-label">Location:<span class="required">&nbsp;*</span></label>
                                <input type="text" class="form-control" name="location" placeholder="Barangay">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-4 col-form-label"><strong>Aquaculture Structures/Gears/Mariculture:<span class="required">&nbsp;*</span></strong></label>
                            <div class="row align-items-center mb-3">
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="fwaqua" id="fishcage" value="Fishcage" class="form-check-input"checked>
                                        <label for="fishcage" class="form-check-label">Fishcage</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="fwaqua" id="fishpond" value="Fishpond" class="form-check-input">
                                        <label for="fishpond" class="form-check-label">Fishpond</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="fla" name="fwaqua2" class="form-check-input" checked>
                                        <label for="fla" class="form-check-label">FLA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="private" name="fwaqua2" class="form-check-input">
                                        <label for="private" class="form-check-label">Private</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Total Units Manage:<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fwunits">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Area/Dimension per unit:<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fwunitsdim">
                                </div>
                            </div>
                        </div>


                    <!--PRESEMT EMPLOYMENT SECTION-->
                    <h5>Present Employment</h5>
                    <div class="row mb-4">
                        <div class="col-md-4  mb-2">
                            <label class="form-label">Name of Locator:<span class="required">&nbsp;*</span></label>
                            <input type="text" class="form-control" name="locfname" placeholder="First Name, Last Name" required>
                        </div>
                        <div class="col-md-2  mb-2">
                            <label class="form-label">No. Units Owned:<span class="required">&nbsp;*</span></label>
                            <input type="number" class="form-control" name="locunits" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label class="form-label">Address of Locator:<span class="required">&nbsp;*</span></label>
                            <input type="text" class="form-control" name="locprov" placeholder="Barangay, Municipal, Province" required>
                        </div>
                    </div>

                    <!--OTHER INFORMATION SECTION-->
                    <h5>Other Information</h5>
                    <div class="mb-3">
                        <label class="form-label">
                            1. Have you ever been dismissed from the military/civil service for cause, or found guilty of crime involving moral turpitude, or of infamous, disgraceful or immoral conduct, drunkenness or addiction to drugs, or of offenses relative to or in connection with the conduct of a civil right?
                        </label>
                        <div class="form-check">
                            <input type="radio" id="q1Yes" name="q1" class="form-check-input">
                            <label for="q1Yes" name="fwother1" class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="q1No" name="q1" class="form-check-input" checked>
                            <label for="q1No" name="fwother1" class="form-check-label">No</label>
                        </div>
                        <div id="q1Details" class="mt-2" style="display: none;">
                            <label for="q1Attachment" class="form-label">If YES, attach a copy of the decision:</label>
                            <input type="file" name="fwother1" id="q1Attachment" class="form-control">
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="mb-4">
                        <label class="form-label">
                        2. Pursuant to RA 8371 and RA 7277, please answer the following items:
                        </label>
                        <!-- Sub-question 2a -->
                        <div class="mb-2">
                        <p>2a. Are you a member of any indigenous group?</p>
                        <div class="form-check">
                            <input type="radio" id="q2aYes" name="fwother2" class="form-check-input">
                            <label for="q2aYes" class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="q2aNo" name="fwother2" name="fwother1" class="form-check-input" checked>
                            <label for="q2aNo" class="form-check-label">No</label>
                        </div>
                        <div id="q2aDetails" class="mt-2" style="display: none;">
                            <label for="q2aSpecify" class="form-label" name="fwother2">If YES, please specify:</label>
                            <input type="text" id="q2aSpecify" name="fwother2" class="form-control" placeholder="Specify indigenous group">
                        </div>
                        </div>

                        <!-- Sub-question 2b -->
                        <div class="mb-2">
                        <p>2b. Are you differently abled or physically challenged?</p>
                        <div class="form-check">
                            <input type="radio" id="q2bYes" name="fwother3" class="form-check-input">
                            <label for="q2bYes" class="form-check-label">Yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="q2bNo" name="fwother3" class="form-check-input" checked>
                            <label for="q2bNo" class="form-check-label">No</label>
                        </div>
                        <div id="q2bDetails" class="mt-2" style="display: none;">
                            <label for="q2bSpecify" class="form-label">If YES, please specify:</label>
                            <input type="text" id="q2bSpecify" name="fwother3" class="form-control" placeholder="Specify condition">
                        </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success float-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const q1Yes = document.getElementById('q1Yes');
    const q1No = document.getElementById('q1No');
    const q1Details = document.getElementById('q1Details');
    const q2aYes = document.getElementById('q2aYes');
    const q2aNo = document.getElementById('q2aNo');
    const q2aDetails = document.getElementById('q2aDetails');
    const q2bYes = document.getElementById('q2bYes');
    const q2bNo = document.getElementById('q2bNo');
    const q2bDetails = document.getElementById('q2bDetails');

    // Toggle details for Question 1
    q1Yes.addEventListener('change', () => q1Details.style.display = 'block');
    q1No.addEventListener('change', () => q1Details.style.display = 'none');

    // Toggle details for Question 2a
    q2aYes.addEventListener('change', () => q2aDetails.style.display = 'block');
    q2aNo.addEventListener('change', () => q2aDetails.style.display = 'none');

    // Toggle details for Question 2b
    q2bYes.addEventListener('change', () => q2bDetails.style.display = 'block');
    q2bNo.addEventListener('change', () => q2bDetails.style.display = 'none');
  });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const othersRadio = document.getElementById('others');
    const inputField = document.getElementById('aquacultureInput');
    const allRadios = document.querySelectorAll('input[name="aquacultureRole"]');

    // Add event listener for all radio buttons
    allRadios.forEach(radio => {
      radio.addEventListener('change', function () {
        if (othersRadio.checked) {
          inputField.hidden = false; // Show input field
        } else {
          inputField.hidden = true; // Hide input field
          inputField.value = ''; // Clear input field
        }
      });
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
                                text: 'Your Fishworker Application Form is sent to admin, please download the given requirements',
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
