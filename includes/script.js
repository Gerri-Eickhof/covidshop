function confirmInput() {
    fname = document.forms[0].firstname.value;
    alert("Hallo " + fname + "! U zal nu terug gestuurd worden naar de kalender!");
}


// function openForm() {
//     document.getElementById("myForm").style.display = "block";
// }

document.getElementById("closeForm").onclick = function closeForm() {
    document.getElementById("myForm").style.display = "none";
    console.log("Er is geklikt")
}

document.getElementById("openForm").onclick = function openForm() {
    document.getElementById("myForm").style.display = "block";
}