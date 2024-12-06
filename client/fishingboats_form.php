<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fishing Vessel Registration</title>

    <link rel="stylesheet" href="../includes/sweetalert2.min.css">
    <script src="../includes/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        <h5 class="card-header text-white p-3">Municipal Fishing Vessel Registration Form</h5>
            <div class="card-body">
            <form autocomplete="off" id="myForm" action="functions/insert.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="form-container overflow-auto">
                        <div class="mb-4">
                            <h5 class="mb-3">Registration Type</h5>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="registration_type" value="new" id="new" checked>
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
                            <label class="form-label">Complete Name of Owner/Operator <span class="required">&nbsp;*</span></label>
                            <input type="hidden" name="form_type" value="fishingboat">
                            <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($userData['email']); ?>">

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
                                    <input type="text" class="form-control" placeholder="First Name" name="fbopfname" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Middle Name" name="fbopmname" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Last Name" name="fboplname" required>
                                </div>
                                <div class="col-md-1  mb-2">
                                    <input type="text" class="form-control" placeholder="Appellation" name="fbopappel" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address <span class="required">&nbsp;*</span></label>
                            <div class="row">
                                <div class="col-md-2  mb-2">
                                    <input type="number" class="form-control" placeholder="Postal Code" name="fbpostal " required>
                                </div>
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Barangay" name="fbopbrgy" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="Purok" name="fbopstreet" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <input type="text" class="form-control" placeholder="City / Municipality" name="fbopcity" required>
                                </div>
                                <div class="col-md-2  mb-2">
                                    <input type="text" class="form-control" placeholder="Province" name="fbopprov" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-3  mb-2">
                                    <label class="form-label" for="homeport">Homeport<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbhport" id="homeport" required>
                                
                                </div>
                                <div class="col-md-3  mb-2">
                                    <label class="form-label" for="vesselname">Name of Fishing Vessel<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbvesseln" id="vesselname" required>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <label class="form-label" for="homeport" for="vesseltype">Vessel Type<span class="required">&nbsp;*</span></label>
                                    <select class="form-select" name="fbvtype" id="vesseltype" required>
                                        <option value="">Select</option>
                                        <option value="Motorized">Motorized</option> 
                                        <option value="Non-Motorized">Non-Motorized</option>
                                    </select>
                                </div>
                                <div class="col-md-3  mb-2">
                                    <label class="form-label" for="homeport" for="vesseltype">Service Type<span class="required">&nbsp;*</span></label>
                                    <select class="form-select" name="fbstype" id="vesseltype" requiredFields>
                                        <option value="">Select</option>
                                        <option value="FISHING BOAT">Fishing Boat</option>
                                        <option value="SERVICE BOAT">Service Boat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="placebuilt">Place Built<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbvbuiltp" id="placebuilt" required>
                                
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="yearbuilt">Year Built<span class="required">&nbsp;*</span></label>
                                    <input type="number" class="form-control" name="fbvbuilty" id="yearbuilt" required>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="materialused">Material Used<span class="required">&nbsp;*</span></label>
                                    <select class="form-select" name="fbvmaterial" id="materialused" required>
                                        <option value="">Select</option>
                                        <option value="Wood">Wood</option>
                                        <option value="Fiber Glass">Fiber Glass</option>
                                        <option value="Composite">Composite</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <h5>Fishing Dimensions and Tonnage</h5>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="length">Registered Length<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbRL" id="length" required>
                                
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="breadth">Registered Breadth<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbRB" id="breadth" required>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label"  for="depth">Registered Depth<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbRD" id="depth" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="tlength">Tonnage Length<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbTL" id="tlength" required>
                                
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="tbreadth">Tonnage Breadth<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbTB" id="tbreadth" required>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label"  for="tdepth">Tonnage Depth<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbTD" id="tdepth" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-6  mb-2">
                                    <label class="form-label" for="gtonnage">Gross Tonnage<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbGT" id="gtonnage" required>
                                
                                </div>
                                <div class="col-md-6  mb-2">
                                    <label class="form-label" for="ntonnage">Net Tonnage<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbNT" id="ntonnage" required>
                                </div>
                            </div>
                        </div>
                        
                        <h5>Particulars of Propulsion System</h5>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="enginemake">Engine Make<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbENGINE" id="enginemake" required>
                                
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="serialnumber">Serial Number<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbSERIAL" id="serialnumber" required>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label"  for="horsepower">Horsepower<span class="required">&nbsp;*</span></label>
                                    <input type="text" class="form-control" name="fbHP" id="horsepower" required>
                                </div>
                            </div>
                        </div>

                        <h5>Classification of Fishing Gear</h5>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="hl">Hook and Lines</label>
                                    <select class="form-select" name="hl" id="fl">
                                        <option value="">Select</option>
                                        <option value="Simple-hand Line">Simple-hand Line</option>
                                        <option value="Multiple-hand Line">Multiple-hand Line</option>
                                        <option value="Bottom set-long Line">Bottom set-long Line</option>
                                        <option value="Drift long Line">Drift long Line</option>
                                        <option value="Troll Line">Troll Line</option>
                                        <option value="Jig">Jig</option>
                                    </select>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="pt">Pots and Traps</label>
                                    <select class="form-select" name="pt" id="pt">
                                        <option value="">Select</option>
                                        <option value="Fish Pots">Fish Pots</option>
                                        <option value="Crab Pots">Crab Pots</option>
                                        <option value="Fish pots">Fish pots</option>
                                        <option value="Fyke nets/Filter Nets">Fyke nets/Filter Nets</option>
                                        <option value="Fish Corrals (Baklad)">Fish Corrals (Baklad)</option>
                                        <option value="Set Net (Lambakad)">Set Net (Lambakad)</option>
                                        <option value="Barrier Net (Likus)">Barrier Net (Likus)</option>
                                    </select>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="pn">Push Nets</label>
                                    <select class="form-select" name="pn" id="pn">
                                        <option value="">Select</option>
                                        <option value="Hook and Lines">Man push nets</option>
                                        <option value="Hook and Lines">Scoop nets</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="gl">Gill Nets</label>
                                    <select class="form-select" name="gl" id="gl">
                                        <option value="">Select</option>
                                        <option value="Mid Water Set Net">Mid water set net</option>
                                        <option value="Bottom Set Gill Net">Bottom set gill net</option>
                                        <option value="Surface Set">Surface set</option>
                                    </select>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="ln">Lift Nets</label>
                                    <select class="form-select" name="ln" id="ln">
                                        <option value="">Select</option>
                                        <option value="Crab Lift Nets">Crab Lift Nets</option>
                                        <option value="Fish Lift Nets (Basnig)/Bagnet">Fish Lift Nets (Basnig)/Bagnet</option>
                                        <option value="New Look or Bintol">New Look or Bintol</option>
                                        <option value="Shrimp Lift Nets">Shrimp Lift Nets</option>
                                        <option value="Level Nets">Lever Nets</option>
                                    </select>
                                </div>
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="sn">Seine Nets</label>
                                    <select class="form-select" name="sn" id="sn">
                                        <option value="">Select</option>
                                        <option value="Beach">Beach</option>
                                        <option value="Scoop nets">Scoop nets</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="fallgear" for="fg">Fall Gear</label>
                                    <select class="form-select" name="fg" id="fg">
                                        <option value="">Select</option>
                                        <option value="Cast Net">Cast Net</option>
                                    </select>
                                </div>

                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="misc">Miscellaneous Fishing Gears</label>
                                    <select class="form-select" name="msc" id="misc">
                                        <option value="">Select</option>
                                        <option value="Spear">Spear</option>
                                        <option value="Octopus/Squid Luring Device">Octopus/Squid Luring Device</option>
                                        <option value="Gaff Hook">Gaff Hook</option>
                                    </select>
                                </div>

                                <div class="col-md-4  mb-2">
                                    <label class="form-label" for="homeport" for="pn">Others</label>
                                    <input type="text" class="form-control"  name="others" placeholder="Pls. Specify other Gears Used">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-success float-end">Submit</button>
                    </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        $(document).ready(function() {
            // Prevent form submission on Enter key press
            $('#myForm').on('keydown', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });
        });

        document.getElementById("myForm").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("test");
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
                                text: 'Your Fishing Boat Application Form is sent to admin, please download the given requirements',
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
