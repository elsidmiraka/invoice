$(document).ready(function(){
    $("#add-button").click(function(){
        $( "#toggled-row" ).slideToggle("fast");
    });
});

function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}