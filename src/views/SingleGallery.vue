<template>
  <div id="single-image-gallery" class="images-gallery">
    <div
      v-for="(img, index) in images"
      :key="index"
      class="image-wrapper"
      @click="() => showImg(index)"
    >
      <img :src="img.image" alt="Gallery Image"/>
    </div>
    <vue-easy-lightbox
      :visible="visible"
      :imgs="images"
      :index="index"
      @hide="handleHide"
    ></vue-easy-lightbox>
  </div>
</template>

<script>
  export default {
    name: 'SingleGallery',
    data() {
      return {
        visible: false,
        index: 0,
        images: [],
      }
    },
    methods: {
      showImg(index) {
        this.index = index
        this.visible = true
      },
      handleHide() {
        this.visible = false
      }
    },
    mounted() {
    },
    created() {
      if (ACF_FIELDS) {
        if (ACF_FIELDS.gallery_images) {
          this.images = ACF_FIELDS.gallery_images
          this.images.map(function (item) {
            item.src = item.image
            return item
          })
        }
      }
    }
  }
</script>

<style lang="sass">


</style>
