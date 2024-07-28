<?php include_once __DIR__ . '/layouts/header.php'; ?>
<style>
    .trade_preview .qr_code img {
        width: 100px;
        /* Adjust size as needed */
    }

    .trade_preview .profile img {
        width: 100px;
        /* Adjust size as needed */
    }
</style>
<div class="trade_preview">
    <div class="row align-items-center">
        <div class="col-md-6 order-md-1">
            <div class="qr_code">
                <img class="d-block w-100" src="<?= $dataUri ?>" alt="QR Code">
            </div>
        </div>
        <div class="col-md-6 order-md-3">
            <div class="profile" style="
    width: 200px;
    float: right;
">
                <?php if ($owner['image_path']) : ?>
                    <img class="d-block w-100" src="<?php echo htmlspecialchars($owner['image_path']); ?>" alt="Owner Image">
                <?php else : ?>
                    <img class="d-block w-100" src="assets/img/profile.jpg" alt="Profile Image">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <p> <?php echo $lang ? '' : ' ইস্যু তারিখঃ'; ?>
                <?php echo $lang ? $owner['en_issue_date'] : htmlspecialchars($owner['issue_date']); ?>
            </p>
            <p><?php echo $lang ? '' : ' ইস্যু সময়ঃ' ?> <?php echo htmlspecialchars($owner['issue_time']); ?></p>
            <p><?php echo $lang ? '' : ' ট্রেড লাইসেন্স নং-' ?>
                <?php echo $lang ? htmlspecialchars($owner['license_no']) : htmlspecialchars($owner['license_no']); ?>
            </p>
        </div>
        <div class="col-md-6">
            <p><?php echo $lang ? htmlspecialchars($owner['en_name'] ?? "") : htmlspecialchars($owner['name'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? '' : '' ?>
                <?php echo $lang ? htmlspecialchars($owner['en_father_name'] ?? "") : htmlspecialchars($owner['father_name'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_mother_name'] ?? "") : htmlspecialchars($owner['mother_name'] ?? ""); ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-start">
            <p> <?php echo $lang ? htmlspecialchars($owner['en_village'] ?? "") : htmlspecialchars($owner['village'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_post_office'] ?? "") : htmlspecialchars($owner['post_office'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_thana'] ?? "") : htmlspecialchars($owner['thana'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_district'] ?? "") : htmlspecialchars($owner['district'] ?? ""); ?>
            </p>
        </div>
        <div class="col-md-6 text-end">
            <p> <?php echo $lang ? htmlspecialchars($owner['en_permanent_village'] ?? "") : htmlspecialchars($owner['permanent_village'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_permanent_post_office'] ?? "") : htmlspecialchars($owner['permanent_post_office'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_permanent_thana'] ?? "") : htmlspecialchars($owner['permanent_thana'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_permanent_district'] ?? "") : htmlspecialchars($owner['permanent_district'] ?? ""); ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p><?php echo $lang ? htmlspecialchars($owner['en_nid_number'] ?? "") : htmlspecialchars($owner['nid_number'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_business_name'] ?? "") : htmlspecialchars($owner['business_name'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_business_address'] ?? "") : htmlspecialchars($owner['business_address'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_business_type'] ?? "") : htmlspecialchars($owner['business_type'] ?? ""); ?>
            </p>
            <p> <?php echo $lang ? htmlspecialchars($owner['en_trade_license_type'] ?? "") : htmlspecialchars($owner['trade_license_type'] ?? ""); ?>
            </p>
        </div>
        <div class="col-md-6">
            <div class="ps-5">
                <p><?php echo $lang ? htmlspecialchars($owner['en_trade_license_fee'] ?? "") : htmlspecialchars($owner['trade_license_fee'] ?? ""); ?>/=
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="ps-5">
                <br />
                <br />
                <br />
                <p><?php echo $lang ? htmlspecialchars($owner['en_trade_license_fee'] ?? "") : htmlspecialchars($owner['trade_license_fee'] ?? ""); ?>/=
                </p>
                <p><?php echo $lang ? htmlspecialchars($owner['en_in_words'] ?? "") : htmlspecialchars($owner['in_words'] ?? ""); ?>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center ">
            <?php if (isset($_GET['id_num']) && $_GET['history'] === 'yes_' . $_GET['id_num']) { ?>
                <a class="btn btn-primary custom_btn_primary" href="show_print_preview?id=<?= $_GET['id_num']; ?>&lang=<?php echo $lang ? 'en' : 'bn' ?>&history=<?= $_GET['history']; ?>">
                    Print
                </a>
            <?php } else { ?>
                <div class="form-group row mb-0 mt50 mb-5">
                    <div class="col-md-4">
                        <a class="btn btn-primary custom_btn_primary w-100" href="show_print_preview?id=<?= $owner['id']; ?>&lang=<?php echo $lang ? 'en' : 'bn' ?>">
                            Print
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form method="GET" action="search_form">
                            <input type="hidden" name="license_no" value="<?php echo $owner['license_no'] ?>">
                            <input type="hidden" name="nid" value="<?php echo $owner['nid_number'] ?>">
                            <input type="hidden" name="lang" value="<?php echo $lang ? 'bn' : 'en' ?>">
                            <?php if (isset($_GET['nobayon'])) : ?>
                                <input type="hidden" id="nobayon" name="nobayon" value="nobayon" class="form-control">
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary custom_btn_primary  w-100" style="background: #0883BE;border: 1px solid #0883BE;">
                                <?php echo $lang ? 'Bangla version' : 'English version' ?>
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a type="button" class="btn btn-primary custom_btn_primary  w-100" style="
    background: var(--red);
" href="editTrade?id=<?= $owner['id']; ?>&lang=<?= $lang ? 'en' : 'bn' ?><?= isset($_GET['nobayon']) ? '&nobayon=nobayon' : '' ?>">
                            Modify
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if (isset($owner_histories)) { ?>
        <div class="form-group row mb-0 mt50 mb-5">
            <div class="col-lg-12 border p-3">
                <h4><?php echo $lang ? 'Issue History:' : ' Issue History:'; ?></h4>
                <?php foreach ($owner_histories as $item) { ?>
                    <p> <?php echo $lang ? 'Issue Date' : ' ইস্যু তারিখঃ'; ?>
                        <?php echo $lang ? $item['en_issue_date'] ?? $item['issue_date']  : htmlspecialchars($item['issue_date']); ?>
                        <a href="search_form?license_no=<?= $item['license_no']; ?>&nid=<?= $item['nid_number']; ?>&lang=<?= $lang ? 'en' : 'bn'; ?>&id_num=<?= $item['id']; ?>&history=yes_<?= $item['id']; ?>">href</a>
                    </p>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php include_once __DIR__ . '/layouts/footer.php'; ?>