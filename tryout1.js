const nav = document.querySelector("nav");

window.addEventListener("scroll", function(){
    nav.classList.toggle("sticky", this.window.scrollY > 0);
})