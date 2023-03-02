'use strict';
let btnMenu = document.getElementsByClassName('menu'),
    navBarMenu = document.getElementsByClassName('navbarMenu');
btnMenu[0].onclick = () => {
    btnMenu[0].classList.toggle("active");
    navBarMenu[0].classList.toggle("active");
}

let imgArr = document.querySelectorAll(".i");
let prevX = 0;
let prevY = 0;
let moveXAmount = 0;
let moveYAmount = 0;

document.addEventListener("mousemove", function(e){
    mousePos(e);
})

function mousePos(e){

    moveXAmount = e.pageX - prevX;
    moveYAmount = e.pageY - prevY;

    moveImg(moveXAmount, moveYAmount);

    prevX = e.pageX;
    prevY = e.pageY;
}

function moveImg(xAmount, yAmount){

    imgArr.forEach(function(img){
        let movementStrength = 5 + (Math.random() * 15)
        img.style.left = (img.offsetLeft) - (xAmount/movementStrength) + "px";
        img.style.top = (img.offsetTop) - (yAmount/movementStrength) + "px";

    })
}

