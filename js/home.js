window.addEventListener('load', () => {
    var
        carousels = document.querySelectorAll('.carousel')
        ;

    for (var i = 0; i < carousels.length; i++) {
        carousel(carousels[i]);
    }
});

function carousel(root) {
    var
        figure = root.querySelector('figure'),
        // nav = root.querySelector('nav'),
        images = figure.children,
        n = images.length,
        gap = root.dataset.gap || 0,
        bfc = 'bfc' in root.dataset,

        theta = 2 * Math.PI / n,
        currImage = 0
        ;

    setupCarousel(n, parseFloat(getComputedStyle(images[0]).width));
    window.addEventListener('resize', () => {
        setupCarousel(n, parseFloat(getComputedStyle(images[0]).width))
    });

    setupNavigation();

    function setupCarousel(n, s) {
        var
            apothem = s / (2 * Math.tan(Math.PI / n))
            ;

        figure.style.transformOrigin = `50% 50% ${- apothem}px`;

        for (var i = 0; i < n; i++)
            images[i].style.padding = `${gap}px`;
        for (i = 1; i < n; i++) {
            images[i].style.transformOrigin = `50% 50% ${- apothem}px`;
            images[i].style.transform = `rotateY(${i * theta}rad)`;
        }
        if (bfc)
            for (i = 0; i < n; i++)
                images[i].style.backfaceVisibility = 'hidden';

        rotateCarousel(currImage);
    }

    function setupNavigation() {
        window.addEventListener('load', onClick, true);

        function onClick(e) {
            // e.stopPropagation();

            // var t = e.target;
            // if (t.tagName.toUpperCase() != 'BUTTON')
            //     return;

            currImage++;
            // if (t.classList.contains('next')) {
            //     currImage++;
            // }
            // else {
            //     currImage--;
            // }

            rotateCarousel(currImage);
        }
        setInterval(() => {
            onClick();

        }, 2500);


    }

    function rotateCarousel(imageIndex) {
        figure.style.transform = `rotateY(${imageIndex * -theta}rad)`;
    }

}
//navigate to login-page
let loginButton = document.getElementById("login");
loginButton.addEventListener("click", function () {
    window.location.assign("./auth/user_auth/login.php");
});

let galleryButton = document.getElementById("gallery");
galleryButton.addEventListener("click", function () {
    window.location.assign("./data/user/gallery.php");
});
let adminButton = document.getElementById("admin");
adminButton.addEventListener("click", function () {
    window.location.assign("./data/admin/admindashboard.php");
});


