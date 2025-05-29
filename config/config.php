<?php
$spreadsheetId = '1uWNAu60PW9my7jojoZaz8QwpC5L2_bGgydjqp2KVICE';
$csvUrl = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}/export?format=csv";

$csvData = file_get_contents($csvUrl);
if ($csvData === false) {
    die("ไม่สามารถดึงข้อมูลจาก Google Spreadsheet ได้");
}

$STORE_OPEN = 0;
$STORE_CLOSE = 0;
$STORE_ALL = 0;

date_default_timezone_set('Asia/Bangkok');
$now = new DateTime();

$thai_day = [
    'Sunday' => 'วันอาทิตย์',
    'Monday' => 'วันจันทร์',
    'Tuesday' => 'วันอังคาร',
    'Wednesday' => 'วันพุธ',
    'Thursday' => 'วันพฤหัสบดี',
    'Friday' => 'วันศุกร์',
    'Saturday' => 'วันเสาร์'
];

$thai_month = [
    '', 'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน',
    'กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'
];

$dayOfWeek = $thai_day[$now->format('l')];
$day = $now->format('j');
$month = $thai_month[(int)$now->format('n')];
$year = (int)$now->format('Y') + 543;

$rows = array_map('str_getcsv', explode("\n", trim($csvData)));
$header = array_map('trim', array_shift($rows));

// ฟังก์ชันแก้พิกัดที่ไม่มีจุดทศนิยม
function fixCoordinate($value) {
    $value = trim($value);
    if (is_numeric($value)) {
        if (strpos($value, '.') === false && strlen($value) >= 8) {
            return floatval(substr($value, 0, 3) . '.' . substr($value, 3));
        }
        return floatval($value);
    }
    return null;
}

$data = [];

foreach ($rows as $row) {
    if (!is_array($row)) continue;
    if (count($row) < count($header)) continue;

    $row = array_map('trim', $row);

    $latlngRaw = isset($row[22]) ? $row[22] : '';
    $lngFromCol1 = isset($row[1]) ? $row[1] : '';
    $name = isset($row[0]) ? $row[0] : '';

    // ตรวจสอบค่า lat,lng
    if (strpos($latlngRaw, ',') === false) continue; // ไม่มี lat,lng
    list($latRaw, $lngRaw) = explode(',', $latlngRaw);

    $lat = fixCoordinate($latRaw);
    $lng = fixCoordinate($lngRaw);

    if (!is_numeric($lat) || !is_numeric($lng)) continue;
    if ($lat < 0 || $lng < 0) continue;

    // ตรวจสอบข้อมูลสถานะ
    $status_company = isset($row[7]) ? $row[7] : '';
    if ($status_company == "คงอยู่") {
        $STORE_OPEN++;
    } elseif ($status_company == "ยกเลิก") {
        $STORE_CLOSE++;
    }

    $STORE_ALL++;

    $data[] = [
        'name' => isset($row[10]) ? $row[10] : '',
        'company' => isset($row[11]) ? $row[11] : '',
        'type' => $lngFromCol1,
        'type_license' => isset($row[12]) ? $row[12] : '',
        'number_license' => isset($row[2]) ? $row[2] : '',
        'permit_date' => isset($row[3]) ? $row[3] : '',
        'expire_date' => isset($row[4]) ? $row[4] : '',
        'status_permission' => isset($row[6]) ? $row[6] : '',
        'status_company' => $status_company,
        'address' => (isset($row[13]) ? $row[13] : '') .
                     (isset($row[14]) ? $row[14] : '') . " " .
                     (isset($row[15]) ? $row[15] : '') . " " .
                     (isset($row[16]) ? $row[16] : '') . " " .
                     (isset($row[17]) ? $row[17] : '') . " " .
                     (isset($row[19]) ? $row[19] : '') . " " .
                     (isset($row[20]) ? $row[20] : ''),
        'district' => isset($row[18]) ? $row[18] : '',
        'tel' => isset($row[21]) ? $row[21] : '',
        'status' => isset($row[9]) ? $row[9] : '',
        'lat' => $lat,
        'lng' => $lng,
    ];
}

// ส่งข้อมูลเป็น JSON ไปใช้ต่อ
$jsonShops = json_encode($data);
?>
