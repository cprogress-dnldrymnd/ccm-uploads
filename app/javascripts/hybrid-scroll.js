const stickySections = [...document.querySelectorAll('.sticky')];
let images = [
    'https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-3.png',
    'https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-3.png',
    'https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-3.png',
    'https://ccm.theprogressteam.com/wp-content/uploads/2020/11/maverick-3.png'
];
images.forEach(img => {
    stickySections.forEach(section => {
        let image = document.createElement('img');
        image.src = img;
        section.querySelector('.scroll_section').appendChild(image);
    });
});


jQuery('body').scroll(function () {
    for (let i = 0; i < stickySections.length; i++) {
        transform(stickySections[i]);
    }
});

function transform(section) {
    const offsetTop = section.parentElement.offsetTop;
    const scrollSection = section.querySelector('.scroll_section');
    let percentage = ((window.scrollY - offsetTop) / window.innerHeight) * 100;
    percentage = percentage < 0 ? 0 : percentage > 400 ? 400 : percentage;
    scrollSection.style.transform = `translate3d(${-(percentage)}vw, 0 0)`;
    console.log(offsetTop);
}