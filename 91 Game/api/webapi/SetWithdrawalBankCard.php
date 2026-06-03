<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
if (isset($_COOKIE['token'])) {
    $servername = "localhost";
    $dbUsername = "abcoders_db";
    $dbPassword = "abcoders_db";
    $dbName = "abcoders_db";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $token = $_COOKIE['token'];

    $sql = "SELECT * FROM users WHERE token = '$token'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['phone'];

            $sql_check_card = "SELECT * FROM user_bank WHERE phone = '$username'";
            $result_check_card = $conn->query($sql_check_card);

            if ($result_check_card && $result_check_card->num_rows > 0) {
                $response = [
                    "code" => 1,
                    "msg" => "You have already bound a bank card, please contact customer service to modify",
                    "msgCode" => 207,
                    "serviceNowTime" => date('Y-m-d H:i:s', time())
                ];
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
            }

            $payload = file_get_contents("php://input");
            $data = json_decode($payload, true);

            $bankid = isset($data['bankid']) ? $data['bankid'] : '';
            $accountno = isset($data['accountno']) ? $data['accountno'] : '';
            $bankbranchaddress = isset($data['bankbranchaddress']) ? $data['bankbranchaddress'] : '';
            $email = isset($data['email']) ? $data['email'] : '';
            $beneficiaryname = isset($data['beneficiaryname']) ? $data['beneficiaryname'] : '';

            switch ($bankid) {
                case 16:
        $name_bank = "Bank of Baroda";
        break;
    case 15:
        $name_bank = "Union Bank of India";
        break;
    case 14:
        $name_bank = "Central Bank of India";
        break;
    case 13:
        $name_bank = "Yes Bank";
        break;
    case 12:
        $name_bank = "HDFC Bank";
        break;
    case 11:
        $name_bank = "Karnataka Bank";
        break;
    case 10:
        $name_bank = "Standard Chartered Bank";
        break;
    case 9:
        $name_bank = "IDBI Bank";
        break;
    case 8:
        $name_bank = "Bank of India";
        break;
    case 7:
        $name_bank = "Punjab National Bank";
        break;
    case 6:
        $name_bank = "ICICI Bank";
        break;
    case 5:
        $name_bank = "Canara Bank";
        break;
    case 4:
        $name_bank = "Kotak Mahindra Bank";
        break;
    case 3:
        $name_bank = "State Bank of India";
        break;
    case 2:
        $name_bank = "Indian Bank";
        break;
    case 1:
        $name_bank = "Axis Bank";
        break;
    case 17:
        $name_bank = "FEDERAL BANK";
        break;
    case 18:
        $name_bank = "Syndicate Bank";
        break;
    case 22:
        $name_bank = "Citibank India";
        break;
    case 26:
        $name_bank = "Bandhan Bank";
        break;
    case 27:
        $name_bank = "Indusind Bank";
        break;
    case 31:
        $name_bank = "India Post Payments Bank";
        break;
    case 32:
        $name_bank = "Corporation Bank";
        break;
    case 33:
        $name_bank = "City Union Bank";
        break;
    case 34:
        $name_bank = "Karur Vysya Bank";
        break;
    case 35:
        $name_bank = "Tamilnad Mercantile Bank";
        break;
    case 36:
        $name_bank = "Allahabad Bank";
        break;
    case 37:
        $name_bank = "varachha co-operative bank";
        break;
    case 38:
        $name_bank = "Meghalaya Rural Bank";
        break;
    case 39:
        $name_bank = "AU Small Finance Bank";
        break;
    case 40:
        $name_bank = "Lakshmi Vilas Bank";
        break;
    case 41:
        $name_bank = "South Indian Bank";
        break;
    case 42:
        $name_bank = "Bassein catholic co-operative Bank";
        break;
    case 45:
        $name_bank = "State Bank of Hyderabad";
        break;
    case 46:
        $name_bank = "Gp parsik bank";
        break;
    case 47:
        $name_bank = "Kerala Gramin Bank";
        break;
    case 48:
        $name_bank = "RBL Bank";
        break;
    case 49:
        $name_bank = "Dhanlaxmi Bank";
        break;
    case 51:
        $name_bank = "TJSB Bank";
        break;
    case 52:
        $name_bank = "Punjab & Sind Bank";
        break;
    case 53:
        $name_bank = "Purvanchal bank";
        break;
    case 54:
        $name_bank = "Sarva Haryana Gramin Bank";
        break;
    case 55:
        $name_bank = "Ahmedabad District Co-Operative Bank";
        break;
    case 56:
        $name_bank = "Fino Payments Bank";
        break;
    case 57:
        $name_bank = "Saraswat Cooperative Bank";
        break;
    case 66:
        $name_bank = "Telangana Grameena Bank";
        break;
    case 60:
        $name_bank = "andhra pragathi grameena bank";
        break;
    case 61:
        $name_bank = "rajasthan marudhara gramin bank";
        break;
    case 62:
        $name_bank = "Abhyudaya bank";
        break;
    case 63:
        $name_bank = "ujjivan small finance bank";
        break;
    case 67:
        $name_bank = "capital small finance bank";
        break;
    case 68:
        $name_bank = "Mizoram Rural Bank";
        break;
    case 69:
        $name_bank = "Andhra Pradesh Grameena Vikas Bank";
        break;
    case 70:
        $name_bank = "Karnataka Vikas Grameena Bank";
        break;
        case 71:
        $name_bank = "The Ahmedabad merchantile co-op bank Ltd";
        break;
    case 72:
        $name_bank = "Madhya Bihar Gramin Bank";
        break;
    case 73:
        $name_bank = "NSDL Payments Bank";
        break;
    case 74:
        $name_bank = "ESAF Small Finance Bank";
        break;
    case 75:
        $name_bank = "Himachal Pradesh state cooperative bank";
        break;
    case 76:
        $name_bank = "Maharashtra state cooperative bank";
        break;
    case 77:
        $name_bank = "ORIENTAL BANK OF COMMERCE";
        break;
    case 78:
        $name_bank = "nainital bank";
        break;
    case 80:
        $name_bank = "Jharkhand Rajya Gramin Bank";
        break;
    case 81:
        $name_bank = "jio payments bank";
        break;
    case 82:
        $name_bank = "MAHARASHTRA GRAMIN BANK";
        break;
    case 84:
        $name_bank = "Uttarakhand Gramin Bank";
        break;
    case 87:
        $name_bank = "Himachal Pradesh Gramin Bank";
        break;
    case 88:
        $name_bank = "Krishna District Co-Operative Central Bank Ltd.";
        break;
    case 89:
        $name_bank = "RAJKOT NAGARIK SAHAKARI BANK LTD";
        break;
    case 90:
        $name_bank = "North East small financial bank";
        break;
    case 91:
        $name_bank = "Catholic syrian bank";
        break;
    case 92:
        $name_bank = "Fincare small finance bank";
        break;
    case 93:
        $name_bank = "Baroda Uttar Pradesh Gramin Bank";
        break;
    case 94:
        $name_bank = "Dhanalakshmi bank";
        break;
    case 95:
        $name_bank = "Cosmos Co-operative Bank Ltd";
        break;
    case 97:
        $name_bank = "Saurashtra gramin bank";
        break;
    case 98:
        $name_bank = "Baroda Rajasthan kshetriya gramin bank";
        break;
    case 100:
        $name_bank = "Jana small finance bank";
        break;
    case 102:
        $name_bank = "Dena Gujarat Gramin Bank";
        break;
    case 103:
        $name_bank = "Chaitanya Godavari Grameena Bank";
        break;
    case 104:
        $name_bank = "SVC BANK";
        break;
    case 105:
        $name_bank = "Bharat cooperative bank";
        break;
    case 106:
        $name_bank = "The Surat District Co-Op. Bank Ltd.";
        break;
    case 107:
        $name_bank = "USDT";
        break;
    case 108:
        $name_bank = "The Kalupur Commercial Co-operative Bank";
        break;
    case 110:
        $name_bank = "Prime co-operative Bank";
        break;
    case 111:
        $name_bank = "Tripura Gramin Bank";
        break;
    case 112:
        $name_bank = "Zila Sahakari Bank Ltd Bareilly";
        break;
    case 113:
        $name_bank = "ARYAVART Bank";
        break;
    case 114:
        $name_bank = "Development credit Bank";
        break;
    case 116:
        $name_bank = "Sarva UP Gramin Bank";
        break;
    case 117:
        $name_bank = "New India Co-Operative Bank";
        break;
    case 118:
        $name_bank = "NKGSB Co-operative Bank Ltd.";
        break;
    case 119:
        $name_bank = "Vijaya Bank";
        break;
    case 120:
        $name_bank = "United Bank of India";
        break;
    case 121:
        $name_bank = "State Bank of Bikaner And Jaipur";
        break;
    case 122:
        $name_bank = "Shri Janata Sahakari Bank LTD";
        break;
    case 123:
        $name_bank = "Rajgurunagar Sahakari Bank";
        break;
    case 124:
        $name_bank = "FEDERAL NEO BANK JUPITER";
        break;
    case 125:
        $name_bank = "CHHATTISGARH RAJYA GRAMIN BANK";
        break;
    case 126:
        $name_bank = "Apna Sahakari Bank";
        break;
    case 127:
        $name_bank = "GS Mahanagar Co-Op Bank Ltd";
        break;
    case 128:
        $name_bank = "Bangiya Gramin Vikash Bank";
        break;
    case 129:
        $name_bank = "Assam Gramin Vikash Bank";
        break;
    case 131:
        $name_bank = "Kangra Central Co-operative Bank Ltd";
        break;
    case 132:
        $name_bank = "Punjab Gramin Bank";
        break;
    case 133:
        $name_bank = "Assam gramin bikash bank";
        break;
    case 134:
        $name_bank = "Karnataka Gramin Bank";
        break;
    case 135:
        $name_bank = "SURYODAY SMALL FINANCE BANK LIMITED";
        break;
    case 136:
        $name_bank = "Utkarsh Small Finance Bank";
        break;
    case 137:
        $name_bank = "The Meghalaya Co-operative Apex Bank";
        break;
    case 138:
        $name_bank = "UTTAR BIHAR GRAMIN BANK";
        break;
    case 139:
        $name_bank = "STATE BANK OF TRAVANCORE";
        break;
    case 140:
        $name_bank = "SHIVALIK SMALL FIHANCE BANK";
        break;
    case 141:
        $name_bank = "DAKSHIN BIHIR GRAMIN BANK";
        break;
    case 144:
        $name_bank = "manipur rural bank";
        break;
    case 145:
        $name_bank = "State bank of patiala";
        break;
    case 1001:
        $name_bank = "BARODA GUJARAT GRAMIN BANK";
        break;
    case 1002:
        $name_bank = "The Gujarat State Co-operative Bank Limited";
        break;
    case 1003:
        $name_bank = "vasai vikas sahakari";
        break;
    case 1004:
        $name_bank = "paschim banga gramin bank";
        break;
    case 1006:
        $name_bank = "VISHAPATNAM co-operative bank";
        break;
    case 1007:
        $name_bank = "Samarth Sahakari Bank Ltd";
        break;
    case 1008:
        $name_bank = "uttarbanga kshetriya gramin bank";
        break;
    case 1009:
        $name_bank = "janata sahakari bank ltd";
        break;
    case 1011:
        $name_bank = "the gayatri co-operative urban bank";
        break;
    case 1013:
        $name_bank = "ABHYUDAYA CO-OP. BANK LTD.";
        break;
    case 1014:
        $name_bank = "J&K Grameen Bank";
        break;
    case 1015:
        $name_bank = "Post Office Savings Bank";
        break;
    case 1016:
        $name_bank = "SBM Bank India";
        break;
    case 20:
        $name_bank = "Bank of maharashtra";
        break;
    case 1018:
        $name_bank = "Jind central Co-OP Bank";
        break;
    case 1010:
        $name_bank = "PRATHAMA Up Gramin Bank";
        break;
    case 1019:
        $name_bank = "State Bank of Mysore";
        break;
    case 1020:
        $name_bank = "BARODA U.P BANK";
        break;
    case 1021:
        $name_bank = "PURVANCHAL GRAMIN BANK";
        break;
    case 1022:
        $name_bank = "The Varachha Co-operative Bank Ltd.,Surat";
        break;
    case 1023:
        $name_bank = "State Bank Of Mauritius Ltd";
        break;
    case 1025:
        $name_bank = "Kallappanna Awade Janata Bank";
        break;
    case 1028:
        $name_bank = "HIMACHAL PARDESH STATE COOPERATIVE BANK";
        break;
    case 1029:
        $name_bank = "Pratham Bank";
        break;
    case 1030:
        $name_bank = "Oisha Gramya bank";
        break;
    case 1031:
        $name_bank = "KDCC BANK";
        break;
    case 1032:
        $name_bank = "The Hasti Coop Bank";
        break;
    case 1033:
        $name_bank = "District Co-Operative Central Bank Ltd";
        break;
    case 43:
        $name_bank = "AIRTEL PAYMENTS BANK LIMITED";
        break;
    case 29:
        $name_bank = "PAYTM PAYMENTS BANK LTD";
        break;
    case 30:
        $name_bank = "EQUITAS SMALL FINANCE BANK LIMITED";
        break;
    case 24:
        $name_bank = "IDFC FIRST BANK LTD";
        break;
    case 28:
        $name_bank = "JAMMU AND KASHMIR BANK LIMITED";
        break;
    case 1036:
        $name_bank = "DOMBIVLI NAGARI SAHAKARI BANK LIMITED";
        break;
    case 23:
        $name_bank = "Indian Overseas Bank";
        break;
                
                default:
                    $name_bank = "Unknown Bank";
                    break;
            }

            date_default_timezone_set('Asia/Kolkata');
            $currentTime = round(microtime(true) * 1000);

            $sql_insert_card = "INSERT INTO user_bank (phone, name_bank, account, ifsc, email, name_user, stk, tp, sdt, chi_nhanh, time) 
                                VALUES ('$username', '$name_bank', '$accountno', '$bankbranchaddress', '$email', '$beneficiaryname', 0, 0, 0, 0, $currentTime)";

            if ($conn->query($sql_insert_card) === TRUE) {
                $response = [
                    "code" => 0,
                    "msg" => "Record inserted successfully",
                    "msgCode" => 0,
                    "serviceNowTime" => date('Y-m-d H:i:s', time())
                ];
                header('Content-Type: application/json');
                echo json_encode($response);
            } else {
                $response = [
                    "code" => 4,
                    "msg" => "Error: " . $sql_insert_card . "<br>" . $conn->error,
                    "msgCode" => 3,
                    "serviceNowTime" => date('Y-m-d H:i:s', time())
                ];
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } else {
            $response = [
                "code" => 4,
                "msg" => "Invalid token, session might be hijacked",
                "msgCode" => 3,
                "serviceNowTime" => date('Y-m-d H:i:s', time())
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        $response = [
            "code" => 4,
            "msg" => "SQL query failed: " . $conn->error,
            "msgCode" => 3,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    $conn->close();
} else {
    $response = [
        "code" => 4,
        "msg" => "Token cookie not set",
        "msgCode" => 3,
        "serviceNowTime" => date('Y-m-d H:i:s', time())
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
