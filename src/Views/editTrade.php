<?php include_once __DIR__ . '/layouts/header.php'; ?>

<?php


$fields = [
    ['label' => $lang ? 'Owner\'s Name:' : 'মালিকের নামঃ', 'name' => $lang ? 'en_name' : 'name', 'type' => 'text', 'value' => $lang ? $owner['en_name'] : $owner['name']],
    ['label' => $lang ? 'Father\'s Name:' : 'পিতার নামঃ', 'name' => $lang ? 'en_father_name' : 'father_name', 'type' => 'text', 'value' => $lang ? $owner['en_father_name'] : $owner['father_name']],
    ['label' => $lang ? 'Mother\'s Name:' : 'মাতার নামঃ', 'name' => $lang ? 'en_mother_name' : 'mother_name', 'type' => 'text', 'value' => $lang ? $owner['en_mother_name'] : $owner['mother_name']],
    [
        'label_data' => [
            'label' => $lang ? 'Current Address:' : 'বর্তমান ঠিকানাঃ',
            'label_type' => '',
        ],
        'data_array_input' => [
            ['label' => $lang ? 'Holding No:' : 'হোল্ডিনংঃ', 'name' => $lang ? 'en_holding_no' : 'holding_no', 'type' => 'text', 'value' => $lang ? $owner['en_holding_no'] ?? '' : $owner['holding_no'] ?? '', 'required' => false],
            ['label' => $lang ? 'Village:' : 'গ্রামঃ', 'name' => $lang ? 'en_village' : 'village', 'type' => 'text', 'value' => $lang ? $owner['en_village'] : $owner['village']],
            ['label' => $lang ? 'Post Office:' : 'পোঃ', 'name' => $lang ? 'en_post_office' : 'post_office', 'type' => 'text', 'value' => $lang ? $owner['en_post_office'] : $owner['post_office']],
            ['label' => $lang ? 'Thana:' : 'থানাঃ', 'name' => $lang ? 'en_thana' : 'thana', 'type' => 'text', 'value' => $lang ? $owner['en_thana'] : $owner['thana']],
            ['label' => $lang ? 'District:' : 'জেলাঃ', 'name' => $lang ? 'en_district' : 'district', 'type' => 'text', 'value' => $lang ? $owner['en_district'] : $owner['district']],
        ],
    ],
];

$fields_right = [
    [
        'label' => $lang ? 'Issue Date:' : 'ইস্যু তারিখঃ',
        'name' => $lang ? 'en_issue_date' : 'issue_date',
        'type' => 'date',
        'value' => $lang
            ? (isset($owner['en_issue_date']) ? $owner['en_issue_date'] : date('Y-m-d'))
            : (isset($owner['issue_date']) ? $owner['issue_date'] : date('Y-m-d'))
    ],
    [
        'label' => $lang ? 'Issue Time:' : 'ইস্যুর সময়ঃ',
        'name' => $lang ? 'en_issue_time' : 'issue_time',
        'type' => 'time',
        'value' => $lang
            ? (isset($owner['en_issue_time']) ? $owner['en_issue_time'] : date('H:i'))
            : (isset($owner['issue_time']) ? $owner['issue_time'] : date('H:i'))
    ],
];


$fields_2 = [
    ['label' => $lang ? 'Holding No:' : 'হোল্ডিনংঃ', 'name' => $lang ? 'en_permanent_holding_no' : 'permanent_holding_no', 'type' => 'text', 'value' => $lang ? $owner['en_permanent_holding_no'] ?? '' : $owner['permanent_holding_no'] ?? '', 'required' => false],
    ['label' => $lang ? 'Village:' : 'গ্রামঃ', 'name' => $lang ? 'en_permanent_village' : 'permanent_village', 'type' => 'text', 'value' => $lang ? $owner['en_permanent_village'] : $owner['permanent_village']],
    ['label' => $lang ? ' Post Office:' : 'পোঃ', 'name' => $lang ? 'en_permanent_post_office' : 'permanent_post_office', 'type' => 'text', 'value' => $lang ? $owner['en_permanent_post_office'] : $owner['permanent_post_office']],
    ['label' => $lang ? 'Thana:' : 'থানাঃ', 'name' => $lang ? 'en_permanent_thana' : 'permanent_thana', 'type' => 'text', 'value' => $lang ? $owner['en_permanent_thana'] : $owner['permanent_thana']],
    ['label' => $lang ? ' District:' : 'জেলাঃ', 'name' => $lang ? 'en_permanent_district' : 'permanent_district', 'type' => 'text', 'value' => $lang ? $owner['en_permanent_district'] : $owner['permanent_district']],
];

$fields_3 = [
    ['label' => $lang ? 'NID Number:' : 'এনআইডি নম্বরঃ', 'name' => $lang ? 'en_nid_number' : 'nid_number', 'type' => 'number', 'value' => $lang ? $owner['en_nid_number'] : $owner['nid_number']],
    ['label' => $lang ? 'TIN Number:' : 'টিন নম্বরঃ', 'name' => $lang ? 'en_tin_number' : 'tin_number', 'type' => 'number', 'value' => $lang ? $owner['en_tin_number'] : $owner['tin_number']],
    ['label' => $lang ? 'Business Name:' : 'ব্যবসা প্রতিষ্ঠানের নামঃ', 'name' => $lang ? 'en_business_name' : 'business_name', 'type' => 'text', 'value' => $lang ? $owner['en_business_name'] : $owner['business_name']],
    ['label' => $lang ? 'Business Address:' : 'ব্যবসা প্রতিষ্ঠানের ঠিকানাঃ', 'name' => $lang ? 'en_business_address' : 'business_address', 'type' => 'text', 'value' => $lang ? $owner['en_business_address'] : $owner['business_address']],
    ['label' => $lang ? 'Ward:' : 'ওয়ার্ড়ঃ', 'name' => $lang ? 'en_ward_no' : 'ward_no', 'type' => 'text', 'value' => $lang ? $owner['en_ward_no'] ?? '' : $owner['ward_no'] ?? ''],
];

$fields_4 = [

    ['label' => $lang ? 'Mobile or Email(If any):' : 'মোবাইল ও ইমেল (যদি থাকে):', 'name' => $lang ? 'en_mobile_email' : 'mobile_email', 'type' => 'text', 'value' => $lang ? $owner['en_mobile_email'] ?? '' : $owner['mobile_email'] ?? '', 'required' => false],

    ['label' => $lang ? 'Business Type:' : 'ব্যবসা প্রতিষ্ঠানের ধরনঃ', 'name' => $lang ? 'en_business_type' : 'business_type', 'type' => 'text', 'value' => $lang ? $owner['en_business_type'] : $owner['business_type'], 'required' => true],
    ['label' => $lang ? 'Trade License Type:' : 'ট্রেড লাইসেন্স ধরনঃ', 'name' => $lang ? 'en_trade_license_type' : 'trade_license_type', 'type' => 'text', 'value' => $lang ? $owner['en_trade_license_type'] : $owner['trade_license_type'], 'required' => true],
    ['label' => $lang ? 'Trade License Fee:' : 'ট্রেড লাইসেন্স ফিঃ', 'name' => $lang ? 'en_trade_license_fee' : 'trade_license_fee', 'type' => 'text', 'value' => $lang ? $owner['en_trade_license_fee'] : $owner['trade_license_fee'], 'required' => true],
    ['label' => $lang ? 'In Words:' : 'কথায়ঃ', 'name' => $lang ? 'en_in_words' : 'in_words', 'type' => 'text', 'value' => $lang ? $owner['en_in_words'] : $owner['in_words'], 'required' => true],
    ['label' => $lang ? 'Sign Board Tax:' : 'সাইনবোর্ড করঃ', 'name' => $lang ? 'en_sign_board_tax' : 'sign_board_tax', 'type' => 'text', 'value' => $lang ? $owner['en_sign_board_tax'] : $owner['sign_board_tax'], 'required' => false],
    ['label' => $lang ? 'Trade Tax:' : 'বাণিজ্য করঃ', 'name' => $lang ? 'en_trade_tax' : 'trade_tax', 'type' => 'text', 'value' => $lang ? $owner['en_trade_tax'] : $owner['trade_tax'], 'required' => false],
    ['label' => $lang ? 'Outstanding:' : 'বকেয়াঃ', 'name' => $lang ? 'en_outstanding' : 'outstanding', 'type' => 'text', 'value' => $lang ? $owner['en_outstanding'] : $owner['outstanding'], 'required' => false],
    ['label' => $lang ? 'Surcharge:' : 'সারচার্জঃ', 'name' => $lang ? 'en_surcharge' : 'surcharge', 'type' => 'text', 'value' => $lang ? $owner['en_surcharge'] : $owner['surcharge'], 'required' => false],
    ['label' => $lang ? 'Certificate Fee:' : 'সনদ ফিঃ', 'name' => $lang ? 'en_certificate_fee' : 'certificate_fee', 'type' => 'text', 'value' => $lang ? $owner['en_certificate_fee'] : $owner['certificate_fee'], 'required' => false],
];
?>



<form method="post" action="updateTrade" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $owner['id']; ?>">
    <input type="hidden" name="existing_image" value="<?php echo $owner['image_path']; ?>">
    <input type="hidden" name="lang" value="<?php echo $lang ? 'en' : 'bn' ?>">
    <?php if (isset($_GET['nobayon'])) : ?>
        <input type="hidden" id="nobayon" name="nobayon" value="nobayon" class="form-control">
    <?php endif; ?>
    <div class="form form-container pt-5 pb-5">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php foreach ($fields as $field) : ?>
                    <?php if (is_array($field) && isset($field['label']) && isset($field['name']) && isset($field['type'])) : ?>
                        <div class="form_group">
                            <div>
                                <label for="<?php echo $field['name']; ?>" class=""><?php echo $field['label']; ?></label>
                            </div>
                            <div class="w-100">
                                <input type="<?php echo $field['type']; ?>" id="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>" class="form-control" value="<?php echo $field['value'] ?? ''; ?>" required>
                            </div>
                        </div>
                    <?php elseif (isset($field['label_data']) && isset($field['data_array_input'])) : ?>
                        <div class="mt-3 mb-2">
                            <h5><?php echo $field['label_data']['label']; ?></h5>
                            <?php if ($field['label_data']['label_type'] === 'checkbox') : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="<?php echo $field['label_data']['name']; ?>" name="<?php echo $field['label_data']['name']; ?>">
                                    <label class="form-check-label" for="<?php echo $field['label_data']['name']; ?>">
                                        <?php echo $field['label_data']['check_label']; ?>
                                    </label>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php foreach ($field['data_array_input'] as $field_input) : ?>
                            <div class="form_group">
                                <div>
                                    <label for="<?php echo $field_input['name']; ?>" class=""><?php echo $field_input['label']; ?></label>
                                </div>
                                <div class="w-100">
                                    <input type="<?php echo $field_input['type']; ?>" id="<?php echo $field_input['name']; ?>" name="<?php echo $field_input['name']; ?>" class="form-control" value="<?php echo $field_input['value'] ?? ''; ?>" required>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?php foreach ($fields_right as $field) : ?>
                    <?php if (is_array($field) && isset($field['label']) && isset($field['name']) && isset($field['type'])) : ?>
                        <div class="form_group mb-3">
                            <div>
                                <label for="<?php echo $field['name']; ?>" class=""><?php echo $field['label']; ?></label>
                            </div>
                            <div class="w-100">
                                <input type="<?php echo $field['type']; ?>" id="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>" class="form-control" value="<?php echo $field['value'] ?? ''; ?>" required>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="form-group row mt-3">
                    <div class="col-md-12">
                        <div class="upload-container">
                            <div class="border-container" id="drop-area" style="width: 250px;height:168px">
                                <div style="width: 250px;height:168px">
                                    <img id="imagePreview" class="mg-fluid" <?php if ($owner['image_path']) : ?> src="<?php echo $owner['image_path'] ?? ''; ?>" <?php endif; ?> style="width: 100%;height: 100%;object-fit: contain; display: <?php echo $owner['image_path'] ? 'block' : 'none'; ?>;" />
                                </div>
                                <input type="file" id="file-upload" class="d-none" name="image">
                            </div>
                        </div>
                        <button type="button" id="file-browser" class="btn btn-primary custom_btn_primary mt-3">
                            Upload Picture
                        </button>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6"></div>
            <div class="col-lg-6 col-md-6"></div>
            <div class="col-lg-6 col-md-6">
                <div class="d-block  mt-3">
                    <h5 for=""> <?php echo $lang ? 'Permanent address' : 'স্থায়ী ঠিকানা'  ?></h5>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permanent_address_status" class="permanent_address_status" name="permanent_address_status">
                    <label class="form-check-label" for="permanent_address_status">

                        <?php echo $lang ? 'If current and permanent address are same then check:' : 'বর্তমান ও স্থায়ী ঠিকানা একই হলে টিক চিহ্ন দাওঃ'  ?>
                    </label>
                </div>
                <?php foreach ($fields_2 as $field) : ?>
                    <div class="form_group mb-3">
                        <div>
                            <label for="<?php echo $field['name']; ?>" class=""><?php echo $field['label']; ?></label>
                        </div>
                        <div class="w-100">
                            <input type="<?php echo $field['type']; ?>" id="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>" class="form-control" value="<?php echo $field['value'] ?? ''; ?>" required>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6 col-md-6"></div>
            <div class="col-lg-6 col-md-6">
                <?php foreach ($fields_3 as $field) : ?>
                    <div class="form_group mb-3">
                        <div>
                            <label for="<?php echo $field['name']; ?>" class=""><?php echo $field['label']; ?></label>
                        </div>
                        <div class="w-100">
                            <input type="<?php echo $field['type']; ?>" id="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>" class="form-control" value="<?php echo $field['value']; ?>" required>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <?php foreach ($fields_4 as $field) : ?>
                        <div class="form_group mb-3 col-lg-6 col-md-6">
                            <div>
                                <label for="<?php echo $field['name']; ?>" class=""><?php echo $field['label']; ?></label>
                            </div>
                            <div class="w-100">
                                <input type="<?php echo $field['type']; ?>" id="<?php echo $field['name']; ?>" name="<?php echo $field['name']; ?>" class="form-control" value="<?php echo isset($field['value']) ? $field['value'] : ''; ?>" <?php if ($field['required']) {
                                                                                                                                                                                                                                                    echo 'required';
                                                                                                                                                                                                                                                } ?>>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="form-group row mb-0 mt50">
            <div class="col-md-6 offset-md-4 center_btn">

                <button class="btn btn-primary custom_btn_primary" type="submit">
                    Click for save & print preview
                </button>
            </div>
        </div>
    </div>
</form>

<?php include_once __DIR__ . '/layouts/footer.php'; ?>