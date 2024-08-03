<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Background Image</title>
    <style>
    @page {
        size: A4;
        /* Ensure A4 size in print */
        margin: 0;
        /* Remove default margins */
    }

    body,
    html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }



    /*  */
    .image_path {
        top: 74px;
        position: absolute;
        right: 64px;
    }

        .image_path img {
            width: 130px;
            height: 165px;
        }

    .qr_path {
            left: 70px;
            position: absolute;
            top: 70px;
        }

        .qr_path img {
            width: 130px;
            height: 130px;
        }

    /*  */


    .container {
        position: relative;
        width: 787.2px;
        height: 1019.4px;
        /* width: 210mm;
        height: 297mm; */
        /* A4 width */
        /* A4 height */
        background-image: url('assets/img/bangla.jpg');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
    }

    .container_en {
        position: relative;
         width: 787.2px;
            height: 1019.4px;
        /* width: 210mm;
        height: 297mm; */
        /* A4 width */
        /* A4 height */
        background-image: url('assets/img/english.jpg');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
    }

    .form_group {
        position: absolute;
    }

    .name {
        top: 170px;
        left: 200px;
        width: 300px;
    }

    .father_name {
        top: 210px;
        left: 200px;
        width: 300px;
    }

    .mother_name {
        top: 250px;
        left: 200px;
        width: 300px;
    }

    .issue_data {
        padding-top: 258px;
        padding-left: 135px;
    }

    .village {
        top: 360px;
        left: 200px;
        width: 200px;
    }

    .post_office {
        top: 360px;
        left: 550px;
        width: 200px;
    }

    .thana {
        top: 400px;
        left: 200px;
        width: 200px;
    }

    .district {
        top: 400px;
        left: 550px;
        width: 200px;
    }

    .issue_time {
        top: 540px;
        left: 550px;
        width: 200px;
    }

    .permanent_village {
        top: 660px;
        left: 200px;
        width: 200px;
    }

    .permanent_post_office {
        top: 660px;
        left: 550px;
        width: 200px;
    }

    .permanent_thana {
        top: 700px;
        left: 200px;
        width: 200px;
    }

    .permanent_district {
        top: 700px;
        left: 550px;
        width: 200px;
    }

    .nid_number {
        position: absolute;
        top: <?php echo $lang ? '620px': '597px'?>;
        left: <?php echo $lang ? '260px': '288px'?>;
        font-size: 14px;
    }


    .trade_license_type {
        top: 1040px;
        left: 200px;
        width: 200px;
    }

    .trade_license_fee {
        top: 1080px;
        left: 200px;
        width: 200px;
    }

    .in_words {
        top: 1120px;
        left: 200px;
        width: 200px;
    }

    .submit_button {
        top: 1200px;
        left: 50%;
        transform: translateX(-50%);
    }

    .ward_no {
        position: absolute;
        top: <?php echo $lang ? '237px': '240px'?>;
        left: <?php echo $lang ? '144px': '150px'?>;
        font-size: 14px;
    }

    .issue_date {
        padding-top: <?php echo $lang ? '258px': '263px'?>;
        padding-left: <?php echo $lang ? '170px': '150px'?>;
        font-size: 14px;
    }

    .trade_license_number {
        position: absolute;
        top: <?php echo $lang ? '301px': '303px'?>;
        left: <?php echo $lang ? '443px': '420px'?>;
        font-size: 14px;
    }

    .trade_license_type {
        position: absolute;
        top: <?php echo $lang ? '279px': '280px'?>;
        left: <?php echo $lang ? '210px': '172px'?>;
        font-size: 14px;
    }

    .owner_name {
        position: absolute;
        top: <?php echo $lang ? '392px': '392px'?>;
        left: <?php echo $lang ? '263px': '289px'?>;
        font-size: 14px;
    }

    .father_name {
        position: absolute;
        top: <?php echo $lang ? '416px': '412px'?>;
        left: <?php echo $lang ? '262px': '289px'?>;
        font-size: 14px;
    }

    .mother_name {
        position: absolute;
        top: <?php echo $lang ? '438px': '434px'?>;
        left: <?php echo $lang ? '262px': '289px'?>;
        font-size: 14px;
    }

    .holding_no {
        position: absolute;
        top: <?php echo $lang ? '500px': '486px'?>;
        left: <?php echo $lang ? '356px': '375px'?>;
        font-size: 13px;
    }

    .vilage {
        position: absolute;
        top: <?php echo $lang ? '522px': '508px'?>;
        left: <?php echo $lang ? '356px': '369px'?>;
        font-size: 13px;
    }

    .post_office {
        position: absolute;
        top: <?php echo $lang ? '545px': '528px'?>;
        left: <?php echo $lang ? '356px': '369px'?>;
        font-size: 13px;
    }



    .thana {
        position: absolute;
        top: <?php echo $lang ? '568px': '548px'?>;
        left: <?php echo $lang ? '356px': '369px'?>;
        font-size: 13px;
    }

    .district {
        position: absolute;
        top: <?php echo $lang ? '591px': '568px'?>;
        left: <?php echo $lang ? '356px': '369px'?>;
        font-size: 13px;
    }

    .permanent_holding_no {
        position: absolute;
        top: <?php echo $lang ? '500px': '486px'?>;
        left: <?php echo $lang ? '600px': '600px'?>;
        font-size: 13px;
    }

    .permanent_vilage {
        position: absolute;
        top: <?php echo $lang ? '522px': '508px'?>;
        left: <?php echo $lang ? '600px': '600px'?>;
        font-size: 13px;
    }

    .permanent_post_office {
        position: absolute;
        top: <?php echo $lang ? '545px': '528px'?>;
        left: <?php echo $lang ? '600px': '600px'?>;
        font-size: 13px;
    }

    .permanent_thana {
        position: absolute;
        top: <?php echo $lang ? '568px': '548px'?>;
        left: <?php echo $lang ? '600px': '600px'?>;
        font-size: 13px;
    }

    .permanent_district {
        position: absolute;
        top: <?php echo $lang ? '591px': '568px'?>;
        left: <?php echo $lang ? '600px': '600px'?>;
        font-size: 13px;
    }

    .business_name {
        position: absolute;
        top: <?php echo $lang ? '669px': '635px'?>;
        left: <?php echo $lang ? '262px': '288px'?>;
        ;
        font-size: 14px;
    }


    .business_address {
        position: absolute;
        top: <?php echo $lang ? '693px': '656px'?>;
        left: <?php echo $lang ? '262px': '288px'?>;
        font-size: 14px;
    }

    .business_type {
        position: absolute;
        top: <?php echo $lang ? '740px': '701px'?>;
        left: <?php echo $lang ? '262px': '288px'?>;
        font-size: 14px;
        width: 100%;
    }
    .business_type1{
        opacity: 0;
    }

    .mobile_email {
        position: absolute;
        top: <?php echo $lang ? '717px': '680px'?>;
        left: <?php echo $lang ? '262px': '288px'?>;
        font-size: 14px;
    }

    .tin_number {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '646px': '616px'?>;
        left: <?php echo $lang ? '260px': '290px'?>;
    }

    .trade_license_fee {
        position: absolute;
        top: 725px;
        left: 288px;
        font-size: 14px;
    }

    .trade_license_fee_second {
        position: absolute;
        top: <?php echo $lang ? '798px': '776px'?>;
        left: <?php echo $lang ? '474px': '500px'?>;
        font-size: 14px;
    }

    .in_word {
        position: absolute;
        top: <?php echo $lang ? '955px': '930px'?>;
        left: <?php echo $lang ? '191px': '404px'?>;
        font-size: 14px;
    }

    .sign_board_tax {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '821px': '798px'?>;
        left: <?php echo $lang ? '475px': '500px'?>;
    }

    .trade_tax {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '842px': '820px'?>;
        left: <?php echo $lang ? '475px': '500px'?>;
    }

    .outstanding {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '865px': '842px'?>;
        left: <?php echo $lang ? '475px': '500px'?>;
    }

    .surcharge {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '885px': '864px'?>;
        left: <?php echo $lang ? '475px': '500px'?>;
    }

    .certificate_fee {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '905px': '886px'?>;
        left: <?php echo $lang ? '475px': '500px'?>;
    }

    .total_fee {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '927px': '910px'?>;
        left: <?php echo $lang ? '475px': '500px'?>;
    }


    @media print {

        body,
        html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }



    
        .image_path {
            top: 98px;
            right: 85px;
            position: absolute;
        }

        .image_path img {
            width: 180px;
            height: 230px;
        }

    .qr_path {
            left: 95px;
            top: 100px;
            position: absolute;
        }

        .qr_path img {
            width: 150px;
            height: 160px;
        }


        


        .container {
            position: relative;
            /* width: 100%;
            height: 100%; */
            width: 787.2px;
            height: 1019.4px;
            /* A4 width */
            /* A4 height */
            background-image: url('assets/img/bangla.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container_en {
            position: relative;
            /* width: 100%;
            height: 100%; */
            width: 787.2px;
            height: 1019.4px;
            /* width: 210mm;
            height: 297mm; */
            /* A4 width */
            /* A4 height */
            background-image: url('assets/img/english.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }

        .form_group {
            position: absolute;
        }


        .ward_no {
            position: absolute;
            margin-top: <?php echo $lang ? '80px': '93px'?>;
            margin-left: <?php echo $lang ? '50px': '60px'?>;
            font-size: 14px;
        }

        .issue_date {
            padding-top: <?php echo $lang ? '345px': '360px'?>;
            padding-left: <?php echo $lang ? '230px': '210px'?>;
            font-size: 14px;
        }
        .trade_license_type {
            position: absolute;
            top: <?php echo $lang ? '375px': '385px'?>;
            left: <?php echo $lang ? '280px': '240px'?>;
            font-size: 14px;
        }
        .trade_license_number {
            position: absolute;
            top: <?php echo $lang ? '402px': '415px'?>;
            left:  <?php echo $lang ? '585px': '575px'?>;
            font-size: 14px;
        }

        

        .owner_name {
            position: absolute;
            top: <?php echo $lang ? '523px': '540px'?>;
            left: <?php echo $lang ? '355px': '390px'?>;
            font-size: 14px;
        }

        .father_name {
            position: absolute;
            top: <?php echo $lang ? '555px': '570px'?>;
            left: <?php echo $lang ? '355px': '390px'?>;
            font-size: 14px;
        }

        .mother_name {
            position: absolute;
            top: <?php echo $lang ? '585px': '600px'?>;
            left: <?php echo $lang ? '355px': '390px'?>;
            font-size: 14ypx;
        }

        .holding_no {
            position: absolute;
            top: <?php echo $lang ? '665px': '665px'?>;
            left: <?php echo $lang ? '480px': '520px'?>;
            font-size: 14px;
        }

        .vilage {
            position: absolute;
            top: <?php echo $lang ? '695px': '693px'?>;
            left: <?php echo $lang ? '480px': '520px'?>;
            font-size: 13px;
        }

        .post_office {
            position: absolute;
            top: <?php echo $lang ? '728px': '720px'?>;
            left: <?php echo $lang ? '480px': '520px'?>;
            font-size: 13px;
        }



        .thana {
            position: absolute;
            top: <?php echo $lang ? '758px': '747px'?>;
            left: <?php echo $lang ? '480px': '520px'?>;
            font-size: 13px;
        }

        .district {
            position: absolute;
            top: <?php echo $lang ? '788px': '775px'?>;
            left: <?php echo $lang ? '480px': '520px'?>;
            font-size: 13px;
        }
        .permanent_holding_no {
            position: absolute;
            top: <?php echo $lang ? '665px': '665px'?>;
            left: <?php echo $lang ? '800px': '820px'?>;
            font-size: 14px;
        }

        .permanent_vilage {
            position: absolute;
            top: <?php echo $lang ? '695px': '693px'?>;
            left: <?php echo $lang ? '800px': '820px'?>;
            font-size: 13px;
        }

        .permanent_post_office {
            position: absolute;
            top: <?php echo $lang ? '728px': '720px'?>;
            left: <?php echo $lang ? '800px': '820px'?>;
            font-size: 13px;
        }

        .permanent_thana {
            position: absolute;
            top: <?php echo $lang ? '758px': '747px'?>;
            left: <?php echo $lang ? '800px': '820px'?>;
            font-size: 13px;
        }

        .permanent_district {
            position: absolute;
            top: <?php echo $lang ? '788px': '775px'?>;
            left: <?php echo $lang ? '800px': '820px'?>;
            font-size: 13px;
        }

        .nid_number {
            position: absolute;
            top: <?php echo $lang ? '830px': '817px'?>;
            left: <?php echo $lang ? '360px': '400px'?>;
            font-size: 14px;
        }
        .tin_number {
            position: absolute;
            top: <?php echo $lang ? '860px': '845px'?>;
            left: <?php echo $lang ? '360px': '400px'?>;
            font-size: 14px;
        }

        .business_name {
            position: absolute;
            top: <?php echo $lang ? '890px': '872px'?>;
            left: <?php echo $lang ? '360px': '400px'?>;
            font-size: 14px;
        }

        .business_address {
            position: absolute;
            top: <?php echo $lang ? '925px': '900px'?>;
            left: <?php echo $lang ? '360px': '400px'?>;
            font-size: 14px;
        }
        
        .mobile_email {
            position: absolute;
            top: <?php echo $lang ? '955px': '930px'?>;
            left: <?php echo $lang ? '360px': '400px'?>;
            font-size: 14px;
        }
        .business_type1 {
            position: absolute;
            top: <?php echo $lang ? '985px': '960px'?>;
            left: <?php echo $lang ? '360px': '400px'?>;
            font-size: 14px;
            opacity: 1;
        }
        .business_type_none{
            opacity: 0;
        }


        .trade_license_fee {
            position: absolute;
            top: <?php echo $lang ? '930px': '930px'?>;
            left: <?php echo $lang ? '300px': '288px'?>;
            font-size: 14px;
        }

        .trade_license_fee_second {
            position: absolute;
            top: <?php echo $lang ? '1065px': '1060px'?>;
            left: <?php echo $lang ? '640px': '688px'?>;
            font-size: 14px;
        }
        

        .sign_board_tax {
            position: absolute;
            font-size: 14px;
            top: <?php echo $lang ? '1090px': '1090px'?>;
            left: <?php echo $lang ? '640px': '688px'?>;
        }

        .trade_tax {
            position: absolute;
            font-size: 14px;
            top: <?php echo $lang ? '1120px': '1120px'?>;
            left: <?php echo $lang ? '640px': '688px'?>;
        }

        .outstanding {
            position: absolute;
            font-size: 14px;
            top: <?php echo $lang ? '1150px': '1150px'?>;
            left: <?php echo $lang ? '640px': '688px'?>;
        }

        .surcharge {
            position: absolute;
            font-size: 14px;
            top: <?php echo $lang ? '1180px': '1180px'?>;
            left: <?php echo $lang ? '640px': '688px'?>;
        }

        .certificate_fee {
            position: absolute;
            font-size: 14px;
            top: <?php echo $lang ? '1210px': '1210px'?>;
            left: <?php echo $lang ? '640px': '688px'?>;
        }
        .total_fee {
        position: absolute;
        font-size: 14px;
        top: <?php echo $lang ? '1240px': '1240px'?>;
            left: <?php echo $lang ? '640px': '688px'?>;
    }
        .in_word {
            position: absolute;
            top: <?php echo $lang ? '1275px': '1270px'?>;
            left: <?php echo $lang ? '250px': '550px'?>;
            font-size: 14px;
        }
    }
    </style>
</head>
<?php
        $total = 0;

        // Function to get the value based on the language and convert it to a float
        function getValue($lang, $owner, $field)
        {
            return $lang ? floatval($owner["en_$field"]) : floatval($owner[$field]);
        }

        // Calculate total
        $total += getValue($lang, $owner, 'trade_license_fee');
        $total += getValue($lang, $owner, 'sign_board_tax');
        $total += getValue($lang, $owner, 'trade_tax');
        $total += getValue($lang, $owner, 'outstanding');
        $total += getValue($lang, $owner, 'surcharge');
        $total += getValue($lang, $owner, 'certificate_fee');

        ?>

<body>
    <?php
    if ($lang == "en") {
    ?>



    <div class="trade_preview container_en">
        <?php } else { ?>
        <div class="trade_preview container">
            <?php } ?>
            <div class="row align-items-center ">
                <div class="col-lg-4 ward_no">
                    <?php echo $lang ? $owner['en_ward_no'] ?? "" : $owner['ward_no'] ?? ""; ?>
                </div>
                <div class="col-lg-4 issue_date">
                    <?php echo $lang ? $owner['en_issue_date'] : $owner['issue_date']; ?>
                </div>
                <div class="col-lg-6 trade_license_number">
                    <?php echo  $owner['license_no']; ?>
                </div>
                <div class="trade_license_type">
                    <?php echo $lang ? $owner['en_trade_license_type'] : $owner['trade_license_type']; ?>
                </div>
                <div class="owner_name">
                    <?php echo $lang ? $owner['en_name'] : $owner['name']; ?></div>
                <div class="father_name">
                    <?php echo $lang ? $owner['en_father_name'] : $owner['father_name']; ?>
                </div>
                <div class="mother_name">
                    <?php echo $lang ? $owner['en_mother_name'] : $owner['mother_name']; ?>
                </div>
                <div class="holding_no">
                    <?php echo $lang ? $owner['en_holding_no'] : $owner['holding_no']; ?>
                </div>
                <div class="permanent_holding_no">
                    <?php echo $lang ? $owner['en_permanent_holding_no'] : $owner['permanent_holding_no']; ?>
                </div>
                <div class="vilage">
                    <?php echo $lang ? $owner['en_village'] : $owner['village']; ?>
                </div>
                <div class="post_office">
                    <?php echo $lang ? $owner['en_post_office'] : $owner['post_office']; ?>
                </div>
                <div class="thana">
                    <?php echo $lang ? $owner['en_thana'] :  $owner['thana']; ?> </div>
                <div class="district">
                    <?php echo  $lang ? $owner['en_district'] : $owner['district']; ?>
                </div>

                <div class="permanent_vilage">
                    <?php echo $lang ? $owner['en_permanent_village'] : $owner['permanent_village']; ?>
                </div>
                <div class="permanent_post_office">
                    <?php echo $lang ? $owner['en_permanent_post_office'] : $owner['permanent_post_office']; ?>
                </div>
                <div class="permanent_thana">
                    <?php echo $lang ? $owner['en_permanent_thana'] : $owner['permanent_thana']; ?>
                </div>
                <div class="permanent_district">
                    <?php echo $lang ? $owner['en_permanent_district'] : $owner['permanent_district']; ?>
                </div>

                <div class="nid_number">
                    <?php echo $lang ? $owner['en_nid_number'] : $owner['nid_number']; ?>
                </div>
                <div class="business_name">
                    <?php echo $lang ? $owner['en_business_name'] : $owner['business_name']; ?>
                </div>
                <div class="business_address">
                    <?php echo $lang ? $owner['en_business_address'] : $owner['business_address']; ?>
                </div>
                <div class="business_type  business_type_none ">
                    <?php echo $lang ? $owner['en_business_type'] : $owner['business_type']; ?>
                </div>
                <div class="business_type1">
                    <?php echo $lang ? $owner['en_business_type'] : $owner['business_type']; ?>
                </div>
                <div class="tin_number">
                    <?php echo $lang ? $owner['en_tin_number'] : $owner['tin_number']; ?>
                </div>
                <div class="in_word">
                    <?php echo $lang ? $owner['en_in_words'] : $owner['in_words']; ?>
                </div>
                <div class="trade_license_fee_second">
                    <?php echo $lang ? $owner['en_trade_license_fee'] : $owner['trade_license_fee']; ?>/=
                </div>
                <div class="sign_board_tax">
                    <?php echo $lang ? $owner['en_sign_board_tax'] : $owner['sign_board_tax']; ?>
                </div>

                <div class="trade_tax">
                    <?php echo $lang ? $owner['en_trade_tax'] : $owner['trade_tax']; ?>
                </div>

                <div class="outstanding">
                    <?php echo $lang ? $owner['en_outstanding'] : $owner['outstanding']; ?>
                </div>
                <div class="surcharge">
                    <?php echo $lang ? $owner['en_surcharge'] : $owner['surcharge']; ?>
                </div>
                <div class="certificate_fee">
                    <?php echo $lang ? $owner['en_certificate_fee'] : $owner['certificate_fee']; ?>
                </div>
                <div class="total_fee">
                    <?php echo $total; ?>
                </div>

                <div class="mobile_email">
                    <?php echo $lang ? $owner['en_mobile_email'] : $owner['mobile_email']; ?>
                </div>
                <div class="image_path">
                    <img src="<?= $owner['image_path'] ?>" style="max-width:200px">
                </div>

                <div class="qr_path">
                    <?php
                    $data = $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    ?>
                    <img src="<?= $dataUri; ?>">
                </div>



            </div>


        </div>
</body>
<?php if ($print) { ?>
<script>
window.print()
</script>
<?php } ?>

</html>