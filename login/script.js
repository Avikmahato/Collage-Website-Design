function choose(no) {
  document.getElementById("login_content").style.display = "none";
  document.getElementById("NEW_USER_content").style.display = "none";
  if (no === 1) {
    document.getElementById("login_content").style.display = "flex";
  } else if (no === 2) {
    document.getElementById("NEW_USER_content").style.display = "flex";
  }
}
document.addEventListener("DOMContentLoaded", (event) => {
  choose(1);
});
function search(){
    var search=document.getElementById("search").value;
    document.location.href=`https://google.com/search?q=${search}`;
}