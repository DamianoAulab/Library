import 'bootstrap';

let sessionSuccess = document.getElementById("sessionSuccess");
let sessionEdit = document.getElementById("sessionEdit");
let sessionDelete = document.getElementById("sessionDelete");

// Nascondi il div dopo 3 secondi
setTimeout(function() {
    sessionSuccess.style.display = 'none';
}, 3000);

setTimeout(function() {
    sessionEdit.style.display = 'none';
}, 3000);

setTimeout(function() {
    sessionDelete.style.display = 'none';
}, 3000);

