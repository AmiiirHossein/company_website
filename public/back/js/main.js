const nav = document.querySelector(".nav");
const mySlideNav = document.querySelector("#mySlidenav");
const main = document.querySelector("#main");
const iconA = document.querySelectorAll(".icon-a");
const icon = document.querySelectorAll('.icon');
const logo = document.querySelector('.logo');
const footer = document.querySelector('.footer-panel');
const sub = document.querySelector('.footer-submenu');

nav.addEventListener("click", function(){
    mySlideNav.classList.toggle("active");
    main.classList.toggle("active");
    logo.classList.toggle("active")
    iconA.forEach(item => {
        item.classList.toggle("active")
    })
    icon.forEach(item => {
        item.classList.toggle('active')
    })
})


footer.addEventListener('click', function (){
    sub.classList.toggle('show');
})

