import lax from 'lax.js'

window.lax = lax;

const scrollY = {
    scale: [
        ["elInY", "elOutY"],
        [1.6, 1],
    ],
    // blur: [
    //     ["elInY", "elCenterY"],
    //     [5, 0],
    // ],
    rotate: [
        ["elInY", "elOutY"],
        [6, 0],
    ],
    opacity: [
        ["elInY", "elCenterY"],
        [0.75, 1],
    ]
};

export const addScrollElements = () => {
    window.lax.elements = [];
    window.lax.addElements('.scroll-effect', {
        scrollY
    });
}

export const initScrollEffects = () => {
    window.lax.init();
    window.lax.addDriver('scrollY', function() {
        return window.scrollY
    });
    addScrollElements();
}

export default initScrollEffects;