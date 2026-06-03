<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "popular": {
            "platformList": [
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "800",
                    "gameNameEn": "Aviator",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                    "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                    "winOdds": 90.19
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "101",
                    "gameNameEn": "Hilo",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/101.png",
                    "imgUrl2": "",
                    "winOdds": 90.81
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "102",
                    "gameNameEn": "Dice",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/102.png",
                    "imgUrl2": "",
                    "winOdds": 88.88
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "100",
                    "gameNameEn": "Mines",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/100.png",
                    "imgUrl2": "",
                    "winOdds": 87.15
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "106",
                    "gameNameEn": "Keno",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/106.png",
                    "imgUrl2": "",
                    "winOdds": 81.54
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "105",
                    "gameNameEn": "Goal",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/105.png",
                    "imgUrl2": "",
                    "winOdds": 84.34
                }
            ],
            "clicksTopList": [
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "51",
                    "gameNameEn": "Money Coming",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/51.png",
                    "imgUrl2": "",
                    "winOdds": 90.85
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "109",
                    "gameNameEn": "Fortune Gems",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/109.png",
                    "imgUrl2": "",
                    "winOdds": 80.15
                },
                {
                    "vendorId": "17",
                    "vendorCode": "EVO_Electronic",
                    "gameCode": "grandwheel000000",
                    "gameNameEn": "Grand Wheel",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/EVO_Electronic/grandwheel000000.png",
                    "imgUrl2": "",
                    "winOdds": 88.35
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "27",
                    "gameNameEn": "SevenSevenSeven",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/27.png",
                    "imgUrl2": "",
                    "winOdds": 82.78
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "47",
                    "gameNameEn": "Charge Buffalo",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/47.png",
                    "imgUrl2": "",
                    "winOdds": 88.53
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "1",
                    "gameNameEn": "Royal Fishing",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/1.png",
                    "imgUrl2": "",
                    "winOdds": 85.63
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "35",
                    "gameNameEn": "Crazy777",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/35.png",
                    "imgUrl2": "",
                    "winOdds": 85.92
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "49",
                    "gameNameEn": "Super Ace",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/49.png",
                    "imgUrl2": "",
                    "winOdds": 85.47
                },
                {
                    "vendorId": "17",
                    "vendorCode": "EVO_Electronic",
                    "gameCode": "777strike0000000",
                    "gameNameEn": "777 Strike",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/EVO_Electronic/777strike0000000.png",
                    "imgUrl2": "",
                    "winOdds": 90.22
                },
                {
                    "vendorId": "6",
                    "vendorCode": "JDB",
                    "gameCode": "14027",
                    "gameNameEn": "Lucky Seven",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JDB/14027.png",
                    "imgUrl2": "",
                    "winOdds": 93.42
                },
                {
                    "vendorId": "19",
                    "vendorCode": "Card365",
                    "gameCode": "707",
                    "gameNameEn": "3 Patti Classic",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/Card365/707.png",
                    "imgUrl2": "",
                    "winOdds": 81.89
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "82",
                    "gameNameEn": "Happy Fishing",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/82.png",
                    "imgUrl2": "",
                    "winOdds": 89.56
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "32",
                    "gameNameEn": "Jack Pot Fishing",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/32.png",
                    "imgUrl2": "",
                    "winOdds": 85.75
                },
                {
                    "vendorId": "4",
                    "vendorCode": "MG",
                    "gameCode": "SMG_wildfireWins",
                    "gameNameEn": "Wildfire Wins",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/MG/SMG_wildfireWins.png",
                    "imgUrl2": "",
                    "winOdds": 89.86
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "74",
                    "gameNameEn": "Mega Fishing",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/74.png",
                    "imgUrl2": "",
                    "winOdds": 85.38
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "45",
                    "gameNameEn": "Golden Bank",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/45.png",
                    "imgUrl2": "",
                    "winOdds": 85.19
                },
                {
                    "vendorId": "19",
                    "vendorCode": "Card365",
                    "gameCode": "710",
                    "gameNameEn": "Rummy",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/Card365/710.png",
                    "imgUrl2": "",
                    "winOdds": 91.52
                },
                {
                    "vendorId": "19",
                    "vendorCode": "Card365",
                    "gameCode": "563",
                    "gameNameEn": "Three Pictures",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/Card365/563.png",
                    "imgUrl2": "",
                    "winOdds": 86.14
                }
            ],
            "clicksVideoTopList": [
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGamesAutoRoulette",
                    "gameNameEn": "Auto Roulette ",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Video/SMG_titaniumLiveGamesAutoRoulette.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGames_Roulette",
                    "gameNameEn": "Roulette ",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Video/SMG_titaniumLiveGames_Roulette.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGames_Sicbo",
                    "gameNameEn": "Sicbo",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Video/SMG_titaniumLiveGames_Sicbo.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGames_Baccarat",
                    "gameNameEn": "Bonus Baccarat",
                    "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Video/SMG_titaniumLiveGames_Baccarat.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "CBAC",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "SBAC",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "NN",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "BJ",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "ZJH",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                }
            ]
        },
        "sport": [
            {
                "slotsTypeID": 25,
                "slotsName": "Wickets9",
                "vendorId": 25,
                "vendorCode": "Wickets9",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            }
        ],
        "video": [
            {
                "slotsTypeID": 16,
                "slotsName": "EVO_Video",
                "vendorId": 16,
                "vendorCode": "EVO_Video",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "slotsTypeID": 10,
                "slotsName": "AG_Video",
                "vendorId": 10,
                "vendorCode": "AG_Video",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202401021635413lly.png"
            },
            {
                "slotsTypeID": 38,
                "slotsName": "MG_Video",
                "vendorId": 38,
                "vendorCode": "MG_Video",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            }
        ],
        "slot": [
            {
                "slotsTypeID": 18,
                "slotsName": "JILI",
                "vendorId": 18,
                "vendorCode": "JILI",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165352mtql.png"
            },
            {
                "slotsTypeID": 6,
                "slotsName": "JDB",
                "vendorId": 6,
                "vendorCode": "JDB",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_2024010216505212ii.png"
            },
            {
                "slotsTypeID": 4,
                "slotsName": "MG",
                "vendorId": 4,
                "vendorCode": "MG",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202401021653336o2h.png"
            },
            {
                "slotsTypeID": 17,
                "slotsName": "EVO_Electronic",
                "vendorId": 17,
                "vendorCode": "EVO_Electronic",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102165037ckq2.png"
            },
            {
                "slotsTypeID": 5,
                "slotsName": "PG",
                "vendorId": 5,
                "vendorCode": "PG",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102163527dtbe.png"
            },
            {
                "slotsTypeID": 12,
                "slotsName": "AG_Electronic",
                "vendorId": 12,
                "vendorCode": "AG_Electronic",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164858e6so.png"
            },
            {
                "slotsTypeID": 41,
                "slotsName": "G9",
                "vendorId": 41,
                "vendorCode": "G9",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_202411190309432kab.png"
            },
            {
                "slotsTypeID": 37,
                "slotsName": "MG_Fish",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240508113355f2gt.png"
            }
        ],
        "chess": [
            {
                "slotsTypeID": 19,
                "slotsName": "Card365",
                "vendorId": 19,
                "vendorCode": "Card365",
                "state": 1,
                "vendorImg": "https://ossimg.91admin123admin.com/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            }
        ],
        "fish": [
            {
                "gameID": "1",
                "gameNameEn": "Royal Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/1.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "119",
                "gameNameEn": "All-star Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/119.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "20",
                "gameNameEn": "Bombing Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/20.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "212",
                "gameNameEn": "Dinosaur Tycoon II",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/212.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "32",
                "gameNameEn": "Jack Pot Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/32.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "42",
                "gameNameEn": "Dinosaur Tycoon",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/42.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "60",
                "gameNameEn": "Dragon Fortune",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/60.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "71",
                "gameNameEn": "Boom Legend",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/71.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "74",
                "gameNameEn": "Mega Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/74.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "82",
                "gameNameEn": "Happy Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/JILI/82.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDFuWaFishing",
                "gameNameEn": "WD FuWa Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Fish/SFG_WDFuWaFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldBlastFishing",
                "gameNameEn": "WD Gold Blast Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Fish/SFG_WDGoldBlastFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldenFortuneFishing",
                "gameNameEn": "WD Golden Fortune Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Fish/SFG_WDGoldenFortuneFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldenFuwaFishing",
                "gameNameEn": "WD Golden Fuwa Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Fish/SFG_WDGoldenFuwaFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldenTyrantFishing",
                "gameNameEn": "WD Golden Tyrant Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Fish/SFG_WDGoldenTyrantFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDMerryIslandFishing",
                "gameNameEn": "WD Merry Island Fishing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/MG_Fish/SFG_WDMerryIslandFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            }
        ],
        "flash": [
            {
                "gameID": "810",
                "gameNameEn": "Cricket",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/810_20240818125355074.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/810_20240818125355154.png",
                "customGameType": 0
            },
            {
                "gameID": "800",
                "gameNameEn": "Aviator",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "customGameType": 0
            },
            {
                "gameID": "801",
                "gameNameEn": "Aviator-1Min",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/801_20240813135440084.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/801_20240813135440116.png",
                "customGameType": 0
            },
            {
                "gameID": "110",
                "gameNameEn": "Limbo",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/110.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "101",
                "gameNameEn": "Hilo",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/101.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "102",
                "gameNameEn": "Dice",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/102.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "100",
                "gameNameEn": "Mines",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/100.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "107",
                "gameNameEn": "Hotline",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/107.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "500",
                "gameNameEn": "Bomb Wave",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/500.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "811",
                "gameNameEn": "Mines Pro",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/811_20241014222635298.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/811_20241014222635408.png",
                "customGameType": 0
            },
            {
                "gameID": "115",
                "gameNameEn": "TeenPatti",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/115_20241014222648919.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/115_20241014222648951.png",
                "customGameType": 0
            },
            {
                "gameID": "114",
                "gameNameEn": "HorseRacing",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/114_20240813135455558.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/114_20240813135455575.png",
                "customGameType": 0
            },
            {
                "gameID": "113",
                "gameNameEn": "Pharaoh",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/113_20241014222744452.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/113_20241014222744483.jpg",
                "customGameType": 0
            },
            {
                "gameID": "112",
                "gameNameEn": "Triple",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/112_20240813135513719.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/112_20240813135513735.png",
                "customGameType": 0
            },
            {
                "gameID": "111",
                "gameNameEn": "Cryptos",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/111_20240813135521121.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/111_20240813135521137.png",
                "customGameType": 0
            },
            {
                "gameID": "108",
                "gameNameEn": "SpaceDice",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/108_20241014222709802.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/108_20241014222709817.png",
                "customGameType": 0
            },
            {
                "gameID": "106",
                "gameNameEn": "Keno",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/106.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "aviator",
                "gameNameEn": "Aviator",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/SPRIBE/22001_20240813135401357.png",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/SPRIBE/22001_20240813135401563.png",
                "customGameType": 0
            },
            {
                "gameID": "105",
                "gameNameEn": "Goal",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/105.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "104",
                "gameNameEn": "Roulette",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/104_20240813135532834.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/104_20240813135532850.png",
                "customGameType": 0
            },
            {
                "gameID": "103",
                "gameNameEn": "Plinko",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/103.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "900",
                "gameNameEn": "Keno80",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/900_20240813135541845.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/900_20240813135541876.png",
                "customGameType": 0
            },
            {
                "gameID": "109",
                "gameNameEn": "Coinflip",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/109_20240813135552350.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/109_20240813135552366.png",
                "customGameType": 0
            },
            {
                "gameID": "plinko",
                "gameNameEn": "Plinko",
                "img": "https://ossimg.91admin123admin.com/91club/gamelogo/SPRIBE/22004_20240813135409803.png",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/SPRIBE/22004_20240813135409820.png",
                "customGameType": 0
            }
        ],
        "lottery": [
            {
                "id": 1,
                "categoryCode": "Win Go",
                "categoryName": "WinGo彩票",
                "state": 1,
                "sort": 10,
                "categoryImg": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_202307140102511fow.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 2,
                "categoryCode": "K3",
                "categoryName": "K3彩票",
                "state": 1,
                "sort": 8,
                "categoryImg": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20230714010227swu2.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 3,
                "categoryCode": "5D",
                "categoryName": "5D彩票",
                "state": 1,
                "sort": 1,
                "categoryImg": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_2023071401023322dy.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 4,
                "categoryCode": "Trx Win Go",
                "categoryName": "TrxWinGo彩票",
                "state": 1,
                "sort": 0,
                "categoryImg": "https://ossimg.91admin123admin.com/91club/lotterycategory/lotterycategory_20230714010246lyuc.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            }
        ],
        "awardRecordList": [
            {
                "orderId": 7682987,
                "userId": 10697147,
                "userPhoto": "19",
                "userName": "919419660208",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.78,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682986,
                "userId": 1532732,
                "userPhoto": "4",
                "userName": "919991296779",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.69,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682985,
                "userId": 1923331,
                "userPhoto": "1",
                "userName": "918192042413",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.08,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682984,
                "userId": 7665669,
                "userPhoto": "1",
                "userName": "917006266963",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.08,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682983,
                "userId": 8883798,
                "userPhoto": "5",
                "userName": "919592113688",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 11.05,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682982,
                "userId": 4541433,
                "userPhoto": "6",
                "userName": "918077718531",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.69,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682981,
                "userId": 7943897,
                "userPhoto": "10",
                "userName": "919913673798",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.51,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682980,
                "userId": 3752404,
                "userPhoto": "11",
                "userName": "917236823655",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.69,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682979,
                "userId": 4199313,
                "userPhoto": "6",
                "userName": "919620012211",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.69,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
            },
            {
                "orderId": 7682978,
                "userId": 6796990,
                "userPhoto": "1",
                "userName": "919805101563",
                "gameName": "Aviator",
                "imgUrl": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431329.png",
                "imgUrl2": "https://ossimg.91admin123admin.com/91club/gamelogo/TB_Chess/800_20240813135431345.png",
                "multiple": 10.08,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2024-11-28 21:24:00"
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