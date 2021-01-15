
document.getElementById("closeForm").onclick = function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

document.getElementById("openForm").onclick = function openForm() {
    document.getElementById("myForm").style.display = "block";
}

// document.getElementById("bookSubmit").onclick = function bookConfirm() {
//     {
//         document.getElementById("confirmText").value = "Je hebt gereserveerd!";
//     }
// }
document.getElementById("bookSubmit").onclick = function bookConfirm() {
    const confirmText = document.querySelector("#result")
    confirmText.innerHTML = "Je hebt gereserveerd!"
}