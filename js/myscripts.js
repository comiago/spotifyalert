$(document).ready(() => {
    function loadTable(){
        $.ajax({
            url: "/dbh/resurces.php",
            method: "POST",
            data:{function:"getCalendar"},
            success:function(data){
                console.log(data);
                $('#calendarTable').html(data);
            }
        });
    }

    loadTable();
})