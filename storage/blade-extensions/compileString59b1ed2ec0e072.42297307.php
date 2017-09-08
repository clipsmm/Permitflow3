<div class="panel panel-default">
        <div class="panel-body">
            <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css" />
            <!-- Include app styles -->
            <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" />
            <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
            <!-- End include app styles -->
            <div class="panel panel-default">
                <table border-spacing="0" cellpadding="0" cellspacing="0" style="margin-bottom: 15px; border-bottom:1px solid #000; width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; text-transform:uppercase;">
                    <tbody>
                    <tr style="text-align:center;">
                        <td style="vertical-align:center; text-align:left;width:30%;"><img alt="" src="<?php echo e(asset('images/dis.png')); ?>" style="margin-top:10px; margin-bottom:10px;" /></td>
                        <td style="vertical-align:center; text-align:center;width:30%;">
                            <h1 style="font-size:40px;background:#f2f2f2;padding:10px;line-height:1.0em;"><span style="background:#f2f2f2;">eVisa</span></h1>
                        </td>
                        <td style="vertical-align:center; text-align:right;width:30%;">
                            <p style="margin-bottom:0; padding-bottom:10px; font-family: 'Roboto', sans-serif;font-size:12px; padding-right:20px;"><strong>dis@immigration.go.ke,<br />
                                    www.immigration.go.ke,<br />
                                    +254-20-2222022,<br />
                                    +254-20-2217544,<br />
                                    +254-20-2218833.</strong></p>
                        </td>
                    </tr>
                    <tr style="text-align:right;">
                        <td colspan="3" style="text-align:right;border-top:1px solid;padding-top:10px;padding-bottom:10px;padding-right:10px;">
                            <p style="font-family: 'Roboto', sans-serif; font-size:15px; padding:0px; margin:0;margin-right:10px;line-height:0;line-height:1.0em;"><strong>SELF</strong> Application</p>

                            <p style="font-family: 'Roboto', sans-serif; font-size:15px; padding:0px; margin:0;margin-right:10px;margin-top:4px;line-height:0;line-height:1.0em;padding-bottom:10px;">
                                <strong style="line-height: 1em;">
                                    <img src="<?php echo e($application->getBarcode()); ?>" alt="barcode"   />
                                </strong>
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <table border-spacing="0" cellpadding="0" cellspacing="0" style="margin-bottom: 0px; width:100%; font-family: 'Roboto', sans-serif;text-transform:uppercase;">
                <tbody>
                <tr>
                    <td style="text-align:center;">
                        <h4 style="font-family: 'Roboto', sans-serif; font-weight:bold; font-size:15px; padding:0px; margin:0;line-height:1.0em;">VISA INFORMATION</h4>
                    </td>
                </tr>
                </tbody>
            </table>

            <table border-spacing="0" cellpadding="0" cellspacing="0" style="width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-transform:uppercase;border:1px solid;">
                <tbody>
                <tr>
                    <td style="text-align:left; border-bottom:1px solid;  border-right:1px solid; padding:5px;background:#f2f2f2;">
                        <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Number</strong></p>
                    </td>
                    <td style="text-align:left;border-bottom:1px solid;border-right:1px solid; padding:5px;background:#f2f2f2;">
                        <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Visa Type</strong></p>
                    </td>
                    <td style="text-align:left;border-bottom:1px solid;border-right:1px solid; padding:5px;background:#f2f2f2;">
                        <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><strong>Date of Issue</strong></p>
                    </td>
                    <td style="text-align:left;border-bottom:1px solid; padding:5px;background:#f2f2f2;">
                        <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><b>DATE OF PLANNED ARRIVAL IN KENYA</b></p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; border-bottom:1px solid;  border-right:1px solid; padding:5px;">
                        <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><?php echo e($application->application_number); ?></p>
                    </td>
                    <td style="text-align:left;border-bottom:1px solid; border-right:1px solid; padding:5px;">
                        <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><?php echo e(array_get(Modules\Evisa::getVisaTypes(), $model->visa_type)); ?></p>
                    </td>
                    <td style="text-align:left;border-bottom:1px solid;border-right:1px solid; padding:5px;">
                        
                    </td>
                    <td style="text-align:left;border-bottom:1px solid; padding:5px;">
                        <p style="text-align:left;font-family: 'Roboto', sans-serif; font-size:13px; text-align:left; padding:0px; margin:0;line-height:1.0em;"><?php echo e($application->get_data('date_of_entry')); ?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding:5px;background:#f9f9f9">
                        <p style="font-family: 'Roboto', sans-serif; font-size:11px; text-align:center; padding:0px; margin:0;line-height:1.0em;"><strong>NOTE:</strong> Your stay period in <strong>Kenya</strong> will be determined at the <strong>
                                
                            </strong> entry point
                        </p>
                    </td>
                </tr>
                </tbody>
            </table>


            <table border-spacing="0" cellpadding="0" cellspacing="0" style="margin-bottom: 10px; margin-top: 20px; width:100%; font-family: 'Roboto', sans-serif;text-transform:uppercase;">
                <tbody>
                <tr>
                    <td style="text-align:center;">
                        <h4 style="font-family: 'Roboto', sans-serif; font-weight:bold; font-size:15px; padding:0px; margin:0;line-height:1.0em;">Contact Details</h4>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="panel panel-default">

                <div class="panel-body no-padding">
                    <table class="table table-bordered m-b-0" style="border-top: 0 !important;">

                        <tbody>

                        <tr class=' '>
                            <td width="25%" style="vertical-align: middle !important;">
                                <div class="thumbnail no-border m-t-0 m-b-5 m-l-5 m-r-0">
                                    <img class="img-responsive hidden-xs"
                                         src="<?php echo e(asset('images/profile.jpg')); ?>">
                                </div>
                            </td>
                            <td width="75%" class="no-padding" style="border-top: 0 !important;">
                                <table class="table m-b-0" >
                                    <tbody>

                                    <tr class=' '>
                                        <td class="text-uppercase " align="left"><b><?php echo app('translator')->getFromJson("Full Name"); ?>
                                                : </b> <?php echo e($application->get_data('other_names')); ?> <?php echo e($application->get_data('surname')); ?>

                                        </td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase " align="left"><b><?php echo app('translator')->getFromJson("Date of Birth"); ?>
                                                : </b> <?php echo e($application->get_data('date_of_birth')); ?> </td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase" align="left"><b><?php echo app('translator')->getFromJson("Passport No."); ?>
                                                : </b> <?php echo e($application->get_data('passport_number')); ?></td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase" align="left"><b><?php echo app('translator')->getFromJson("Nationality"); ?>
                                                : </b> </td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase" align="left"><b><?php echo app('translator')->getFromJson("Gender"); ?>
                                                : </b> <?php echo e($application->get_data('gender')); ?></td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase" align="left"><b><?php echo app('translator')->getFromJson("Passport Date of Issue"); ?>
                                                : </b> <?php echo e($application->get_data('passport_date_of_issue')); ?></td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase" align="left"><b><?php echo app('translator')->getFromJson("Passport Place of Issue"); ?>
                                                : </b> <?php echo e($application->get_data('passport_place_of_issue')); ?></td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase" align="left"><b><?php echo app('translator')->getFromJson("Passport Expiry Date"); ?>
                                                : </b> <?php echo e($application->get_data('passport_date_of_expiry')); ?></td>
                                    </tr>
                                    <tr class=' '>
                                        <td class="text-uppercase" align="left"><b><?php echo app('translator')->getFromJson("Passport Issued By"); ?>
                                                : </b> <?php echo e($application->get_data('passport_issued_by')); ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <table border-spacing="0" cellpadding="0" cellspacing="0" style="margin:10px;margin-bottom:0;width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-align:left;">
                <tbody>
                <tr>
                    <td>
                        <h4 style="margin-bottom:0;margin-left:20px; font-family: 'Roboto', sans-serif;">NOTES</h4>

                        <ol style="font-size:12px;margin-left:20px;">
                            <li>The possession of a visa is not the final authority to enter the Republic of Kenya.</li>
                            <li>Engaging in any form of business or employment without a requisite permit or pass is an offense.</li>
                            <li>A visa to Kenya once approved and issued is valid for travel within 3 months.</li>
                            <li>The validity of a Kenyan visa is upto 3 Months, extendable to a maximum of 6 months</li>
                        </ol>
                    </td>
                </tr>
                </tbody>
            </table>

            <table border-spacing="0" cellpadding="0" cellspacing="0" style="margin:opx; width:100%; font-family: 'Roboto', sans-serif; font-size:13px; text-transform:uppercase;">
                <tbody>
                <tr>
                    <td style="text-align:center; padding:0px;">
                        <div style="font-size:12px;text-align:center;font-weight:bold; border-bottom: 1px solid; border-radius: 2px; padding: 5px; margin-bottom:5px; width:100%; font-family: 'Roboto', sans-serif;width:100%;">This document is issued under the authority of The DEPARTMENT OF IMMIGRATION SERVICES.</div>
                        <img alt="" src="http://immigration.ecitizen.go.ke/asset_unified/images/Coat_of_Arms.png" style="width: 150px;" /></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>