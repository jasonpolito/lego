import mediumZoom from 'medium-zoom'

mediumZoom('[data-zoomable]')

const iframes = document.querySelectorAll('iframe');

iframes.forEach(iframe => {
    const wrap = document.createElement('div');
    iframe.classList.add('fill-parent')
    iframe.parentNode.insertBefore(wrap, iframe);
    wrap.appendChild(iframe);
    wrap.style.paddingTop = '56.25%';
})