<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "typeID": 1,
        "gamePresentation": "<p><font face=\"Arial, Microsoft YaHei, \\\\5FAE软雅黑, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">1 minutes 1 issue, 45 seconds to order, 15 seconds waiting for the draw. It opens all day. The total number of trade is 1440 issues.</font><br></p><p><font face=\"Arial, Microsoft YaHei, \\\\5FAE_REALTYPEans-serif\">If you spend 100 to trade, after deducting 2 service fee, your contract amount is 98:</font></p><p><font face=\"Arial, Microsoft YaHei, \\\\5FAE_REALTYPEans-serif\">1.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAECALLTYPE&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">green: if the result shows 1,3,7,9 you will get (98*2) 196;If the result shows 5, you will get (98*1.5) 147</font></p><p><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">2.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAECALLTYPE&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">red: if the result shows 2,4,6,8 you will get (98*2) 196;If the result shows 0, you will get (98*1.5) 147</font></p><p><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">3.</font><span style=\"font-family: Arial, &quot;Microsoft YaHei&quot;, &quot;\\\\5FAECALLTYPE&quot;, &quot;\\\\5B8B体&quot;, &quot;Malgun Gothic&quot;, Meiryo, sans-serif;\">Select</span><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">violet:if the result shows 0 or 5, you will get (98*4.5) 441</font></p><p><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">4. Select number:if the result is the same as the number you selected, you will get (98*9) 882</font></p><p><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">5. Select big: if the result shows 5,6,7,8,9 you will get (98 * 2) 196</font></p><p><font face=\"Arial, Microsoft YaHei, \\\\5FAECALLTYPE, \\\\5B8B体, Malgun Gothic, Meiryo, sans-serif\">6. Select small: if the result shows 0,1,2,3,4 you will get (98 * 2) 196</font></p>"
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

echo $response;
header('Content-Type: application/json');
