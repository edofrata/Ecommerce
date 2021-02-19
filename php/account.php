<?php
include('common.php');
outputHeader("FancyShop");
outputBannerNavigation("Account");
scripts();

collect_find('Users');


//--------------------------- echoing the page in question for the accpount of the user for displaying the user information ---------------------------------
echo '
<body class="body_account">
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card_account card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="../assets/log_in.png" alt="Avatar">
                                </div>
                                <h5 id="name_account">' . value_needed('full_name') . '</h5>
                                <p id="email_account" name="id" style="font-size: 15px;">User id: ' . value_needed('_id') . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="../php_server/replace_customer.php" class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" onsubmit="return false" name="form_account" id="form_account" method="POST">
                <div class="card_account card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" name="new_name" id="fullName" onkeyup="check_name(this)" placeholder="Enter full name" value= ' . json_encode(value_needed('full_name')) . '>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">New Email</label>
                                    <input onfocusout="update_user(this)" type="email" class="form-control" id="eMail" name="new_email" onkeyup="check_email(this)" placeholder="Enter New Email" value=' . value_needed('email') . '>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Date of Birth</label>
                                    <input type="date" class="form-control" name="new_dob" id="DoB" value= ' . value_needed('birthday') . '>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_account" name="new_phone" onkeyup="check_phone(this)" placeholder="Phone Number" value=' . value_needed("phone") . '>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Street">Street</label>
                                    <input type="name" class="form-control" id="Street" onkeyup="check_address(this)" name="new_street" placeholder="Enter Street" value=' . json_encode(value_needed("address")) . '>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="ciTy">Postcode</label>
                                    <input type="text" class="form-control" id="postcode" onkeyup="check_postcode(this)" name="new_postcode" placeholder="Enter Postcode" value=' . json_encode(value_needed("postcode")) . '>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Password Settings</h6>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="ciTy">New Password</label>
                                    <input type="password" class="form-control" id="password" name="new_password" placeholder="Enter New Password">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="ciTy">Confirm New Password</label>
                                    <input type="password" class="form-control" id="password_confirm" name="confirm_password" placeholder="Confirm New Password">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="submit_cancel" name="cancel" class="btn btn-secondary">Cancel</button>
                                    <button onclick="update_user(this)" type="button" id="submit_update" name="update" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>';
// -------------------------------------------------------------END---------------------------------------------------------------------------------------------
?>


<?php

outputFooter();
?>