import { initBarba } from './utils/pageTransitions'
import { initScrollEffects } from './utils/scrollEffects'
import { initTouchEvents } from './utils/touchEvents'

const init = () => {
    initBarba();
    initTouchEvents();
    initScrollEffects();
}

init();