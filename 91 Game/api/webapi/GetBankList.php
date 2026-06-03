<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "banklist": [
            {
                "bankID": 16,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Bank of Baroda",
                "reserved": "1"
            },
            {
                "bankID": 15,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Union Bank of India",
                "reserved": "1"
            },
            {
                "bankID": 14,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Central Bank of India",
                "reserved": "1"
            },
            {
                "bankID": 13,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Yes Bank",
                "reserved": "1"
            },
            {
                "bankID": 12,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "HDFC Bank",
                "reserved": "1"
            },
            {
                "bankID": 11,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Karnataka Bank",
                "reserved": "1"
            },
            {
                "bankID": 10,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Standard Chartered Bank",
                "reserved": "1"
            },
            {
                "bankID": 9,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "IDBI Bank",
                "reserved": "1"
            },
            {
                "bankID": 8,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Bank of India",
                "reserved": "1"
            },
            {
                "bankID": 7,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Punjab National Bank",
                "reserved": "1"
            },
            {
                "bankID": 6,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "ICICI Bank",
                "reserved": "1"
            },
            {
                "bankID": 5,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Canara Bank",
                "reserved": "1"
            },
            {
                "bankID": 4,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Kotak Mahindra Bank",
                "reserved": "1"
            },
            {
                "bankID": 3,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "State Bank of India",
                "reserved": "1"
            },
            {
                "bankID": 2,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Indian Bank",
                "reserved": "1"
            },
            {
                "bankID": 1,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Axis Bank",
                "reserved": "1"
            },
            {
                "bankID": 17,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "FEDERAL BANK",
                "reserved": "1"
            },
            {
                "bankID": 18,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Syndicate Bank",
                "reserved": "1"
            },
            {
                "bankID": 22,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Citibank India",
                "reserved": "1"
            },
            {
                "bankID": 26,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Bandhan Bank",
                "reserved": "1"
            },
            {
                "bankID": 27,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Indusind Bank",
                "reserved": "1"
            },
            {
                "bankID": 31,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "India Post Payments Bank",
                "reserved": "1"
            },
            {
                "bankID": 32,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Corporation Bank",
                "reserved": "1"
            },
            {
                "bankID": 33,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "City Union Bank",
                "reserved": "1"
            },
            {
                "bankID": 34,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Karur Vysya Bank",
                "reserved": "1"
            },
            {
                "bankID": 35,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Tamilnad Mercantile Bank",
                "reserved": "1"
            },
            {
                "bankID": 36,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Allahabad Bank",
                "reserved": "1"
            },
            {
                "bankID": 37,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "varachha co-operative bank",
                "reserved": "1"
            },
            {
                "bankID": 38,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Meghalaya Rural Bank",
                "reserved": "1"
            },
            {
                "bankID": 39,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "AU Small Finance Bank",
                "reserved": "1"
            },
            {
                "bankID": 40,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Lakshmi Vilas Bank",
                "reserved": "1"
            },
            {
                "bankID": 41,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "South Indian Bank",
                "reserved": "1"
            },
            {
                "bankID": 42,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Bassein catholic co-operative Bank",
                "reserved": "1"
            },
            {
                "bankID": 45,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "State Bank of Hyderabad",
                "reserved": "1"
            },
            {
                "bankID": 46,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Gp parsik bank",
                "reserved": "1"
            },
            {
                "bankID": 47,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Kerala Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 48,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "RBL Bank",
                "reserved": "1"
            },
            {
                "bankID": 49,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Dhanlaxmi Bank",
                "reserved": "1"
            },
            {
                "bankID": 51,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "TJSB Bank",
                "reserved": "1"
            },
            {
                "bankID": 52,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Punjab & Sind Bank",
                "reserved": "1"
            },
            {
                "bankID": 53,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Purvanchal bank",
                "reserved": "1"
            },
            {
                "bankID": 54,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Sarva Haryana Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 55,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Ahmedabad District Co-Operative Bank",
                "reserved": "1"
            },
            {
                "bankID": 56,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Fino Payments Bank",
                "reserved": "1"
            },
            {
                "bankID": 57,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Saraswat Cooperative Bank",
                "reserved": "1"
            },
            {
                "bankID": 66,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Telangana Grameena Bank",
                "reserved": "1"
            },
            {
                "bankID": 60,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "andhra pragathi grameena bank",
                "reserved": "1"
            },
            {
                "bankID": 61,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "rajasthan marudhara gramin bank",
                "reserved": "1"
            },
            {
                "bankID": 62,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Abhyudaya bank",
                "reserved": "1"
            },
            {
                "bankID": 63,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "ujjivan small finance bank",
                "reserved": "1"
            },
            {
                "bankID": 67,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "capital small finance bank",
                "reserved": "1"
            },
            {
                "bankID": 68,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Mizoram Rural Bank",
                "reserved": "1"
            },
            {
                "bankID": 69,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Andhra Pradesh Grameena Vikas Bank",
                "reserved": "1"
            },
            {
                "bankID": 70,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Karnataka Vikas Grameena Bank",
                "reserved": "1"
            },
            {
                "bankID": 71,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "The Ahmedabad merchantile co-op bank Ltd",
                "reserved": "1"
            },
            {
                "bankID": 72,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Madhya Bihar Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 73,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "NSDL Payments Bank",
                "reserved": "1"
            },
            {
                "bankID": 74,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "ESAF Small Finance Bank",
                "reserved": "1"
            },
            {
                "bankID": 75,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Himachal Pradesh state cooperative bank",
                "reserved": "1"
            },
            {
                "bankID": 76,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Maharashtra state cooperative bank",
                "reserved": "1"
            },
            {
                "bankID": 77,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "ORIENTAL BANK OF COMMERCE",
                "reserved": "1"
            },
            {
                "bankID": 78,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "nainital bank",
                "reserved": "1"
            },
            {
                "bankID": 80,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Jharkhand Rajya Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 81,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "jio payments bank",
                "reserved": "1"
            },
            {
                "bankID": 82,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "MAHARASHTRA GRAMIN BANK",
                "reserved": "1"
            },
            {
                "bankID": 84,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Uttarakhand Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 87,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Himachal Pradesh Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 88,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Krishna District Co-Operative Central Bank Ltd.",
                "reserved": "1"
            },
            {
                "bankID": 89,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "RAJKOT NAGARIK SAHAKARI BANK LTD",
                "reserved": "1"
            },
            {
                "bankID": 90,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "North East small financial bank",
                "reserved": "1"
            },
            {
                "bankID": 91,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Catholic syrian bank",
                "reserved": "1"
            },
            {
                "bankID": 92,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Fincare small finance bank",
                "reserved": "1"
            },
            {
                "bankID": 93,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Baroda Uttar Pradesh Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 94,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Dhanalakshmi bank",
                "reserved": "1"
            },
            {
                "bankID": 95,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Cosmos Co-operative Bank Ltd",
                "reserved": "1"
            },
            {
                "bankID": 97,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Saurashtra gramin bank",
                "reserved": "1"
            },
            {
                "bankID": 98,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Baroda Rajasthan kshetriya gramin bank",
                "reserved": "1"
            },
            {
                "bankID": 100,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Jana small finance bank",
                "reserved": "1"
            },
            {
                "bankID": 102,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Dena Gujarat Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 103,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Chaitanya Godavari Grameena Bank",
                "reserved": "1"
            },
            {
                "bankID": 104,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "SVC BANK",
                "reserved": "1"
            },
            {
                "bankID": 105,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Bharat cooperative bank",
                "reserved": "1"
            },
            {
                "bankID": 106,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "The Surat District Co-Op. Bank Ltd.",
                "reserved": "1"
            },
            {
                "bankID": 107,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "USDT",
                "reserved": "1"
            },
            {
                "bankID": 108,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "The Kalupur Commercial Co-operative Bank",
                "reserved": "1"
            },
            {
                "bankID": 110,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Prime co-operative Bank",
                "reserved": "1"
            },
            {
                "bankID": 111,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Tripura Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 112,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Zila Sahakari Bank Ltd Bareilly",
                "reserved": "1"
            },
            {
                "bankID": 113,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "ARYAVART Bank",
                "reserved": "1"
            },
            {
                "bankID": 114,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Development credit Bank",
                "reserved": "1"
            },
            {
                "bankID": 116,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Sarva UP Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 117,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "New India Co-Operative Bank",
                "reserved": "1"
            },
            {
                "bankID": 118,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "NKGSB Co-operative Bank Ltd.",
                "reserved": "1"
            },
            {
                "bankID": 119,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Vijaya Bank",
                "reserved": "1"
            },
            {
                "bankID": 120,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "United Bank of India",
                "reserved": "1"
            },
            {
                "bankID": 121,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "State Bank of Bikaner And Jaipur",
                "reserved": "1"
            },
            {
                "bankID": 122,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Shri Janata Sahakari Bank LTD",
                "reserved": "1"
            },
            {
                "bankID": 123,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Rajgurunagar Sahakari Bank",
                "reserved": "1"
            },
            {
                "bankID": 124,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "FEDERAL NEO BANK JUPITER",
                "reserved": "1"
            },
            {
                "bankID": 125,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "CHHATTISGARH RAJYA GRAMIN BANK",
                "reserved": "1"
            },
            {
                "bankID": 126,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Apna Sahakari Bank",
                "reserved": "1"
            },
            {
                "bankID": 127,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "GS Mahanagar Co-Op Bank Ltd",
                "reserved": "1"
            },
            {
                "bankID": 128,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Bangiya Gramin Vikash Bank",
                "reserved": "1"
            },
            {
                "bankID": 129,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Assam Gramin Vikash Bank",
                "reserved": "1"
            },
            {
                "bankID": 131,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Kangra Central Co-operative Bank Ltd",
                "reserved": "1"
            },
            {
                "bankID": 132,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Punjab Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 133,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Assam gramin bikash bank",
                "reserved": "1"
            },
            {
                "bankID": 134,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Karnataka Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 135,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "SURYODAY SMALL FINANCE BANK LIMITED",
                "reserved": "1"
            },
            {
                "bankID": 136,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Utkarsh Small Finance Bank",
                "reserved": "1"
            },
            {
                "bankID": 137,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "The Meghalaya Co-operative Apex Bank",
                "reserved": "1"
            },
            {
                "bankID": 138,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "UTTAR BIHAR GRAMIN BANK",
                "reserved": "1"
            },
            {
                "bankID": 139,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "STATE BANK OF TRAVANCORE",
                "reserved": "1"
            },
            {
                "bankID": 140,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "SHIVALIK SMALL FIHANCE BANK",
                "reserved": "1"
            },
            {
                "bankID": 141,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "DAKSHIN BIHIR GRAMIN BANK",
                "reserved": "1"
            },
            {
                "bankID": 144,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "manipur rural bank",
                "reserved": "1"
            },
            {
                "bankID": 145,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "State bank of patiala",
                "reserved": "1"
            },
            {
                "bankID": 1001,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "BARODA GUJARAT GRAMIN BANK",
                "reserved": "1"
            },
            {
                "bankID": 1002,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "The Gujarat State Co-operative Bank Limited",
                "reserved": "1"
            },
            {
                "bankID": 1003,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "vasai vikas sahakari",
                "reserved": "1"
            },
            {
                "bankID": 1004,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "paschim banga gramin bank",
                "reserved": "1"
            },
            {
                "bankID": 1006,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "VISHAPATNAM co-operative bank",
                "reserved": "1"
            },
            {
                "bankID": 1007,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Samarth Sahakari Bank Ltd",
                "reserved": "1"
            },
            {
                "bankID": 1008,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "uttarbanga kshetriya gramin bank",
                "reserved": "1"
            },
            {
                "bankID": 1009,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "janata sahakari bank ltd",
                "reserved": "1"
            },
            {
                "bankID": 1011,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "the gayatri co-operative urban bank",
                "reserved": "1"
            },
            {
                "bankID": 1013,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "ABHYUDAYA CO-OP. BANK LTD.",
                "reserved": "1"
            },
            {
                "bankID": 1014,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "J&K Grameen Bank",
                "reserved": "1"
            },
            {
                "bankID": 1015,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Post Office Savings Bank",
                "reserved": "1"
            },
            {
                "bankID": 1016,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "SBM Bank India",
                "reserved": "1"
            },
            {
                "bankID": 20,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Bank of maharashtra",
                "reserved": "1"
            },
            {
                "bankID": 1018,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Jind central Co-OP Bank",
                "reserved": "1"
            },
            {
                "bankID": 1010,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "PRATHAMA Up Gramin Bank",
                "reserved": "1"
            },
            {
                "bankID": 1019,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "State Bank of Mysore",
                "reserved": "1"
            },
            {
                "bankID": 1020,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "BARODA U.P BANK",
                "reserved": "1"
            },
            {
                "bankID": 1021,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "PURVANCHAL GRAMIN BANK",
                "reserved": "1"
            },
            {
                "bankID": 1022,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "The Varachha Co-operative Bank Ltd.,Surat",
                "reserved": "1"
            },
            {
                "bankID": 1023,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "State Bank Of Mauritius Ltd",
                "reserved": "1"
            },
            {
                "bankID": 1025,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Kallappanna Awade Janata Bank",
                "reserved": "1"
            },
            {
                "bankID": 1028,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "HIMACHAL PARDESH STATE COOPERATIVE BANK",
                "reserved": "1"
            },
            {
                "bankID": 1029,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Pratham Bank",
                "reserved": "1"
            },
            {
                "bankID": 1030,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Oisha Gramya bank",
                "reserved": "1"
            },
            {
                "bankID": 1031,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "KDCC BANK",
                "reserved": "1"
            },
            {
                "bankID": 1032,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "The Hasti Coop Bank",
                "reserved": "1"
            },
            {
                "bankID": 1033,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "District Co-Operative Central Bank Ltd",
                "reserved": "1"
            },
            {
                "bankID": 43,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "AIRTEL PAYMENTS BANK LIMITED",
                "reserved": "1"
            },
            {
                "bankID": 29,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "PAYTM PAYMENTS BANK LTD",
                "reserved": "1"
            },
            {
                "bankID": 30,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "EQUITAS SMALL FINANCE BANK LIMITED",
                "reserved": "1"
            },
            {
                "bankID": 24,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "IDFC FIRST BANK LTD",
                "reserved": "1"
            },
            {
                "bankID": 28,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "JAMMU AND KASHMIR BANK LIMITED",
                "reserved": "1"
            },
            {
                "bankID": 1036,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "DOMBIVLI NAGARI SAHAKARI BANK LIMITED",
                "reserved": "1"
            },
            {
                "bankID": 23,
                "bankLogo": "https://ossimg.91admin123admin.com/abcoders_db",
                "bankName": "Indian Overseas Bank",
                "reserved": "1"
            }
        ]
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $response;

?>