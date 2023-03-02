"use strict";
const nav1 = document.getElementById("nav-item-1");
const nav2 = document.getElementById("nav-item-2");
const nav3 = document.getElementById("nav-item-3");

const content1 = document.getElementById("content-item-1");
const content1i = document.getElementById("gallery");
const content1hr = document.getElementById("hr-gallery");
const content1lang = document.getElementById("lang");
const content1js = document.getElementById("js");
const content1php = document.getElementById("php");
const content1html = document.getElementById("html");

const content1jspage = document.getElementById("jspage");
const content1phppage = document.getElementById("phppage");
const content1htmlpage = document.getElementById("htmlpage");
const page = document.querySelectorAll(".page");
const close = document.querySelectorAll(".close");


const content2 = document.getElementById("content-item-2");
const content3i = document.getElementById("contact");
const content3hr = document.getElementById("hr-best");
const content3hr1 = document.getElementById("hr-1");




const content3 = document.getElementById("content-item-3");

//nav bar
nav1.addEventListener("click", function() {
    nav1.classList.add("souligne");
    nav2.classList.remove("souligne");
    nav3.classList.remove("souligne");
  content1.classList.add("show-1");
  content1i.classList.replace("no-ap","ap");
  content3i.classList.replace("ap","no-ap");
  content2.classList.remove("show-2");
  content3.classList.remove("show");
});

nav2.addEventListener("click", function() {
    nav2.classList.add("souligne");
    nav3.classList.remove("souligne");
    nav1.classList.remove("souligne");
  content2.classList.add("show-2");
  content1.classList.remove("show-1");
  content1i.classList.replace("ap","no-ap");
  content3i.classList.replace("ap","no-ap");
  content3.classList.remove("show");
});
nav3.addEventListener("click", function() {
    nav1.classList.remove("souligne");
    nav3.classList.add("souligne");
    nav2.classList.remove("souligne");
  content3.classList.add("show");
  content1.classList.remove("show-1");
  content1i.classList.replace("ap","no-ap");
  content3i.classList.replace("no-ap","ap");
  content2.classList.remove("show-2");
});


//contenu 1 faire apparaitre la liste de langages
content1.addEventListener("mouseover", function() {
    content1lang.classList.replace('cont-in', 'cont-vi');
    content1i.classList.replace('img-in', 'img-vi');
    content1.classList.replace('c-i-in', 'c-i-vi');
    content1hr.classList.replace('hr-in', 'hr-vi');
});
content1.addEventListener("mouseout", function() {
    if (content1jspage.classList.contains('show-page') || content1phppage.classList.contains('show-page') || (content1htmlpage.classList.contains('show-page'))) {  
    }
    else{
        content1lang.classList.replace('cont-vi', 'cont-in');  
        content1hr.classList.replace('hr-vi', 'hr-in');
        content1.classList.replace('c-i-vi', 'c-i-in');
        content1i.classList.replace('img-vi', 'img-in');
    }
});
//faire apparaitre les projets 
content1js.addEventListener("click", function() {
    content1jspage.classList.add("show-page");
    content1phppage.classList.remove("show-page");
    content1htmlpage.classList.remove("show-page");
});
content1php.addEventListener("click", function() {
    content1phppage.classList.add("show-page");
    content1jspage.classList.remove("show-page");
    content1htmlpage.classList.remove("show-page");
});
content1html.addEventListener("click", function() {
    content1htmlpage.classList.add("show-page");
    content1jspage.classList.remove("show-page");
    content1phppage.classList.remove("show-page");
});
//faire disparaitre les la page des projets
for(let i = 0; i < close.length; i++) {
    close[i].addEventListener("click", function() {
        console.log(page[i].id);
        //avec des plus et moins
        page[i].classList.remove("show-page");
})};

//faire apparaitre les projets 
let titrejs = document.querySelectorAll(".titrejs");
let projetjs = document.querySelectorAll('.projetjs');
/*
titrejs[0].addEventListener("click", function() {
    projetjs[0].classList.toggle("no-ap");
});
for(let j = 0; j < titrejs.length; j++) {
    titrejs[j].addEventListener("click", function() {
        projetjs[j].classList.toggle("no-ap");
        
})};
*/
for (let i = 0; i < titrejs.length; i++) {
    titrejs[i].addEventListener("click", function() {
      // hide all projetjs elements
      for (let j = 0; j < projetjs.length; j++) {
        projetjs[j].style.display = "none";
      }
      // show the corresponding projetjs element
      projetjs[i].style.display = "block";
    });
}

//contact
content3.addEventListener("mouseover", function() {
    content3.classList.replace('c-i-in', 'c-i-3');
    content3hr.classList.replace('hr-in', 'hr-vi');
    content3hr1.classList.replace('no-barre', "barre");
    content3i.style.marginLeft="50px";

});
content3.addEventListener("mouseout", function() {
    content3.classList.replace('c-i-3', 'c-i-in');
    content3hr.classList.replace('hr-vi', 'hr-in');
    content3hr1.classList.replace("barre", 'no-barre');
    content3i.style.marginLeft="0px";

});
