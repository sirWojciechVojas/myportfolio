let close = document.getElementById("close");
let message = document.getElementById("card-flash");

close.addEventListener("click", function() {
    message.remove();
});