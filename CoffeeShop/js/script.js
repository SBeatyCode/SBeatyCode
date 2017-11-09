let navButton = document.getElementById('top-nav__menu-open-button');
let closeButton = document.getElementById('side-nav__close-button');
let sideNav = document.getElementById('side-nav');
let galleryImages = Array.from(document.getElementsByClassName('content--image-gallery--slide'));


//function to open the side nav
let toggleSideNav = () => {
    if(sideNav.style.width == '10em') {
        sideNav.style.width = '0';
        closeButton.style.display = 'none';
    } else {
        sideNav.style.width = '10em';
        closeButton.style.display = 'block';
    }
}


//function to hide image sliders, and to start the slideshow
let hideImages = () => {
    for(var image of galleryImages) {
        image.style.display = 'none';
    }
}


//function that manages the image slideshow. Every 3 seconds it removes the last image, and puts up a new image based on where the counter is.
let imageSlideShow = () => {
    let counter = 0;
    galleryImages[counter].style.display = 'block';
    setInterval(() => {
        galleryImages[counter].style.display = 'none';
        
        if(counter == 3) {
            counter = 0;
        } else {
            counter++;
        }
        
        galleryImages[counter].style.display = 'block';
    }, 3000);
}


//add event listeners to the buttons
navButton.addEventListener('click', toggleSideNav);
closeButton.addEventListener('click', toggleSideNav);


//call the functions to hide the images and start the slideshow
hideImages();
imageSlideShow();