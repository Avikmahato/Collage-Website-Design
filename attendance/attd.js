
let success=document.getElementById("success");
open=()=>{
    success.classList.add("show-success");
};
document.querySelector(".avisu").addEventListener("click",()=>{
    success.classList.remove("show-success");
    window.location.href="#";
});
