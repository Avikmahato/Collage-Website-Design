let left = document.querySelector(".left");
let right = document.querySelector(".right");
let slide = document.querySelector(".photo");
let images = document.querySelectorAll(".image");
let no_of_images = images.length;
let n = 1;
left.addEventListener("click", () => {
  slide.style.transform = `translateX(-${
    (Math.abs(no_of_images + (no_of_images - n)) % no_of_images) * 800
  }px)`;
  n++;
});
right.addEventListener("click", () => {
  slide.style.transform = `translateX(-${
    (Math.abs(no_of_images + n) % no_of_images) * 800
  }px)`;
  n++;
});

function op() {
  let sidebar = document.getElementById("sidebar");
  sidebar.style.transform = "translateX(0px)";
}
function clo() {
  let sidebar = document.getElementById("sidebar");
  sidebar.style.transform = "translateX(-400px)";
}
setInterval(() => {
  slide.style.transform = `translateX(-${
    (Math.abs(no_of_images + n) % no_of_images) * 800
  }px)`;
  n++;
}, 3000);

function choose(no) {
  document.querySelector(".student_view").style.display = "none";
  document.querySelector(".professor_view").style.display = "none";
  document.querySelector(".student_profile").style.display = "none";
  document.querySelector(".head").style.display = "none";
  document.querySelector(".feedback").style.display = "none";
  document.getElementById("home").style.display = "none";
  if (no === 1) {
    document.getElementById("home").style.display = "flex";
    document.querySelector(".head").style.display = "block";
    document.querySelector(".feedback").style.display = "flex";
    clo();
  } else if (no === 2) {
    document.querySelector(".student_view").style.display = "grid";
    document.getElementById("notice").style.display = "none";
    clo();
  } else if (no === 3) {
    document.getElementById("notice").style.display = "none";
    document.querySelector(".student_profile").style.display = "flex";
    clo();
  }
  else if(no===4){
    document.querySelector(".professor_view").style.display = "grid";
    document.getElementById("notice").style.display = "none";
    clo();
  }
}
document.addEventListener("DOMContentLoaded", () => {
  choose(1);
});
