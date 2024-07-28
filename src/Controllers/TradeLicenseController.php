<?php

namespace App\Controllers;

require_once __DIR__ . '../../../vendor/autoload.php';

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class TradeLicenseController
{
    public function index()
    {
        // Fetch all banners from the database
        $pdo = require_once __DIR__ . '/../../config/database.php';
        if (!$pdo instanceof \PDO) {
            throw new \Exception("Failed to get PDO instance from the database configuration.");
        }

        $condition = "WHERE 1";
        $params = [];
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 25;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $search = "";
        // Search logic
        if (isset($_GET['search'])) {
            $search = $_GET['search'] ?? '';
            $condition .= " AND (
                owners.name LIKE :search OR
                owners.en_name LIKE :search OR
                owners.license_no LIKE :search OR
                owners.en_license_no LIKE :search OR
                owners.father_name LIKE :search OR
                owners.en_father_name LIKE :search OR
                owners.mother_name LIKE :search OR
                owners.en_mother_name LIKE :search OR
                owners.village LIKE :search OR
                owners.en_village LIKE :search OR
                owners.ward_no LIKE :search OR
                owners.en_ward_no LIKE :search
            )";
            $params[':search'] = "%$search%";
        }

        // Retrieve total records count
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM owners $condition");
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, \PDO::PARAM_STR);
        }
        $stmt->execute();
        $total_row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $total_records = $total_row['total'];

        // Calculate total pages
        $total_pages = ceil($total_records / $limit);

        // Fetch paginated results
        $stmt = $pdo->prepare("SELECT * FROM owners $condition ORDER BY owners.id DESC LIMIT :start, :limit");
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, \PDO::PARAM_STR);
        }
        $stmt->bindValue(':start', $start, \PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        $lists = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $pagination = $this->generatePagination($total_pages, $page, $search, $limit);

        // Render view to display banners
        require_once __DIR__ . '/../Views/admin/Trade/index.php';
    }

    public function generatePagination($total_pages, $page, $search, $limit)
    {
        $links = '';
        $url = "admin/trade?search=" . $search . "&limit=$limit&page=";

        // Previous link
        if ($page > 1) {
            $links .= "<li class='page-item'><a class='page-link' href='{$url}1'>First</a></li>";
            $prev = $page - 1;
            $links .= "<li class='page-item'><a class='page-link' href='{$url}{$prev}'>&laquo;</a></li>";
        }

        // Numbered links
        for ($i = max(1, $page - 2); $i <= min($page + 2, $total_pages); $i++) {
            if ($i == $page) {
                $links .= "<li class='page-item active'><a class='page-link' href='{$url}{$i}'>$i</a></li>";
            } else {
                $links .= "<li class='page-item'><a class='page-link' href='{$url}{$i}'>$i</a></li>";
            }
        }

        // Next link
        if ($page < $total_pages) {
            $next = $page + 1;
            $links .= "<li class='page-item'><a class='page-link' href='{$url}{$next}'>&raquo;</a></li>";
            $links .= "<li class='page-item'><a class='page-link' href='{$url}{$total_pages}'>Last</a></li>";
        }

        return $links;
    }

    public function showsearchform()
    {
        require_once __DIR__ . '/../Views/trade_search.php';
    }

    public function save()
    {
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';

        $name = $_POST['name'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $village = $_POST['village'];
        $post_office = $_POST['post_office'];
        $thana = $_POST['thana'];
        $district = $_POST['district'];
        $permanent_village = $_POST['permanent_village'];
        $permanent_post_office = $_POST['permanent_post_office'];
        $permanent_thana = $_POST['permanent_thana'];
        $permanent_district = $_POST['permanent_district'];
        $nid_number = $_POST['nid_number'];
        $tin_number = $_POST['tin_number'];
        $business_name = $_POST['business_name'];
        $business_address = $_POST['business_address'];
        $business_type = $_POST['business_type'];
        $trade_license_type = $_POST['trade_license_type'];
        $trade_license_fee = $_POST['trade_license_fee'];
        $in_words = $_POST['in_words'];
        $issue_date = $_POST['issue_date'];
        $issue_time = $_POST['issue_time'];

        $sign_board_tax = $_POST['sign_board_tax'];
        $trade_tax = $_POST['trade_tax'];
        $outstanding = $_POST['outstanding'];
        $surcharge = $_POST['surcharge'];
        $certificate_fee = $_POST['certificate_fee'];
        $ward_no = $_POST['ward_no'];
        $holding_no = $_POST['holding_no'];
        $permanent_holding_no = $_POST['permanent_holding_no'];
        $mobile_email = $_POST['mobile_email'];



        // Ensure the uploads directory exists
        $uploadDir = __DIR__ . '/../../public/uploads/trade/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $image_path = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Add current time to the file name
            $newFileName = time() . '_' . basename($_FILES['image']['name']);
            $image_path = 'uploads/trade/' . $newFileName;
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newFileName)) {
                echo "Failed to upload image.";
                return;
            }
        }


        $pdo = require_once __DIR__ . '/../../config/database.php';

        // Generate unique license number
        $stmt = $pdo->query('SELECT COUNT(*) AS total FROM owners');
        $result = $stmt->fetch();
        $total = $result['total'] + 1;
        $license_no = 'CUP' . str_pad($total, 4, '0', STR_PAD_LEFT);

        $stmt = $pdo->prepare('INSERT INTO owners 
            (name, father_name, mother_name, village, post_office, thana, district, 
            permanent_village, permanent_post_office, permanent_thana, permanent_district, 
            nid_number, tin_number, business_name, business_address, business_type, 
            trade_license_type, trade_license_fee, in_words, issue_date, issue_time, image_path, license_no,sign_board_tax,trade_tax,outstanding,surcharge,certificate_fee,ward_no,holding_no,permanent_holding_no,mobile_email) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)');
        $stmt->execute([
            $name, $father_name, $mother_name, $village, $post_office, $thana, $district,
            $permanent_village, $permanent_post_office, $permanent_thana, $permanent_district,
            $nid_number, $tin_number, $business_name, $business_address, $business_type,
            $trade_license_type, $trade_license_fee, $in_words, $issue_date, $issue_time, $image_path, $license_no, $sign_board_tax, $trade_tax, $outstanding, $surcharge, $certificate_fee, $ward_no, $holding_no, $permanent_holding_no, $mobile_email
        ]);

        // Redirect to the trade_preview page with the last inserted ID
        header('Location: trade_preview?id=' . $pdo->lastInsertId());
        exit;
    }

    public function showEditForm()
    {
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';
        if (!isset($_GET['id'])) {
            echo "ID not provided.";
            return;
        }

        $id = $_GET['id'];

        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM owners WHERE id = ?');
        $stmt->execute([$id]);
        $owner = $stmt->fetch();


        if (!$owner) {
            echo "Owner not found.";
            return;
        }

        require_once __DIR__ . '/../Views/editTrade.php';
    }

    public function update()
    {


        $lang = isset($_POST['lang']) && $_POST['lang'] === 'en';
        $nobayon = null;
        if (isset($_POST['nobayon'])) {
            $nobayon = $_POST['nobayon'];
        }

        $id = $_POST['id'];


        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM owners WHERE id = ?');
        $stmt->execute([$id]);
        $exists = $stmt->fetch();


        $uploadDir = __DIR__ . '/../../public/uploads/trade/';
        $image_path = $exists['image_path'] ?? null; // Default to current image path

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Delete the previous image file

            if ($exists['image_path'] && file_exists(__DIR__ . '/../../public/' . $exists['image_path'])) {
                unlink(__DIR__ . '/../../public/' . $exists['image_path']);
            }

            // Upload new image
            $newFileName = time() . '_' . basename($_FILES['image']['name']);
            $image_path = 'uploads/trade/' . $newFileName;
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newFileName)) {
                echo "Failed to upload image.";
                exit;
            }
        }

        try {
            // Your existing code
            if ($nobayon && $exists) {
                $stmt = $pdo->prepare('
            INSERT INTO owners_old 
            (
                name,father_name,mother_name,
                village,post_office,thana,district,
                permanent_village,permanent_post_office,permanent_thana,permanent_district,
                nid_number,tin_number,
                business_name,business_address,business_type,
                trade_license_type,trade_license_fee,in_words,
                issue_date,issue_time,image_path,license_no,
                en_name,en_father_name,en_mother_name,en_village,en_post_office,
                en_thana,en_district,en_permanent_village,en_permanent_post_office,en_permanent_thana,en_permanent_district,en_nid_number,en_tin_number,en_business_name,en_business_address,en_business_type,en_trade_license_type,en_trade_license_fee,en_in_words,en_issue_date,en_issue_time,en_license_no,sign_board_tax,trade_tax,outstanding,surcharge,certificate_fee,en_sign_board_tax,en_trade_tax,en_outstanding,en_surcharge,en_certificate_fee,en_ward_no,ward_no,holding_no,permanent_holding_no,en_holding_no,en_permanent_holding_no,mobile_email,en_mobile_email,
                parent_id
            ) 
            VALUES 
            (
                ?,?,?,?,?,?,?,?,?,?,
                ?,?,?,?,?,?,?,?,?,?,
                ?,?,?,?,?,?,?,?,?,?,
                ?,?,?,?,?,?,?,?,?,?,
                ?,?,?,?,?,?,
                ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
            )
        ');

                $stmt->execute([
                    $exists['name'] ?? '',
                    $exists['father_name'] ?? '',
                    $exists['mother_name'] ?? '',
                    $exists['village'] ?? '',
                    $exists['post_office'] ?? '',
                    $exists['thana'] ?? '',
                    $exists['district'] ?? '',
                    $exists['permanent_village'] ?? '',
                    $exists['permanent_post_office'] ?? '',
                    $exists['permanent_thana'] ?? '',
                    $exists['permanent_district'] ?? '',
                    $exists['nid_number'],
                    $exists['tin_number'],
                    $exists['business_name'] ?? '',
                    $exists['business_address'] ?? '',
                    $exists['business_type'] ?? '',
                    $exists['trade_license_type'] ?? '',
                    $exists['trade_license_fee'] ?? '',
                    $exists['in_words'] ?? '',
                    $exists['issue_date'] ?? '',
                    $exists['issue_time'] ?? '',
                    $exists['image_path'] ?? '',
                    $exists['license_no'] ?? '',
                    $exists['en_name'] ?? '',
                    $exists['en_father_name'] ?? '',
                    $exists['en_mother_name'] ?? '',
                    $exists['en_village'] ?? '',
                    $exists['en_post_office'] ?? '',
                    $exists['en_thana'] ?? '',
                    $exists['en_district'] ?? '',
                    $exists['en_permanent_village'] ?? '',
                    $exists['en_permanent_post_office'] ?? '',
                    $exists['en_permanent_thana'] ?? '',
                    $exists['en_permanent_district'] ?? '',
                    $exists['en_nid_number'],
                    $exists['en_tin_number'] ?? '',
                    $exists['en_business_name'] ?? '',
                    $exists['en_business_address'] ?? '',
                    $exists['en_business_type'] ?? '',
                    $exists['en_trade_license_type'] ?? '',
                    $exists['en_trade_license_fee'] ?? '',
                    $exists['en_in_words'] ?? '',
                    $exists['en_issue_date'] ?? '',
                    $exists['en_issue_time'] ?? '',
                    $exists['en_license_no'] ?? '',
                    $exists['sign_board_tax'] ?? '',
                    $exists['trade_tax'] ?? '',
                    $exists['outstanding'] ?? '',
                    $exists['surcharge'] ?? '',
                    $exists['certificate_fee'] ?? '',
                    $exists['en_sign_board_tax'] ?? '',
                    $exists['en_trade_tax'] ?? '',
                    $exists['en_outstanding'] ?? '',
                    $exists['en_surcharge'] ?? '',
                    $exists['en_certificate_fee'] ?? '',
                    $exists['en_ward_no'] ?? '',
                    $exists['ward_no'] ?? '',
                    $exists['holding_no'] ?? '',
                    $exists['permanent_holding_no'] ?? '',
                    $exists['en_holding_no'] ?? '',
                    $exists['en_permanent_holding_no'] ?? '',
                    $exists['mobile_email'] ?? '',
                    $exists['en_mobile_email'] ?? '',
                    $exists['id']
                ]);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }


        // english 
        if (isset($_POST['lang']) && $_POST['lang'] === 'en') {
            $stmt = $pdo->prepare('UPDATE owners SET 
                en_name = ?, 
                en_father_name = ?, 
                en_mother_name = ?, 
                en_village = ?, 
                en_post_office = ?, 
                en_thana = ?, 
                en_district = ?, 
                en_permanent_village = ?, 
                en_permanent_post_office = ?, 
                en_permanent_thana = ?, 
                en_permanent_district = ?, 
                en_nid_number = ?, 
                en_tin_number = ?, 
                en_business_name = ?, 
                en_business_address = ?, 
                en_business_type = ?, 
                en_trade_license_type = ?, 
                en_trade_license_fee = ?, 
                en_in_words = ?, 
                en_issue_date = ?, 
                en_issue_time = ?, 
                image_path = ?,
                en_sign_board_tax = ?,
                en_trade_tax = ?,
                en_outstanding = ?,
                en_surcharge = ?,
                en_certificate_fee = ?,
                en_ward_no = ?,
                en_holding_no = ?,
                en_permanent_holding_no = ?,
                en_mobile_email = ?
                WHERE id = ?');

            $values = [
                $_POST['en_name'],
                $_POST['en_father_name'],
                $_POST['en_mother_name'],
                $_POST['en_village'],
                $_POST['en_post_office'],
                $_POST['en_thana'],
                $_POST['en_district'],
                $_POST['en_permanent_village'],
                $_POST['en_permanent_post_office'],
                $_POST['en_permanent_thana'],
                $_POST['en_permanent_district'],
                $_POST['en_nid_number'],
                $_POST['en_tin_number'],
                $_POST['en_business_name'],
                $_POST['en_business_address'],
                $_POST['en_business_type'],
                $_POST['en_trade_license_type'],
                $_POST['en_trade_license_fee'],
                $_POST['en_in_words'],
                $_POST['en_issue_date'],
                $_POST['en_issue_time'],
                $image_path ?? "",
                $_POST['en_sign_board_tax'],
                $_POST['en_trade_tax'],
                $_POST['en_outstanding'],
                $_POST['en_surcharge'],
                $_POST['en_certificate_fee'],
                $_POST['en_ward_no'],
                $_POST['en_holding_no'],
                $_POST['en_permanent_holding_no'],
                $_POST['en_mobile_email'],
                $id
            ];
            $stmt->execute($values);
        } else {
            $stmt = $pdo->prepare('UPDATE owners SET 
                name = ?, 
                father_name = ?, 
                mother_name = ?, 
                village = ?, 
                post_office = ?, 
                thana = ?, 
                district = ?, 
                permanent_village = ?, 
                permanent_post_office = ?, 
                permanent_thana = ?, 
                permanent_district = ?, 
                nid_number = ?, 
                tin_number = ?, 
                business_name = ?, 
                business_address = ?, 
                business_type = ?, 
                trade_license_type = ?, 
                trade_license_fee = ?, 
                in_words = ?, 
                issue_date = ?, 
                issue_time = ?, 
                image_path = ?,
                sign_board_tax = ?,
                trade_tax = ?,
                outstanding = ?,
                surcharge = ?,
                certificate_fee = ?,
                ward_no = ?,
                holding_no = ?,
                permanent_holding_no = ?,
                mobile_email = ?
                WHERE id = ?');

            $values = [
                $_POST['name'],
                $_POST['father_name'],
                $_POST['mother_name'],
                $_POST['village'],
                $_POST['post_office'],
                $_POST['thana'],
                $_POST['district'],
                $_POST['permanent_village'],
                $_POST['permanent_post_office'],
                $_POST['permanent_thana'],
                $_POST['permanent_district'],
                $_POST['nid_number'],
                $_POST['tin_number'],
                $_POST['business_name'],
                $_POST['business_address'],
                $_POST['business_type'],
                $_POST['trade_license_type'],
                $_POST['trade_license_fee'],
                $_POST['in_words'],
                $_POST['issue_date'],
                $_POST['issue_time'],
                $image_path ?? "",
                $_POST['sign_board_tax'],
                $_POST['trade_tax'],
                $_POST['outstanding'],
                $_POST['surcharge'],
                $_POST['certificate_fee'],
                $_POST['ward_no'],
                $_POST['holding_no'],
                $_POST['permanent_holding_no'],
                $_POST['mobile_email'],
                $id
            ];
            $stmt->execute($values);
        }

        // Redirect to the trade_preview page with the updated ID
        $langCode = $lang ? 'en' : 'bn';

        // Redirect to the trade_preview page with the updated ID and lang parameter
        header('Location: trade_preview?id=' . $id . '&lang=' . $langCode);
        exit;
    }

    public function search_form()
    {
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';

        if (!isset($_POST['nid']) && !isset($_POST['license_no'])) {
            echo "ID not provided.";
            return;
        }

        $nid = $_POST['nid'];
        $license = $_POST['license_no'];


        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM owners WHERE nid_number = ? and license_no=?');
        $stmt->execute([$nid, $license]);
        $owner = $stmt->fetch();

        if (!$owner) {
            echo "Owner not found.";
            return;
        }

        require_once __DIR__ . '/../../src/Views/trade_preview.php';
    }

    public function create_qr($id)
    {
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($_ENV['APP_URL'] . "show_print_preview?id=" . $id . "&lang=en")
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(__DIR__ . '/../../public/assets/img/logo.png')
            ->setResizeToWidth(50)
            ->setPunchoutBackground(true);


        $result = $writer->write($qrCode, $logo);



        // or create a response object
        $dataUri = $result->getDataUri();
        return $dataUri;
    }

    public function search_form_lang()
    {
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';

        $history = null;
        if (isset($_GET['history'])) {
            if ($_GET['history'] === 'yes_' . $_GET['id_num']) {
                $history = $_GET['history'];
            }
        }

        if (!isset($_GET['nid']) && !isset($_GET['license_no'])) {
            echo "ID not provided.";
            return;
        }

        $nid = $_GET['nid'];
        $license = $_GET['license_no'];

        $pdo = require_once __DIR__ . '/../../config/database.php';
        if ($history) {
            $stmt = $pdo->prepare('SELECT * FROM owners_old WHERE nid_number = ? and license_no=? and id=?');
            $stmt->execute([$nid, $license, $_GET['id_num']]);
            $owner = $stmt->fetch();
        } else {

            $stmt = $pdo->prepare('SELECT * FROM owners WHERE nid_number = ? and license_no=?');
            $stmt->execute([$nid, $license]);
            $owner = $stmt->fetch();

            // history list 
            $stmtHistory = $pdo->prepare('SELECT id,issue_date,license_no,nid_number,parent_id FROM owners_old WHERE parent_id = ? ');
            $stmtHistory->execute([$owner['id']]);
            $owner_histories = $stmtHistory->fetchAll();
        }

        // echo '<pre>';
        // print_r($owner);
        // echo '</pre>';

        $dataUri = $this->create_qr($owner['id']);



        if (!$owner) {
            echo "Owner not found.";
            return;
        }

        require_once __DIR__ . '/../../src/Views/trade_preview.php';
    }



    public function showPreview()
    {
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';
        if (!isset($_GET['id'])) {
            echo "ID not provided.";
            return;
        }

        $id = $_GET['id'];

        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM owners WHERE id = ?');
        $stmt->execute([$id]);
        $owner = $stmt->fetch();

        if (!$owner) {
            echo "Owner not found.";
            return;
        }
        $dataUri = $this->create_qr($id);

        require_once __DIR__ . '/../../src/Views/trade_preview.php';
    }

    public function show_print_preview()
    {
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';
        if (!isset($_GET['id'])) {
            echo "ID not provided.";
            return;
        }
        $history = null;
        if (isset($_GET['history'])) {
            if ($_GET['history'] === 'yes_' . $_GET['id']) {
                $history = $_GET['history'];
            }
        }
        $id = $_GET['id'];

        $pdo = require_once __DIR__ . '/../../config/database.php';
        if ($history) {
            $stmt = $pdo->prepare('SELECT * FROM owners_old WHERE id = ? ');
            $stmt->execute([$id]);
            $owner = $stmt->fetch();
        } else {
            $stmt = $pdo->prepare('SELECT * FROM owners WHERE id = ?');
            $stmt->execute([$id]);
            $owner = $stmt->fetch();
        }



        if (!$owner) {
            echo "Owner not found.";
            return;
        }



        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($_ENV['APP_URL'] . "show_print_preview?id=" . $id . "&lang=en")
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(__DIR__ . '/../../public/assets/img/logo.png')
            ->setResizeToWidth(50)
            ->setPunchoutBackground(true);


        $result = $writer->write($qrCode, $logo);
        $print = true;



        // or create a response object
        $dataUri = $this->create_qr($id);





        require_once __DIR__ . '/../../src/Views/trade_print.php';
    }
    public function print_preview()
    {

        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';
        if (!isset($_GET['license_no'])) {
            echo "License not provided.";
            return;
        }
        $license = $_GET['license_no'];

        $pdo = require_once __DIR__ . '/../../config/database.php';
        $stmt = $pdo->prepare('SELECT * FROM owners WHERE license_no = ?');
        $stmt->execute([$license]);
        $owner = $stmt->fetch();
        $lang = isset($_GET['lang']) && $_GET['lang'] === 'en';
        if ($owner['en_nid_number']) {
            $lang = "en";
        }

        $dataUri = $this->create_qr($owner['id']);


        if (!$owner) {
            echo "Owner not found.";
            return;
        }

        $print = false;

        require_once __DIR__ . '/../../src/Views/trade_print.php';
    }
}
