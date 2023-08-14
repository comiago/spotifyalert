<?php 

session_start();
$includeStylesheets = false;

if (isset($_SESSION['id'])):
    require 'sections/header.php'; 

?>

<div class="container">
    <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
            <h1>Logged In</h1>
        </div>
    </div>
</div>

<?php

require('sections/footer.php');

else:
    header("Location: /sections/login.php");

endif;

?>