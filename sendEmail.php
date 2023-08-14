<?php

require 'sections/header.php';
require 'dbh/resurces.php';
require 'dbh/administration.php';

$userMonths = mapMonths();
$monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$userName = '';

foreach ($userMonths as $user => $months) {
    foreach($months as $month) {
        if($month == $monthNames[date('m') - 1]){
            $getUser = getUserByName($user);
            $userName = $getUser['fullName'];
            if(date('d') >= 20){
                $admin = getAdministrator();
                $to = $getUser['email'];
                $subject = "Spotify payment reminder";
                $message = "Hi " . $getUser['fullName'] . ",<br> with this email we want to remember you that is your turn to pay spotify!<br><br> Greetings from administrators of spotify alert<br><br><br>";
                $headers = "From: Spotify Alert <spotifyalert@notify.cymbaline>\r\n";
                $headers .= "Reply-To: " . $admin['email'] . "\r\n";
                $headers .= "Content-Type: text/html;";
                mail($to, $subject, $message, $headers);
            }
            break;
        }
    }
}
?>

<div class="container">
    <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
            <h1>This month is the turn of <?php echo $userName ?> to pay spotify</h1>
            <br><hr><br>
            <h3>
                <?php
                    if(date('d') >= 20){
                        echo 'Sending email right now...';
                    } else{
                        echo 'Email will be sent after 20 of this month';
                    }
                ?>
            </h3>
        </div>
    </div>
</div>

<?php require 'sections/footer.php' ?>