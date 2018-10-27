function checkDate(date) {
    var fullDate = new Date();
    var twoDigitMonth = ((fullDate.getMonth().length + 1) === 1) ? (fullDate.getMonth() + 1) : (fullDate.getMonth() + 1);
    var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + fullDate.getDate();

    // var diff = Math.abs(date - currentDate);
    alert(currentDate)
}

$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    });


    $('.studentdate').change(function() {
        var chkdate = $('.studentdate').val();
        checkDate(chkdate);
    });

    $("#deleteForm").on("submit", function() {
        return confirm("Do you want to delete this item?");
    });



});