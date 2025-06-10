let slideImages = document.querySelectorAll('img');
let next = document.querySelector('.next');
let prev = document.querySelector('.prev');
let dots = document.querySelectorAll('.dot');

let counter = 0;

next.addEventListener('click', slideNext);
function slideNext() {
    slideImages[counter].style.animation = 'next1 0.5s ease-in forwards';
    counter = (counter >= slideImages.length - 1) ? 0 : counter + 1;
    slideImages[counter].style.animation = 'next2 0.5s ease-in forwards';
    indicators();
}

prev.addEventListener('click', slidePrev);
function slidePrev() {
    slideImages[counter].style.animation = 'prev1 0.5s ease-in forwards';
    counter = (counter === 0) ? slideImages.length - 1 : counter - 1;
    slideImages[counter].style.animation = 'prev2 0.5s ease-in forwards';
    indicators();
}

function autoSliding() {
    deletInterval = setInterval(() => {
        slideNext();
    }, 3000);
}
autoSliding();

const container = document.querySelector('.slide-container');
container.addEventListener('mouseover', function() {
    clearInterval(deletInterval);
});

container.addEventListener('mouseout', autoSliding);

function indicators() {
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(' active', '');
    }
    dots[counter].className += ' active';
}

function switchImage(currentImage) {
    currentImage.classList.add('active');
    let imageId = parseInt(currentImage.getAttribute('attr'), 10); 
    if (imageId > counter) {
        slideImages[counter].style.animation = 'next1 0.5s ease-in forwards';
        counter = imageId;
        slideImages[counter].style.animation = 'next2 0.5s ease-in forwards';
    } else if (imageId < counter) {
        slideImages[counter].style.animation = 'prev1 0.5s ease-in forwards';
        counter = imageId;
        slideImages[counter].style.animation = 'prev2 0.5s ease-in forwards';
    }
    indicators();
}
