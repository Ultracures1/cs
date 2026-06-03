<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$data = array(
    "data" => "<p><b>Welcome back abgroup member,</b></p><p><b>🔥🔥 We have many bonus for you to claim 🔥🔥</b></p><p><b>1. First Deposit Bonus : After register and bind bank account to claim the bonus</b></p><p><b>2. Attendance Bonus : Do deposit till 7 day straight to claim the bonus 📋📋</b></p><p><b>3. Gifts Code : Use the code the agent give to receive a bonus 🎁🎁</b></p><p><b>4. Activity Award : Reach till the requirement and claim the bonus awaits you&nbsp;</b></p><p><b>5. Invitation Bonus : Invite individuals to deposit and play, you will receive the bonus&nbsp;</b></p><p><b>6. Betting Rebate : Every betting you do will get comission&nbsp;</b></p><p><b>7. Super Jackpot : Play on slot game and when you have big win can get the bonus 🎰🎰</b></p><p><b>8. VIP Bonus : This bonus you can claim it monthly and every level VIP you increase</b></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\"><br><b>Join us and become part of our agent to get the amazing benefit. the best aspect of joining our agent, if more you invite and the higher level of your downlines, the greater the bonuses you may receive, resulting the more downlines.",
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => $serviceNowTimeFormatted
);

$response = json_encode($data, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $response;

?>
