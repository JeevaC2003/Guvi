<?php
session_start();
include('config.php');
$email = $_SESSION['login_user'];

$query = "SELECT * FROM user WHERE mail = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$firstName = $row['FNAME'];
$lastName = $row['LNAME'];
$dob = $row['DOB'];
$gender = $row['GENDER'];
$mobile = $row['MOBILE'];
$address = $row['ADDRESS'];
$area = $row['AREA'];
$pincode = $row['PINCODE'];
$state = $row['STATE'];
$country = $row['COUNTRY'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="profile.css">
</head>

<body id="top">
    <div class="main"style="border:solid; border-width: 5px;font-size:20px ;background-color:black;">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <form id="reg" class="mx-auto col-20 col-md-20 col-lg-10" >
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="main1">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">YOUR PROFILE</h4>
                            </div>
                            <div class="row">
                                <div class="row mt-3">
                                    <div class="col-md-40"><label class="labels">First Name</label><input type="text" class="form-control " name="FNAME" value="<?php echo $firstName; ?>" required></div>
                                    <div class="col-md-40"><label class="labels">Last Name</label><input type="text" class="form-control " name="LNAME" value="<?php echo $lastName; ?>" required></div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-40"><label class="labels">Date of Birth</label><input type="date" class="form-control" name="DOB" value="<?php echo $dob; ?>" required></div>
                                    <div class="col-md-40"><label class="labels mt-3"></label>Gender<input type="text" class="form-control" name="GENDER" value="<?php echo $gender; ?>" style="margin-right: 40px;"></div>
                                    <div class="col-md-40"><label class="labels mt-3">Mobile Number</label><input type="text" class="form-control" name="MOBILE" value="<?php echo $mobile; ?>" style="margin-right: 40px;"></div>
                                    <div class="col-md-40"><label class="labels mt-3">Address Line 1</label><input type="text" class="form-control" name="ADDRESS" value="<?php echo $address; ?>"></div>
                                    <div class="col-md-40"><label class="labels mt-3">Area</label><input type="text" class="form-control" name="AREA" value="<?php echo $area; ?>"></div>
                                    <div class="col-md-40"><label class="labels mt-3">Postcode</label><input type="text" class="form-control" name="PINCODE" value="<?php echo $pincode; ?>"></div>
                                    <div class="col-md-40"><label class="labels mt-3">State</label><input type="text" class="form-control" name="STATE" value="<?php echo $state; ?>"></div>
                                    <div class="col-md-40"><label class="labels mt-3">Country</label><input type="text" class="form-control" name="COUNTRY" value="<?php echo $country; ?>"><br></div>
                                <br>
                                <!-- <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update Details</Details></button> -->
                                <div class="url">
                                <a href="index.php" class="btn btn-primary profile-button">Log Out</a>
                                 </div>
                                 <br>
                                 <br>
                                 <div class="url">
                                <a href="profile.php" class="btn btn-primary profile-button">Update Details</a>
                                 </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>