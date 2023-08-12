$(document).ready(() => {
    function loadTable(){
        $.ajax({
            url: "/dbh/resurces.php",
            method: "POST",
            data:{function:"getUsers"},
            success:function(data){
                console.log(data);
                $('#calendarTable').html(data);
            }
        });
    }

    loadTable();
})