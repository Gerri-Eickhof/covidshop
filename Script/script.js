function confirmInput() {
    fname = document.forms[0].firstname.value;
    alert("Hallo " + fname + "! U zal nu terug gestuurd worden naar de kalender!");
}
var Process = document.getElementsByName('submit');
Process.onclick = myFunction;

function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}