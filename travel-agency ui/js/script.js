// ===============================
// Menu
// ===============================

let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

// ===============================
// Search Bar
// ===============================

let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');

searchBtn.onclick = () => {
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
};

// ===============================
// Login Form
// ===============================

let loginBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');

loginBtn.onclick = () => {
    loginForm.classList.add('active');
};

formClose.onclick = () => {
    loginForm.classList.remove('active');
};

// ===============================
// Window Scroll
// ===============================

window.onscroll = () => {

    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');

    loginForm.classList.remove('active');
};
let videoBtn = document.querySelectorAll('.vid-btn');

videoBtn.forEach(btn => {
    btn.addEventListener('click', () => {

        document.querySelector('.controls .active').classList.remove('active');

        btn.classList.add('active');

        let src = btn.getAttribute('data-src');

        document.querySelector('#video-slider').src = src;

    });
});

// Review Slider

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    breakpoints: {

        640: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
        },

        1024: {
            slidesPerView: 3,
        }

    }

});

// Brand Slider

var brandSwiper = new Swiper(".brand-slider", {

    spaceBetween:20,
    loop:true,

    autoplay:{
        delay:2500,
        disableOnInteraction:false,
    },

    breakpoints:{

        450:{
            slidesPerView:2,
        },

        768:{
            slidesPerView:3,
        },

        991:{
            slidesPerView:4,
        },

        1200:{
            slidesPerView:5,
        }

    }

});