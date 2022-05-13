import barba from '@barba/core';
import anime from 'animejs/lib/anime.es.js';
import AOS from 'aos';
// import lax from 'lax.js';
import { initScrollEffects } from './scrollEffects'
// import { setupParticles } from './particles'
import 'aos/dist/aos.css';

export const initBarba = () => {
    if (typeof ga != 'undefined') {
        console.log('initialize analytics');
        barba.hooks.after(() => {
            ga('set', 'page', window.location.pathname);
            ga('send', 'pageview');
        });
    }
    const cover = document.querySelector('.page-cover');
    window.barba = barba;
    barba.init({
        views: [{
            namespace: 'global',
            before(data) {},
            beforeEnter(data) {
                initScrollEffects();

                const regex = /<script[^>]*src=["']([^"']*)["']/g;
                const html = data.next.html;
                const startPage = html.indexOf('<!--BEGIN_PAGE');
                const endPage = html.indexOf('<!--END_PAGE');
                let match;
                while (match = regex.exec(html)) {
                    const src = match[1];
                    const index = html.indexOf(src);
                    const inPage = index > startPage && index < endPage;
                    if (inPage) {
                        console.log('script detected', src)
                        let script = document.createElement('script');
                        script.src = src;
                        data.next.container.appendChild(script);
                    }
                }
                AOS.init();
                // setupParticles();
            },
            afterEnter() {
                window.dispatchEvent(new Event('resize'));
                window.dispatchEvent(new Event('scroll'));
                setTimeout(() => {

                    window.dispatchEvent(new Event('resize'));
                    window.dispatchEvent(new Event('scroll'));
                }, 100)
                window.Alpine.discoverUninitializedComponents(function(el) { Alpine.initializeComponent(el) })
            }
        }],
        transitions: [{
            name: 'default-transition',
            leave(data) {
                cover.classList.remove('top-0');
                cover.classList.add('bottom-0');
                anime({
                    targets: '.page-cover',
                    height: [0, '100%'],
                    duration: 600,
                    easing: 'easeInQuad',
                })
                return new Promise(resolve => {
                    anime({
                        targets: '.page-cover .icon-wrap',
                        opacity: [0, 1],
                        translateY: [100, 0],
                        duration: 800,
                        easing: 'easeOutQuad',
                        complete() {
                            resolve();
                        }
                    })
                })
            },
            afterLeave(data) {
                window.scrollTo(0, 0);
                cover.classList.add('top-0');
                cover.classList.remove('bottom-0');
                anime({
                    targets: '.shadow-box',
                    boxShadow: ['inset 0 0 0 80px', 'inset 0 0 0 0px'],
                    duration: 600,
                    easing: 'easeInQuad',
                })
                anime({
                    targets: '.page-cover',
                    height: ['100%', 0],
                    duration: 600,
                    easing: 'easeInQuad',
                })
                anime({
                    targets: '.page-cover .icon-wrap',
                    opacity: [1, 0],
                    translateY: [0, -100],
                    duration: 800,
                    easing: 'easeInQuad',
                })
            }
        }]
    });
}

export default initBarba;