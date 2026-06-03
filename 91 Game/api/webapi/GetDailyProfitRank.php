<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "wlist": [
            {
                "type": "1",
                "userPhoto": "8",
                "nickName": "MemberRBZJLVTM",
                "betAmount": 10.00,
                "amount": 19.60,
                "winTime": "2024-02-27 16:04:01",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "1",
                "nickName": "MemberFJWWLGHN",
                "betAmount": 50.00,
                "amount": 98.00,
                "winTime": "2024-02-27 16:04:01",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "7",
                "nickName": "MemberYGSOLOCN",
                "betAmount": 50.00,
                "amount": 98.00,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "14",
                "nickName": "MemberYPDQOHBO",
                "betAmount": 100.00,
                "amount": 147.00,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "18",
                "nickName": "MemberUGIWIWVE",
                "betAmount": 20.00,
                "amount": 39.20,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "6",
                "nickName": "MemberIPKPMISY",
                "betAmount": 10.00,
                "amount": 14.70,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "8",
                "nickName": "MemberTRIILUJU",
                "betAmount": 20.00,
                "amount": 39.20,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "2",
                "nickName": "MemberNEVTXVRL",
                "betAmount": 28.00,
                "amount": 41.16,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "1",
                "nickName": "MemberXHZQBOSS",
                "betAmount": 10.00,
                "amount": 19.60,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "8",
                "nickName": "MemberWEGQDRVP",
                "betAmount": 10.00,
                "amount": 19.60,
                "winTime": "2024-02-27 16:04:00",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "7",
                "nickName": "MemberAJCISZJF",
                "betAmount": 10.00,
                "amount": 14.70,
                "winTime": "2024-02-27 16:03:59",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "5",
                "nickName": "MemberVUGJBXWJ",
                "betAmount": 20.00,
                "amount": 39.20,
                "winTime": "2024-02-27 16:03:59",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "9",
                "nickName": "MemberZVOVYRUC",
                "betAmount": 100.00,
                "amount": 147.00,
                "winTime": "2024-02-27 16:03:59",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "11",
                "nickName": "MemberPFZYAUAE",
                "betAmount": 10.00,
                "amount": 19.60,
                "winTime": "2024-02-27 16:03:59",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "11",
                "nickName": "MemberCULGFCSX",
                "betAmount": 1000.00,
                "amount": 1960.00,
                "winTime": "2024-02-27 16:03:59",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "9",
                "nickName": "MemberDAOSQTSD",
                "betAmount": 20.00,
                "amount": 39.20,
                "winTime": "2024-02-27 16:03:59",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "9",
                "nickName": "MemberOPFESUEV",
                "betAmount": 100.00,
                "amount": 147.00,
                "winTime": "2024-02-27 16:03:59",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "6",
                "nickName": "MemberHRHJKPKE",
                "betAmount": 100.00,
                "amount": 196.00,
                "winTime": "2024-02-27 16:03:58",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "12",
                "nickName": "MemberTMWLVHUQ",
                "betAmount": 7.00,
                "amount": 13.72,
                "winTime": "2024-02-27 16:03:58",
                "showType": "wlist",
                "userId": 0
            },
            {
                "type": "1",
                "userPhoto": "14",
                "nickName": "MemberGBJSBCKB",
                "betAmount": 400.00,
                "amount": 784.00,
                "winTime": "2024-02-27 16:03:58",
                "showType": "wlist",
                "userId": 0
            }
        ],
        "new5dwlist": [
            {
                "type": "5",
                "userPhoto": "2",
                "nickName": "MemberQNQXLMII",
                "betAmount": 20.00,
                "amount": 38.81,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "13",
                "nickName": "MemberTUZTKUAZ",
                "betAmount": 20.00,
                "amount": 38.81,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "17",
                "nickName": "MemberPNGAUACC",
                "betAmount": 60.00,
                "amount": 116.42,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "10",
                "nickName": "MemberDWZIOUSP",
                "betAmount": 30.00,
                "amount": 58.21,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "6",
                "nickName": "MemberLSBAOLIS",
                "betAmount": 18.00,
                "amount": 34.93,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "9",
                "nickName": "MemberCDGIWGMY",
                "betAmount": 20.00,
                "amount": 38.81,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "10",
                "nickName": "MemberUIWJXZER",
                "betAmount": 10.00,
                "amount": 19.40,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "17",
                "nickName": "MemberRZDXNJJJ",
                "betAmount": 44.00,
                "amount": 85.38,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "18",
                "nickName": "MemberTVKUOIHJ",
                "betAmount": 50.00,
                "amount": 97.02,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            },
            {
                "type": "5",
                "userPhoto": "19",
                "nickName": "MemberFDMJIYXM",
                "betAmount": 10.00,
                "amount": 19.40,
                "winTime": "2024-02-27 16:03:58",
                "showType": "new5dwlist",
                "userId": 0
            }
        ],
        "slotslist": [
            {
                "type": "TB",
                "userPhoto": "13",
                "nickName": "MemberWCHQAMEK",
                "betAmount": 0.0,
                "amount": 52.20,
                "winTime": "2024-02-27 16:03:25",
                "showType": "slotslist",
                "userId": 3464686
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "3",
                "nickName": "MemberMMNAOLPW",
                "betAmount": 50.00,
                "amount": 445.00,
                "winTime": "2024-02-27 16:00:59",
                "showType": "slotslist",
                "userId": 3354601
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "10",
                "nickName": "MemberRZGMNYGR",
                "betAmount": 20.00,
                "amount": 800.00,
                "winTime": "2024-02-27 16:00:44",
                "showType": "slotslist",
                "userId": 1437952
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "6",
                "nickName": "MemberQCCMMJAQ",
                "betAmount": 50.00,
                "amount": 200.00,
                "winTime": "2024-02-27 16:00:38",
                "showType": "slotslist",
                "userId": 3354601
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "12",
                "nickName": "MemberJWMWHTHA",
                "betAmount": 20.00,
                "amount": 200.00,
                "winTime": "2024-02-27 16:00:31",
                "showType": "slotslist",
                "userId": 1437952
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "11",
                "nickName": "MemberFGOXAQVV",
                "betAmount": 15.00,
                "amount": 12.50,
                "winTime": "2024-02-27 16:00:28",
                "showType": "slotslist",
                "userId": 3961280
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "3",
                "nickName": "MemberCFISZXDC",
                "betAmount": 50.00,
                "amount": 90.00,
                "winTime": "2024-02-27 16:00:10",
                "showType": "slotslist",
                "userId": 3354601
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "19",
                "nickName": "MemberOLPNEYWN",
                "betAmount": 20.00,
                "amount": 200.00,
                "winTime": "2024-02-27 16:00:06",
                "showType": "slotslist",
                "userId": 1437952
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "6",
                "nickName": "MemberKCCMRWJC",
                "betAmount": 15.00,
                "amount": 25.00,
                "winTime": "2024-02-27 15:59:50",
                "showType": "slotslist",
                "userId": 3961280
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "4",
                "nickName": "MemberZENYFYMG",
                "betAmount": 50.00,
                "amount": 25.00,
                "winTime": "2024-02-27 15:59:37",
                "showType": "slotslist",
                "userId": 3354601
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "4",
                "nickName": "MemberBGZTUIPI",
                "betAmount": 15.00,
                "amount": 12.50,
                "winTime": "2024-02-27 15:59:29",
                "showType": "slotslist",
                "userId": 3961280
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "17",
                "nickName": "MemberRLOLLUDX",
                "betAmount": 15.00,
                "amount": 17.50,
                "winTime": "2024-02-27 15:59:20",
                "showType": "slotslist",
                "userId": 3961280
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "19",
                "nickName": "MemberDHKKXGUL",
                "betAmount": 50.00,
                "amount": 420.00,
                "winTime": "2024-02-27 15:59:12",
                "showType": "slotslist",
                "userId": 3354601
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "5",
                "nickName": "MemberTCYORPMX",
                "betAmount": 20.00,
                "amount": 200.00,
                "winTime": "2024-02-27 15:59:06",
                "showType": "slotslist",
                "userId": 1437952
            },
            {
                "type": "AG_Electronic",
                "userPhoto": "3",
                "nickName": "MemberVAJVAMEL",
                "betAmount": 50.00,
                "amount": 225.00,
                "winTime": "2024-02-27 15:59:03",
                "showType": "slotslist",
                "userId": 3354601
            },
            {
                "type": "JILI",
                "userPhoto": "7",
                "nickName": "MemberZXUULJEX",
                "betAmount": 8.00,
                "amount": 17.60,
                "winTime": "2024-02-27 15:59:00",
                "showType": "slotslist",
                "userId": 897846
            },
            {
                "type": "JILI",
                "userPhoto": "10",
                "nickName": "MemberIZINQUVS",
                "betAmount": 7.50,
                "amount": 29.00,
                "winTime": "2024-02-27 15:59:00",
                "showType": "slotslist",
                "userId": 2546203
            },
            {
                "type": "JILI",
                "userPhoto": "2",
                "nickName": "MemberPZYCNHLM",
                "betAmount": 1.00,
                "amount": 15.00,
                "winTime": "2024-02-27 15:59:00",
                "showType": "slotslist",
                "userId": 3665255
            },
            {
                "type": "JILI",
                "userPhoto": "10",
                "nickName": "MemberBVYGYXBJ",
                "betAmount": 1.00,
                "amount": 75.20,
                "winTime": "2024-02-27 15:59:00",
                "showType": "slotslist",
                "userId": 3900984
            },
            {
                "type": "JDB",
                "userPhoto": "9",
                "nickName": "MemberPPPKVDRM",
                "betAmount": 5.00,
                "amount": 765.00,
                "winTime": "2024-02-27 15:58:59",
                "showType": "slotslist",
                "userId": 3474252
            }
        ],
        "fishslist": [
            {
                "type": "JILI",
                "userPhoto": "2",
                "nickName": "MemberRGJOHEXR",
                "betAmount": 7.20,
                "amount": 12.00,
                "winTime": "2024-02-27 15:59:00",
                "showType": "fishslist",
                "userId": 1748369
            },
            {
                "type": "JILI",
                "userPhoto": "19",
                "nickName": "MemberFGWCPCZG",
                "betAmount": 5.50,
                "amount": 18.00,
                "winTime": "2024-02-27 15:58:59",
                "showType": "fishslist",
                "userId": 103597
            },
            {
                "type": "JILI",
                "userPhoto": "13",
                "nickName": "MemberVMAUYHML",
                "betAmount": 18.00,
                "amount": 50.00,
                "winTime": "2024-02-27 15:58:59",
                "showType": "fishslist",
                "userId": 122999
            },
            {
                "type": "JDB",
                "userPhoto": "12",
                "nickName": "MemberGYZOWQUR",
                "betAmount": 89.00,
                "amount": 115.00,
                "winTime": "2024-02-27 15:58:59",
                "showType": "fishslist",
                "userId": 2044139
            },
            {
                "type": "JILI",
                "userPhoto": "14",
                "nickName": "MemberASNBGPAE",
                "betAmount": 0.20,
                "amount": 16.00,
                "winTime": "2024-02-27 15:58:58",
                "showType": "fishslist",
                "userId": 3569824
            },
            {
                "type": "JILI",
                "userPhoto": "18",
                "nickName": "MemberWBSGILKU",
                "betAmount": 17.60,
                "amount": 36.00,
                "winTime": "2024-02-27 15:58:58",
                "showType": "fishslist",
                "userId": 776346
            },
            {
                "type": "JDB",
                "userPhoto": "19",
                "nickName": "MemberMVOSABXV",
                "betAmount": 852.00,
                "amount": 370.00,
                "winTime": "2024-02-27 15:58:58",
                "showType": "fishslist",
                "userId": 168405
            },
            {
                "type": "JILI",
                "userPhoto": "2",
                "nickName": "MemberYCMKBHHU",
                "betAmount": 8.00,
                "amount": 35.00,
                "winTime": "2024-02-27 15:58:56",
                "showType": "fishslist",
                "userId": 3488037
            },
            {
                "type": "JDB",
                "userPhoto": "14",
                "nickName": "MemberJCRDCXHK",
                "betAmount": 250.00,
                "amount": 43.00,
                "winTime": "2024-02-27 15:58:56",
                "showType": "fishslist",
                "userId": 1378641
            },
            {
                "type": "JILI",
                "userPhoto": "10",
                "nickName": "MemberCMNKGPLX",
                "betAmount": 4.80,
                "amount": 10.50,
                "winTime": "2024-02-27 15:58:55",
                "showType": "fishslist",
                "userId": 851368
            },
            {
                "type": "JDB",
                "userPhoto": "9",
                "nickName": "MemberTINGZYWV",
                "betAmount": 176.00,
                "amount": 105.00,
                "winTime": "2024-02-27 15:58:54",
                "showType": "fishslist",
                "userId": 1028952
            },
            {
                "type": "JILI",
                "userPhoto": "1",
                "nickName": "MemberSJFVIMUG",
                "betAmount": 5.60,
                "amount": 17.60,
                "winTime": "2024-02-27 15:58:53",
                "showType": "fishslist",
                "userId": 1086779
            },
            {
                "type": "JILI",
                "userPhoto": "19",
                "nickName": "MemberDXBJBUOQ",
                "betAmount": 4.00,
                "amount": 32.00,
                "winTime": "2024-02-27 15:58:53",
                "showType": "fishslist",
                "userId": 4204321
            },
            {
                "type": "JDB",
                "userPhoto": "13",
                "nickName": "MemberDIECWHIV",
                "betAmount": 262.00,
                "amount": 407.00,
                "winTime": "2024-02-27 15:58:53",
                "showType": "fishslist",
                "userId": 3178941
            },
            {
                "type": "JILI",
                "userPhoto": "13",
                "nickName": "MemberHNPEROIJ",
                "betAmount": 11.20,
                "amount": 36.00,
                "winTime": "2024-02-27 15:58:52",
                "showType": "fishslist",
                "userId": 776346
            },
            {
                "type": "JDB",
                "userPhoto": "13",
                "nickName": "MemberVOXUJMHW",
                "betAmount": 42.00,
                "amount": 23.00,
                "winTime": "2024-02-27 15:58:52",
                "showType": "fishslist",
                "userId": 1205617
            },
            {
                "type": "JDB",
                "userPhoto": "5",
                "nickName": "MemberOVVWGJBI",
                "betAmount": 39.00,
                "amount": 20.00,
                "winTime": "2024-02-27 15:58:52",
                "showType": "fishslist",
                "userId": 1094740
            },
            {
                "type": "JDB",
                "userPhoto": "12",
                "nickName": "MemberYBZYEIZW",
                "betAmount": 74.00,
                "amount": 243.00,
                "winTime": "2024-02-27 15:58:51",
                "showType": "fishslist",
                "userId": 2588118
            },
            {
                "type": "JILI",
                "userPhoto": "4",
                "nickName": "MemberIZKGKYXI",
                "betAmount": 2.70,
                "amount": 10.50,
                "winTime": "2024-02-27 15:58:49",
                "showType": "fishslist",
                "userId": 851368
            },
            {
                "type": "JDB",
                "userPhoto": "7",
                "nickName": "MemberJBIRNMQV",
                "betAmount": 54.00,
                "amount": 64.00,
                "winTime": "2024-02-27 15:58:48",
                "showType": "fishslist",
                "userId": 2315713
            }
        ],
        "smallgameslist": [],
        "trxwigolist": [],
        "k3list": [
            {
                "type": "9",
                "userPhoto": "19",
                "nickName": "MemberDKGVTMSC",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "19",
                "nickName": "MemberSLFXZOGL",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "15",
                "nickName": "MemberESOTCCRA",
                "betAmount": 49.00,
                "amount": 98.00,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "17",
                "nickName": "MemberDIOXBOAS",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "5",
                "nickName": "MemberGEAFXPFL",
                "betAmount": 195.02,
                "amount": 390.04,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "5",
                "nickName": "MemberFZBOTMQI",
                "betAmount": 12.74,
                "amount": 13.55,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "13",
                "nickName": "MemberYMUJUOKN",
                "betAmount": 9.80,
                "amount": 19.60,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "7",
                "nickName": "MemberQPADTTWY",
                "betAmount": 98.00,
                "amount": 196.00,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "14",
                "nickName": "MemberICMZGERH",
                "betAmount": 98.00,
                "amount": 196.00,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            },
            {
                "type": "9",
                "userPhoto": "7",
                "nickName": "MemberOCYZXIFP",
                "betAmount": 19.60,
                "amount": 39.20,
                "winTime": "2024-02-27 16:03:58",
                "showType": "k3list",
                "userId": 0
            }
        ],
        "s16list": [],
        "vnmodellist": [],
        "c16list": [],
        "wzgamelist": [],
        "ddwzgamelist": [],
        "dmwzgamelist": [],
        "wnwzgamelist": [],
        "jswzgamelist": [],
        "livewlist": [],
        "realpersonloglist": [
            {
                "type": "AG_Video",
                "userPhoto": "19",
                "nickName": "MemberZHEBVEWF",
                "betAmount": 200.00,
                "amount": 1800.00,
                "winTime": "2024-02-27 16:00:26",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "11",
                "nickName": "MemberUBCLXBKO",
                "betAmount": 0.0,
                "amount": 1025.00,
                "winTime": "2024-02-27 15:58:48",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "9",
                "nickName": "MemberRTUPXQND",
                "betAmount": 973.75,
                "amount": 1998.75,
                "winTime": "2024-02-27 15:58:28",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "16",
                "nickName": "MemberXOQTTBOI",
                "betAmount": 973.75,
                "amount": 1998.75,
                "winTime": "2024-02-27 15:58:11",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "3",
                "nickName": "MemberRSGTJYTH",
                "betAmount": 0.0,
                "amount": 1025.00,
                "winTime": "2024-02-27 15:58:09",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "19",
                "nickName": "MemberTUYOUUPH",
                "betAmount": 950.00,
                "amount": 1950.00,
                "winTime": "2024-02-27 15:58:06",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "5",
                "nickName": "MemberDSJECXFK",
                "betAmount": 973.75,
                "amount": 1998.75,
                "winTime": "2024-02-27 15:57:31",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "1",
                "nickName": "MemberWYXUDJKR",
                "betAmount": 0.0,
                "amount": 1025.00,
                "winTime": "2024-02-27 15:57:19",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "AG_Video",
                "userPhoto": "19",
                "nickName": "MemberRXLLHMDS",
                "betAmount": 500.00,
                "amount": 1000.00,
                "winTime": "2024-02-27 15:55:25",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "10",
                "nickName": "MemberMVRKRBSS",
                "betAmount": 40.00,
                "amount": 60.00,
                "winTime": "2024-02-27 15:53:54",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "13",
                "nickName": "MemberJXJCBJII",
                "betAmount": 20.00,
                "amount": 30.00,
                "winTime": "2024-02-27 15:53:49",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "8",
                "nickName": "MemberSYJIDJPM",
                "betAmount": 50.00,
                "amount": 180.00,
                "winTime": "2024-02-27 15:53:49",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "17",
                "nickName": "MemberRYWVNZGG",
                "betAmount": 150.00,
                "amount": 90.00,
                "winTime": "2024-02-27 15:53:41",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "4",
                "nickName": "MemberCRNPIKBG",
                "betAmount": 20.00,
                "amount": 30.00,
                "winTime": "2024-02-27 15:53:41",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "10",
                "nickName": "MemberZXTEXYMP",
                "betAmount": 50.00,
                "amount": 20.00,
                "winTime": "2024-02-27 15:53:41",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "9",
                "nickName": "MemberLLOCSLJQ",
                "betAmount": 100.00,
                "amount": 200.00,
                "winTime": "2024-02-27 15:53:38",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "4",
                "nickName": "MemberHCUEVEHG",
                "betAmount": 80.00,
                "amount": 300.00,
                "winTime": "2024-02-27 15:53:38",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "4",
                "nickName": "MemberSFVKRKTP",
                "betAmount": 40.00,
                "amount": 80.00,
                "winTime": "2024-02-27 15:53:38",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "2",
                "nickName": "MemberBJMPODYD",
                "betAmount": 70.00,
                "amount": 100.00,
                "winTime": "2024-02-27 15:53:38",
                "showType": "realpersonloglist",
                "userId": 0
            },
            {
                "type": "EVO_Video",
                "userPhoto": "14",
                "nickName": "MemberGBDFXQBO",
                "betAmount": 200.00,
                "amount": 300.00,
                "winTime": "2024-02-27 15:53:36",
                "showType": "realpersonloglist",
                "userId": 0
            }
        ],
        "sportloglist": [
            {
                "type": "AG_Sport",
                "userPhoto": "2",
                "nickName": "MemberWDIHQBIZ",
                "betAmount": 98.00,
                "amount": 121.52,
                "winTime": "2024-02-27 15:56:31",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "AG_Sport",
                "userPhoto": "11",
                "nickName": "MemberEQCCCBBD",
                "betAmount": 125.42,
                "amount": 240.81,
                "winTime": "2024-02-27 15:50:30",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "16",
                "nickName": "MemberNQKRZEGA",
                "betAmount": 100.00,
                "amount": 106.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "12",
                "nickName": "MemberOZHFDIPI",
                "betAmount": 100.00,
                "amount": 106.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "2",
                "nickName": "MemberYBEUBNTG",
                "betAmount": 100.00,
                "amount": 106.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "1",
                "nickName": "MemberUDNJUIIR",
                "betAmount": 100.00,
                "amount": 106.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "6",
                "nickName": "MemberWRZRVDVU",
                "betAmount": 100.00,
                "amount": 114.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "13",
                "nickName": "MemberXCKQXCMM",
                "betAmount": 100.00,
                "amount": 111.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "6",
                "nickName": "MemberVQYHPDMK",
                "betAmount": 100.00,
                "amount": 109.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "1",
                "nickName": "MemberYUWEVZUI",
                "betAmount": 100.00,
                "amount": 109.00,
                "winTime": "2024-02-27 15:36:12",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "6",
                "nickName": "MemberPZRMVVNT",
                "betAmount": 108.00,
                "amount": 199.80,
                "winTime": "2024-02-27 15:28:23",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "AG_Sport",
                "userPhoto": "13",
                "nickName": "MemberKFRQJIZE",
                "betAmount": 100.00,
                "amount": 171.00,
                "winTime": "2024-02-27 15:24:30",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "AG_Sport",
                "userPhoto": "7",
                "nickName": "MemberWWPTMHMF",
                "betAmount": 139.00,
                "amount": 251.59,
                "winTime": "2024-02-27 15:22:31",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "AG_Sport",
                "userPhoto": "9",
                "nickName": "MemberFJHNPTJC",
                "betAmount": 300.00,
                "amount": 399.00,
                "winTime": "2024-02-27 15:12:30",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "9",
                "nickName": "MemberQPGQFIFW",
                "betAmount": 950.00,
                "amount": 1757.50,
                "winTime": "2024-02-27 14:43:50",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "13",
                "nickName": "MemberKJWXHMLF",
                "betAmount": 1500.00,
                "amount": 1725.00,
                "winTime": "2024-02-27 14:38:34",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "19",
                "nickName": "MemberUSTCCEHG",
                "betAmount": 100.00,
                "amount": 103.00,
                "winTime": "2024-02-27 13:38:52",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "6",
                "nickName": "MemberENXXQQYG",
                "betAmount": 100.00,
                "amount": 103.00,
                "winTime": "2024-02-27 13:38:52",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "Wickets9",
                "userPhoto": "10",
                "nickName": "MemberHIVWBXHG",
                "betAmount": 100.00,
                "amount": 206.00,
                "winTime": "2024-02-27 13:38:52",
                "showType": "sportloglist",
                "userId": 0
            },
            {
                "type": "AG_Sport",
                "userPhoto": "10",
                "nickName": "MemberSWWSYLMR",
                "betAmount": 0.0,
                "amount": 34.40,
                "winTime": "2024-02-27 13:32:30",
                "showType": "sportloglist",
                "userId": 0
            }
        ],
        "chessloglist": [
            {
                "type": "Card365",
                "userPhoto": "6",
                "nickName": "MemberADHFVDSV",
                "betAmount": 38.80,
                "amount": 50.00,
                "winTime": "2024-02-27 16:02:21",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "9",
                "nickName": "MemberUXPHAQCM",
                "betAmount": 19.40,
                "amount": 40.00,
                "winTime": "2024-02-27 16:02:01",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "8",
                "nickName": "MemberGRTLSXUT",
                "betAmount": 77.60,
                "amount": 100.00,
                "winTime": "2024-02-27 16:01:38",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "1",
                "nickName": "MemberWAXSGTDY",
                "betAmount": 48.50,
                "amount": 100.00,
                "winTime": "2024-02-27 16:01:36",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "11",
                "nickName": "MemberVYMBGWMW",
                "betAmount": 77.60,
                "amount": 160.00,
                "winTime": "2024-02-27 16:00:40",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "17",
                "nickName": "MemberGAZTYAUP",
                "betAmount": 504.40,
                "amount": 1040.00,
                "winTime": "2024-02-27 16:00:26",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "18",
                "nickName": "MemberDUUXXZYO",
                "betAmount": 85.30,
                "amount": 176.00,
                "winTime": "2024-02-27 16:00:20",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "7",
                "nickName": "MemberGVMTNKXP",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2024-02-27 16:00:11",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "4",
                "nickName": "MemberGROYNSIC",
                "betAmount": 291.00,
                "amount": 600.00,
                "winTime": "2024-02-27 15:59:57",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "14",
                "nickName": "MemberHDTHCHPY",
                "betAmount": 145.50,
                "amount": 300.00,
                "winTime": "2024-02-27 15:59:48",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "4",
                "nickName": "MemberOSFJLEFP",
                "betAmount": 85.30,
                "amount": 176.00,
                "winTime": "2024-02-27 15:59:47",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "5",
                "nickName": "MemberGMZJFIRS",
                "betAmount": 58.20,
                "amount": 120.00,
                "winTime": "2024-02-27 15:59:38",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "1",
                "nickName": "MemberJGKPALZZ",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2024-02-27 15:59:29",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "12",
                "nickName": "MemberJSRYHLJU",
                "betAmount": 19.40,
                "amount": 40.00,
                "winTime": "2024-02-27 15:59:14",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "17",
                "nickName": "MemberRBHCOHWV",
                "betAmount": 58.20,
                "amount": 120.00,
                "winTime": "2024-02-27 15:58:56",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "7",
                "nickName": "MemberQASMAMJU",
                "betAmount": 48.50,
                "amount": 100.00,
                "winTime": "2024-02-27 15:58:44",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "2",
                "nickName": "MemberYGURSIYJ",
                "betAmount": 77.60,
                "amount": 100.00,
                "winTime": "2024-02-27 15:58:42",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "18",
                "nickName": "MemberBWGMETIH",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2024-02-27 15:58:39",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "9",
                "nickName": "MemberCRUITJHN",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2024-02-27 15:58:36",
                "showType": "chessloglist",
                "userId": 0
            },
            {
                "type": "Card365",
                "userPhoto": "8",
                "nickName": "MemberGGKRPVBS",
                "betAmount": 97.00,
                "amount": 200.00,
                "winTime": "2024-02-27 15:58:11",
                "showType": "chessloglist",
                "userId": 0
            }
        ],
        "xosoList": [],
        "fXosoList": null,
        "penarikanlist": [
            {
                "userPhoto": "15",
                "nickName": "MemberWHLDFYQS",
                "price": 679099520.12,
                "time": "2024-02-27",
                "typeName": "Penarikan",
                "winTime": "2/27/2024 12:00:00 AM"
            },
            {
                "userPhoto": "4",
                "nickName": "MemberPYXCNEUU",
                "price": 547965040.00,
                "time": "2024-02-27",
                "typeName": "Penarikan",
                "winTime": "2/27/2024 12:00:00 AM"
            },
            {
                "userPhoto": "1",
                "nickName": "MemberKYWHZTCZ",
                "price": 276975147.96,
                "time": "2024-02-27",
                "typeName": "Penarikan",
                "winTime": "2/27/2024 12:00:00 AM"
            },
            {
                "userPhoto": "3",
                "nickName": "MemberCKCJXAIG",
                "price": 131398615.60,
                "time": "2024-02-27",
                "typeName": "Penarikan",
                "winTime": "2/27/2024 12:00:00 AM"
            },
            {
                "userPhoto": "7",
                "nickName": "MemberUOWRJFBL",
                "price": 127586310.25,
                "time": "2024-02-27",
                "typeName": "Penarikan",
                "winTime": "2/27/2024 12:00:00 AM"
            }
        ]
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data);

header('Content-Type: application/json');
echo $response;

?>