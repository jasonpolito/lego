import TinyGesture from 'tinygesture';

export const initTouchEvents = () => {
    const body = document.querySelector('body');
    const handler = new TinyGesture(body);
    handler.on('swiperight', e => {
        if (e.target.hasAttribute('data-carousel-id')) {
            const id = e.target.dataset.carouselId;
            const prev = document.querySelector(`[data-carousel-prev="${id}"]`);
            prev.dispatchEvent(new Event('click'));
        }
    });
    handler.on('swipeleft', e => {
        if (e.target.hasAttribute('data-carousel-id')) {
            const id = e.target.dataset.carouselId;
            const next = document.querySelector(`[data-carousel-next="${id}"]`);
            next.dispatchEvent(new Event('click'));
        }
    });
}