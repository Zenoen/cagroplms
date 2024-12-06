<?php
include("../../conn.php");
include("../../class/Notification.php");
include("../functions/client_session.php");
$userEmail = $_SESSION["user"];
$query = "";
if ($_SESSION['usertype'] == 'Client') {
    $query = "SELECT u_prof, u_fname AS fname, u_lname AS lname, u_role AS urole, u_email AS uemail  
          FROM users WHERE u_email = ?";
}

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "No user data found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    //dump to activity log table code
    function logUserAction($conn, $userEmail, $action)
    {
        $log_sql = "INSERT INTO activity_logs (user_email, action, timestamp) VALUES (?, ?, NOW())";
        if ($stmt = $conn->prepare($log_sql)) {
            $stmt->bind_param("ss", $userEmail, $action);
            if (!$stmt->execute()) {
                echo "Error logging activity: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing log statement: " . $conn->error;
        }
    }


    //queries
    $formType = isset($_POST['form_type']) ? $_POST['form_type'] : '';
    $page = str_replace(
        ["fishcage", "fisherfolk", "fishingboat", "fishinggear", "fishworker"],
        ["fishingcages", "fisherfolks", "fishingboats", "fishinggears", "fishworkers"],
        $formType
    );
    $notification = new Notification($conn);
    $notification->addNotification($userData, $_POST['email'], 'Request', 'admin', $page);


    //fisherfolk query
    if ($formType === 'fisherfolk')  {

        // Sanitize and set default values for POST inputs
        $ffn = $_POST['fffname'] ?? null;
        $ffmn = $_POST['ffmname'] ?? null;
        $ffln = $_POST['fflname'] ?? null;
        $ffap = $_POST['ffappell'] ?? null;
        $ffpostal = $_POST['fpostal'] ?? null;
        
        $fcprov = $_POST['ffprov'] ?? null;
        $fccity = $_POST['ffcity'] ?? null;
        $fcbrgy = $_POST['ffbrgy'] ?? null;
        $fcstreet = $_POST['ffstreet'] ?? null;
        $fcage = $_POST['ffage'] ?? null;

        $fdob = $_POST['ffdob'] ?? null;
        $ffpob = $_POST['ffpob'] ?? null;
        $fres = $_POST['ffresidence'] ?? null;
        $fgender = $_POST['ffgender'] ?? null;
        $ffeduc = $_POST['ffeduc'] ?? null;

        $ffnation = $_POST['ffnation'] ?? null;
        $ffciv = $_POST['ffciv'] ?? null;
        $contact = $_POST['ffcontact'] ?? null;
        $ffchild = $_POST['ffchild'] ?? null;
        $ffmale = $_POST['ffmale'] ?? null;

        $fffemale = $_POST['fffemale'] ?? null;
        $ffinschool = $_POST['ffinschool'] ?? null;
        $ffoutschool = $_POST['ffoutschool'] ?? null;
        $ffemployed = $_POST['ffemployed'] ?? null;
        $ffunemployed = $_POST['ffunemployed'] ?? null;

        $ffmonthin = $_POST['ffmonthin'] ?? null;
        $fffarm = $_POST['fffarm'] ?? null;
        $fffarmin = $_POST['fffarmin'] ?? null;
        $ffnfarm = $_POST['ffnfarm'] ?? null;
        $ffnfarmin = $_POST['ffnfarmin'] ?? null;

        $ffename = $_POST['ffename'] ?? null;
        $fferelation = $_POST['fferelation'] ?? null;
        $ffecontact = $_POST['ffecontact'] ?? null;
        $ffeaddress = $_POST['ffeaddress'] ?? null;
        $votersid = $_POST['votersId'] ?? null;

        $fourps = $_POST['4ps'] ?? null;
        $ip = $_POST['ip'] ?? null;
        $saad = $_POST['saad'] ?? null;
        $mainincome = $_POST['mainincome'] ?? null;
        $otherincome = $_POST['otherincome'] ?? null;

        $ffor = $_POST['ffOR'] ?? null;
        $fforg = $_POST['fforg'] ?? null;
        $ffmy = $_POST['ffmemberyear'] ?? null;
        $ffpos = $_POST['fforgpos'] ?? null;
        $email = $_POST['email'] ?? null;

        $crole = $_POST['roles'] ?? null;
        $status = 1;
        $AT = "Fishery License Permit";
    
        try {
            $ff_sql = "INSERT INTO fisherfolks (
                ff_fname, ff_mname, ff_lname, ff_appell, ff_postall, 
                ff_prov, ff_municipal, ff_barangay, ff_street, ff_age, 
                ff_dob, ff_pob, ff_residence, ff_gender, ff_educ, 
                ff_nation, ff_civ, ff_contact, ff_child, ff_male, 
                ff_female, ff_inschool, ff_outschool, ff_employed, ff_unemployed, 
                ff_monthin, ff_farm, ff_farmin, ff_nfarm, ff_nfarmin, 
                ff_ename, ff_erelation, ff_econtact, ff_eaddress, votersid, 
                `four_ps`, IP, SAAD, main_income, other_income, 
                ff_OR, ff_orgname, ff_membersince, ff_orgposition, u_email, 
                u_role, u_status, approval_type
            ) VALUES (
                ?, ?, ?, ?, ?,
                 ?, ?, ?, ?, ?, 
                 ?, ?, ?, ?, ?,
                  ?, ?, ?, ?, ?,
                   ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                     ?, ?, ?, ?, ?,
                      ?, ?, ?, ?, ?,
                       ?, ?, ?, ?, ?
                       ,?, ?, ?
            )";
            
            $stmt = $conn->prepare($ff_sql);
            $stmt->bind_param(
                "ssssissssissssssssiiiiiiissdsdssssssssssssisssss",
                $ffn, $ffmn, $ffln, $ffap, $ffpostal, 
                $fcprov, $fccity, $fcbrgy, $fcstreet,$fcage, 
                $fdob, $ffpob, $fres, $fgender, $ffeduc, 
                $ffnation, $ffciv, $contact,$ffchild, $ffmale, 
                $fffemale, $ffinschool, $ffoutschool, $ffemployed, $ffunemployed,
                $ffmonthin, $fffarm, $fffarmin, $ffnfarm, $ffnfarmin, 
                $ffename, $fferelation, $ffecontact,$ffeaddress, $votersid, 
                $fourps, $ip, $saad, $mainincome, $otherincome, 
                $ffor,$fforg, $ffmy, $ffpos, $email, 
                $crole, $status, $AT
            );
    
            if ($stmt->execute()) {
                echo "success";
                logUserAction($conn, $email, 'Fisherfolk Application Form sent');
            } else {
                echo "Error: SQL Execution Error - " . $conn->error;
            }
        } catch (Exception $e) {
            echo "Error: Exception - " . $e->getMessage();
        }
    }



    //fishworker query
    else if ($formType === 'fishworker') {

        $fsalute = $_POST['fwsalute']?? null;

        $fname = $_POST['fwFname']?? null;
        $fMname = $_POST['fwMname']?? null;
        $fLname = $_POST['fwLname']?? null;
        $fappell = $_POST['fwappel']?? null;
        $fpostal = $_POST['fwpost']?? null;
         
        $fprovince = $_POST['fwprov']?? null;
        $fcity = $_POST['fwcity']?? null;
        $fbrgy = $_POST['fwbrgy']?? null;
        $fstreet = $_POST['fwstreet']?? null;
        $fgender = $_POST['fwgender']?? null;

        $fage = $_POST['fwage']?? null;
        $fdob = $_POST['fwdob']?? null;
        $fcontact = $_POST['fwcontact']?? null;
        $fOR = $_POST['fwOR']?? null;
        $fcrtk = $_POST['fwcrtkof']?? null;

        $fcrtksince = $_POST['fwcrtksince']?? null;
        $fcrtkloc = $_POST['fwcrtkloc']?? null;
        $faqua = $_POST['fwaqua']?? null;
        $faqua2 = $_POST['fwaqua2']?? null;
        $funits = $_POST['fwunits']?? null;

        $funitsdimen = $_POST['fwunitsdim']?? null;
        $fwresidence = $_POST['fwresidencesince']?? null;
        $fwpob = $_POST['fwpob']?? null;
        $fweduc = $_POST['fweduc']?? null;
        $fwciv= $_POST['fwciv']?? null;

        $fwother1= $_POST['fwother1']?? null;
        $fwother2= $_POST['fwother2']?? null;
        $fwother3= $_POST['fwother3']?? null;
        $email = $_POST['email'];
        $role = $_POST['roles'];

        $status = 1;
        $AT = "Fishery License Permit";

        // Locator_investor
        $locfn = $_POST['locfname'];
        $locmn = $_POST['locmiddle']?? null;
        $locln = $_POST['loclast']?? null;
        $locap = $_POST['locappel']?? null;
        $locprov = $_POST['locprov'];
        $loccity = $_POST['loccity']?? null;
        $locbrgy = $_POST['locbrgy']?? null;
        $locstreet = $_POST['locstreet']?? null;
        $locunits = $_POST['locunits'];

        try {

            // Updated SQL to include "fw_postal"
            $fw_sql = "INSERT INTO fishworkerlicense (
                fw_fname, fw_mname, fw_lname, fw_appell, fw_postal, 
                fw_province, fw_municipal, fw_barangay, fw_street, fw_gender, 
                fw_age, fw_dob, fw_contact, fw_OR, fw_caretakerof, 
                fw_caretakersince, fw_location, fw_aquaculture, fw_FLA_Private, fw_unitsmanaged, 
                fw_unitdeminsions, u_email, u_role, u_status, approval_type, 
                fw_pob, fw_complex, fw_educ, fw_civ, fw_other1, 
                fw_other2, fw_other3
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";

            $stmt = $conn->prepare($fw_sql);
            $stmt->bind_param(
                'ssssssssssssssssssssssssssssssss',
                $fname,
                $fMname,
                $fLname,
                $fappell,
                $fpostal,
                $fprovince,
                $fcity,
                $fbrgy,
                $fstreet,
                $fgender,
                $fage,
                $fdob,
                $fcontact,
                $fOR,
                $fcrtk,
                $fcrtksince,
                $fcrtkloc,
                $faqua,
                $faqua2,
                $funits,
                $funitsdimen,
                $email,
                $role,
                $status,
                $AT,
                $fwresidence,
                $fwpob,
                $fweduc,
                $fwciv,
                $fwother1,
                $fwother2,
                $fwother3
            );

            if ($stmt->execute()) {
                echo "success";
                logUserAction($conn, $email, 'Fishworker Application Form sent');
                $user_id = $stmt->insert_id;

                $ec_sql = "INSERT INTO locatorinvestor (
                    fw_id, loc_fname, loc_mname, loc_lname, loc_appell, loc_prov, loc_municipal, loc_brgy, loc_street, loc_units
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($ec_sql);
                $stmt->bind_param(
                    'isssssssss',
                    $user_id,
                    $locfn,
                    $locmn,
                    $locln,
                    $locap,
                    $locprov,
                    $loccity,
                    $locbrgy,
                    $locstreet,
                    $locunits
                );

                if ($stmt->execute()) {
                    $conn->commit();
                } else {
                    $conn->rollback();
                    echo '<script type="text/javascript">
                        alert("Error inserting Locator data: ' . $stmt->error . '");
                        </script>';
                }
            } else {
                $conn->rollback();
                echo '<script type="text/javascript">
                    alert("Error inserting Fishworker data: ' . $stmt->error . '");
                    </script>';
            }
        } catch (Exception $e) {
            $conn->rollback();
            // Improved error handling
            echo '<script type="text/javascript">
                alert("Transaction failed: ' . $e->getMessage() . '");
                </script>';
        }
    }

    //fishcage query
    else if ($formType === 'fishcage') {
        $fcfn = $_POST['fcfname'];
        $fcmn = $_POST['fcmname'];
        $fcln = $_POST['fclname'];
        $fcap = $_POST['fcapp'];
        $fcpostal = $_POST['fpostal'];
        $fcprov = $_POST['fcprov'];
        $fccity = $_POST['fccity'];
        $fcbrgy = $_POST['fcbrgy'];
        $fcstreet = $_POST['fcstrt'];
        $fccontact = $_POST['fccon'];
        $fccategory = $_POST['fccat'];
        $fccage = $_POST['fccage'];
        $fccultured = $_POST['fccul'];
        $fcdimension = $_POST['fcdem'];
        $fcintended = $_POST['fcint'];
        $fcbname = $_POST['fcbname'];
        $fcbaddress = $_POST['fcbadd'];
        $fcbregister = $_POST['fcbreg'];
        $fccapital = $_POST['fccap'];
        $fcsource = $_POST['fcsrc'];

        $fcciv=$_POST['fcciv'];
        $fcunits=$_POST['fcunits'];

        $email = $_POST['email'];
        $crole = $_POST['roles'];
        $status = 1;
        $AT = "Permit to Operate (FishingCage)";

        try {
            $fc_sql = "INSERT INTO fishcage (
                fc_fname, fc_mname, fc_lname, fc_appell, fc_postal, fc_prov, fc_municipal, fc_brgy, fc_street, 
                fc_contact, fc_invcategory, fc_cagetype, fc_culturedspicies, fc_dimension_size, fc_intendedfor, 
                fc_businessname, fc_businessadd, fc_businessreg, fc_capitalinv, fc_source, u_email, u_role, u_status, approval_type
                ,fc_civ, fc_units
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)";

            $stmt = $conn->prepare($fc_sql);
            $stmt->bind_param(
                "sssssssssssssssssssssssssi",
                $fcfn,
                $fcmn,
                $fcln,
                $fcap,
                $fcpostal,
                $fcprov,
                $fccity,
                $fcbrgy,
                $fcstreet,
                $fccontact,
                $fccategory,
                $fccage,
                $fccultured,
                $fcdimension,
                $fcintended,
                $fcbname,
                $fcbaddress,
                $fcbregister,
                $fccapital,
                $fcsource,
                $email,
                $crole,
                $status,
                $AT,
                $ffciv,
                $fcunits,
            );

            // Execute statement
            if ($stmt->execute()) {
                echo "success";
                logUserAction($conn, $email, 'Fish Cage Application Form sent');
            } else {
                echo "Error: SQL Execution Error - " . $conn->error;
            }
        } catch (Exception $e) {
            echo "Error: Exception - " . $e->getMessage();
        }
    }


    //fishing gear query
    else if ($formType === 'fishinggear') {
        $fgfn = $_POST['fg_fname'];
        $fgmn = $_POST['fg_mname'];
        $fgln = $_POST['fg_lname'];
        $fgap = $_POST['fg_appell'];
        $fgpos = $_POST['fgpostal'];
        $fgprov = $_POST['fg_prov'];
        $fgcity = $_POST['fg_city'];
        $fgbrgy = $_POST['fg_brgy'];
        $fgstreet = $_POST['fg_street'];
        $fgcontact = $_POST['fg_contact'];
        $fgOR = $_POST['fg_OR'] ?? null;
        $fggender = $_POST['fg_gender'] ??null;
        $fgtype = isset($_POST['fg_type']) ? $_POST['fg_type'] : null;
        $fgwing = $_POST['fg_wing'];
        $fgcenter = $_POST['fg_center'];
        $fgother = $_POST['fg_other'];
        $email = $_POST['email'];
        $status = 1;
        $AT = "Fishing Gear Permit";

        try {
            $fg_sql = "INSERT INTO fishinggears (fg_locfname, fg_locmname, fg_loclname, fg_locappel, fg_postal, fg_locprov, fg_locmunicipal, fg_locbarangay, fg_locstreet, fg_loccontact, fg_OR, fg_type, fg_wing, fg_centerline, fg_otherspec, u_email, u_status, approval_type) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($fg_sql);
            $stmt->bind_param("ssssisssssisssssis", $fgfn, $fgmn, $fgln, $fgap, $fgpos, $fgprov, $fgcity, $fgbrgy, $fgstreet, $fgcontact, $fgOR, $fgtype, $fgwing, $fgcenter, $fgother, $email, $status, $AT);

            if ($stmt->execute()) {
                // Log the user action
                echo "success";
                logUserAction($conn, $email, 'Fishing Gear Application Form sent');
            } else {
                echo "Error: SQL Execution Error - " . $stmt->error;
            }
        } catch (Exception $e) {
            echo "Error: Exception - " . $e->getMessage();
        }
    }



    //fishing boat query
    else if ($formType === 'fishingboat') {
        $fbfn = $_POST['fbopfname'];
        $fbmn = $_POST['fbopmname'];
        $fbln = $_POST['fboplname'];
        $fbap = $_POST['fbopappel'];
        $fbpos = (int)$_POST['fbpostal']; // Convert to integer
        $fbprov = $_POST['fbopprov'];
        $fbcity = $_POST['fbopcity'];
        $fbbrgy = $_POST['fbopbrgy'];
        $fbstreet = $_POST['fbopstreet'];
        $fbport = $_POST['fbhport'];
        $fbves = $_POST['fbvesseln'];
        $fbtype = $_POST['fbvtype'];
        $fbvbplace = $_POST['fbvbuiltp'];
        $fbvbyear = (int)$_POST['fbvbuilty']; // Convert to integer
        $fbvmat = $_POST['fbvmaterial'];
        $RL = (float)$_POST['fbRL']; // Convert to float
        $RB = (float)$_POST['fbRB']; // Convert to float
        $RD = (float)$_POST['fbRD']; // Convert to float
        $TL = (float)$_POST['fbTL']; // Convert to float
        $TB = (float)$_POST['fbTB']; // Convert to float
        $TD = (float)$_POST['fbTD']; // Convert to float
        $GT = (float)$_POST['fbGT']; // Convert to float
        $NT = (float)$_POST['fbNT']; // Convert to float
        $ENGINE = $_POST['fbENGINE'];
        $SERIAL = $_POST['fbSERIAL'];
        $HP = (float)$_POST['fbHP']; // Convert to float

        $fbstype = $_POST['fbstype'];
        $HL = $_POST['hl'];
        $PT = $_POST['pt'];
        $PN = $_POST['pn'];
        $GL = $_POST['gl'];
        $LN = $_POST['ln'];
        $SN = $_POST['sn'];
        $FG = $_POST['fg'];
        $MSC = $_POST['msc'];
        $Others = $_POST['others'];
        

        $email = $_POST['email'];
        $status = 1;
        $AT = "Fishing Boat Permit";

        try {
            $fb_sql = "INSERT INTO fishingboats (
            fb_opfname, fb_opmname, fb_oplname, fb_opappel, fb_postal, fb_opprov, fb_opmunicipal, fb_opbarangay, fb_opstreet, fb_homeport,
            fb_vesselname, fb_vesseltype, fb_placebuilt, fb_yearbuilt, fb_materialbuilt, fb_RL, fb_RB, fb_RD, fb_TL, fb_TB, fb_TD, fb_GT, fb_NT,
            fb_enginemake, fb_serial, fb_horsepower, u_email, u_status, approval_type,fb_servicetype, hooklines, pottrap, pushnets, gillnets, seinets,
            fallgear,miscgear,othergear,liftnets
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($fb_sql);
            $stmt->bind_param(
                "ssssissssssssisddddddddssdsssssssssssss",
                $fbfn,
                $fbmn,
                $fbln,
                $fbap,
                $fbpos,
                $fbprov,
                $fbcity,
                $fbbrgy,
                $fbstreet,
                $fbport,
                $fbves,
                $fbtype,
                $fbvbplace,
                $fbvbyear,
                $fbvmat,
                $RL,
                $RB,
                $RD,
                $TL,
                $TB,
                $TD,
                $GT,
                $NT,
                $ENGINE,
                $SERIAL,
                $HP,
                $email,
                $status,
                $AT,
                $fbstype,
                $HL,
                $PT,
                $PN,
                $GL,
                $SN,
                $FG,
                $MSC,
                $Others,
                $LN



            );

            if ($stmt->execute()) {
                echo "success";
                logUserAction($conn, $email, 'Fishing Boat Application Form sent');
            } else {
                echo "Error: SQL Execution Error - " . $conn->error;
            }
        } catch (Exception $e) {
            echo "Error: Exception - " . $e->getMessage();
        }
    }
}
