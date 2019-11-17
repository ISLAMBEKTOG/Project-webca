document.getElementById("ex1").addEventListener("click",openP);
document.getElementById("close").addEventListener("click",closeP);
function openP(){
    var popup = document.getElementById("popup1");
    popup.style.display = "block";
}
function closeP(){
    var popup = document.getElementById("popup1");
    popup.style.display = "none";
}