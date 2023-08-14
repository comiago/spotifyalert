<?php 

$headerLoaded = true;
$footerLoaded = true;
$footerLoaded = true;

require 'sections/header.php';
require 'sections/login.php';

?>

<section id="calendar" class="page-section bg-primary text-y">
    <div class="container"><!-- About Section Heading-->
    <h2 class="page-section-heading text-center text-uppercase">Calendario annuale</h2>
    <!-- Icon Divider-->
    <div class="divider-custom">
    <p class="divider-custom-line"></p>
    </div>
        <div class="table-container">
            <table id="calendarTable">
                <!-- <tbody>
                    <th>Anonimo</th>
                    <th>Gennaio</th>
                    <th>Luglio</th>
                </tbody>
                    <th>Benedetta</th>
                    <th>Febbraio</th>
                    <th>Agosto</th>
                </tbody>
                <tbody>
                    <th>Siria</th>
                    <th>Marzo</th>
                    <th>Settembre</th>
                </tbody>
                <tbody>
                    <th>Franco</th>
                    <th>Aprile</th>
                    <th>Ottobre</th>
                </tbody>
                <tbody>
                    <th>Francesca</th>
                    <th>Maggio</th>
                    <th>Novembre</th>
                </tbody>
                <tbody>
                    <th>Francesco</th>
                    <th>Giugno</th>
                    <th>Dicembre</th>
                </tbody> -->
            </table>
        </div>
    </div>
</section>

<!-- Portfolio Section-->
<section id="description" class="page-section bg-thirdly text-y">
    <div class="container"><!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase">Descrizione</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <p class="divider-custom-line"></p>
        </div>
        <div class="container text-center text-black">Sito semplice e utile per ricordare a tutti quando &egrave; il proprio turno di pagare Spotify, il tutto in automatico...</div>
    </div>
</section>
<?php require 'sections/footer.php' ?>