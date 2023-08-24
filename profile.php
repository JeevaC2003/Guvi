<?php 
session_start();
include('config.php');
$countries = array(
    "United States",
    "Canada",
    "United Kingdom",
    "India"
);
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PROFILE</title>
    <link rel="stylesheet" href="profile.css">
</head>

<body id="top">
    <div class="main">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <form id="reg" style="border:solid; border-width: 5px;font-size:20px ;background-color:black;">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="main1">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <!-- <div class="d-flex justify-content-between align-items-center mb-3"> -->
                                <h4 style="font-size:40px;color:darkred;margin-left:450px;"> PROFILE</h4>
                            <!-- </div> -->
                            <div class="row">
                                
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels"><b>First Name</b></label><input type="text" class="form-control" name="FNAME" value="" required></div>
                                    <div class="col-md-6"><label class="labels"><b>Last Name</b></label><input type="text" class="form-control" name="LNAME" value="" required></div>
                                     
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels"><b>Date of Birth</b></label><input type="date" class="form-control" name="DOB" value="" required></div>
                                    <div class="col-md-12"><label class="labels mt-3"><b>Gender</b></label>
                                        <select name="GENDER" class="form-control" required>
                                            <option value="">Select Option</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12"><label class="labels mt-3"><b>Mobile Number</b></label><input type="text" class="form-control" name="MOBILE" value="" required></div>
                                    <div class="col-md-12"><label class="labels mt-3"><b>Address Line 1</b></label><input type="text" class="form-control" name="ADDRESS" value="" required></div>
                                    <div class="col-md-12"><label class="labels mt-3"><b>Area</b></label><input type="text" class="form-control" name="AREA" value=""></div>
                                    <div class="col-md-12"><label class="labels mt-3"><b>Postcode</b></label><input type="text" class="form-control" name="PINCODE" value="" required></div>
                                    <div class="col-md-12"><label class="labels mt-3"><b>State</b></label><input type="text" class="form-control" name="STATE" value="" required></div>
                                    <div class="col-md-12"><label class="labels mt-3"><b>Country</b></label><input type="text" class="form-control" name="COUNTRY" value="" required></div>
                                    <div class="left">
                                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Change</button>
                                        <button class="btn btn-primary profile-button" onClick="window.location.href='display.php';"> View Details</button>
                                        <button class="btn btn-primary profile-button" onClick="window.location.href='index.php';"> Log-Out</button>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        $(document).on('submit', '#reg', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);

            $.ajax({
                type: "POST",
                url: "profile1.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#user').load(location.href + '#user');

                    } else if (res.status == 500) {
                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });
    </script>

</body>

</html>
