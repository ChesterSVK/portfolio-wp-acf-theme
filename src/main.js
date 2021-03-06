import { createApp } from 'vue'
import HomeTabs from './views/HomeTabs'
import AboutTabs from './views/AboutTabs'
import Gallery from './views/Gallery'
import SingleGallery from './views/SingleGallery'
import LightboxGallery from './views/LightboxGallery'

import VueEasyLightbox from 'vue-easy-lightbox'
import { Tabs, Tab } from 'vue3-tabs-component'

// import store from './store'
const homeTabsElement = document.getElementById('home-tabs')
const aboutTabsElement = document.getElementById('about-tabs')
const galleryElement = document.getElementById('galleryElement')
const singleGallery = document.getElementById('single-image-gallery')
const lightboxGallery = document.getElementById('lightbox-gallery')

if (homeTabsElement != null) {
  createApp(HomeTabs)
    .component('tabs', Tabs)
    .component('tab', Tab)
    .mount('#home-tabs')
}

if (aboutTabsElement != null) {
  createApp(AboutTabs)
    .component('tabs', Tabs)
    .component('tab', Tab)
    .mount('#about-tabs')
}

if (galleryElement != null) {
  createApp(Gallery)
    .mount('#galleryElement')
}

if (singleGallery != null) {
  createApp(SingleGallery)
    .use(VueEasyLightbox)
    .mount('#single-image-gallery')
}

if (lightboxGallery != null) {
  createApp(LightboxGallery)
    .use(VueEasyLightbox)
    .mount('#lightbox-gallery')
}
