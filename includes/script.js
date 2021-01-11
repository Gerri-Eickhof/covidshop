
document.getElementById("closeForm").onclick = function closeForm() {
    document.getElementById("myForm").style.display = "none";
    console.log("Er is geklikt")
}

document.getElementById("openForm").onclick = function openForm() {
    document.getElementById("myForm").style.display = "block";
}