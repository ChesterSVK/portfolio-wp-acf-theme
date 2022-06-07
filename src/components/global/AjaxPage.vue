<template>
  <div class="ajaxPage" :class="[ loading ? loadingClass : '' ]">
    <div class="loading-wrapper" :class="[ loading ? loadingClass : '' ]">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:transparent;display:block;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <path d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#a32035" stroke="none">
          <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 51;360 50 51"></animateTransform>
        </path>
      </svg>
    </div>
    <div class="ajaxPageContent page-content" :class="[ loading ? loadingClass : '' ]" v-if="pageContent && contentLoaded" :v-show="isActive" v-html="pageContent">
    </div>
  </div>
</template>

<script>

  export default {
    name: 'AjaxPage',
    props: {
      active: {
        type: Boolean,
        required: true,
      },
      url: {
        type: String,
        required: true,
      },
      loadingClass: {
        type: String,
        default: 'ajax-page-loading'
      },
    },
    data() {
      return {
        loading: true,
        pageContent: false,
        contentLoaded: false
      }
    },
    created(){
      if (!this.url) {
        return;
      }
      if (this.active && !this.contentLoaded) {
        this.callAPI(this.url)
      }
    },
    watch: {
      active(newItem){
        if (newItem && !this.contentLoaded){
          this.callAPI(this.url)
        }
      }
    },
    computed: {
      isActive() {
        return this.active
      }
    },
    methods: {
      callAPI(url) {
        if (!url) return false;

        const component = this
        component.loading = true

        let finalUrl = url
        if ("" + url.indexOf('?') < 0) {
          finalUrl = finalUrl  + '?caller=ajax'
        } else {
          finalUrl = finalUrl  + '&caller=ajax'
        }


        return fetch(finalUrl, {
          method: 'get',
          headers: {
            'content-type': 'text/html',
            'charset': 'UTF-8'
          }
        })
        .then(res => {
          // a non-200 response code
          if (!res.ok) {
            console.error('Calling ajax page failed')
          }

          return res.text();
        })
        .catch(err => {
          const error = new Error(err.statusText);
          error.value = err;
          // In case a custom JSON error response was provided
          if (err.json) {
            return err.json.then(json => {
              // set the JSON response message
              error.value.message = json.message;
            });
          }
        })
        .then((data) => {
          component.pageContent = data
          component.contentLoaded = true
          component.loading = false;
          reinitAjaxContent();
        });
      }
    }
  }
</script>

<style lang="sass">

  .ajaxPage
    margin-top: 2rem
    position: relative
    min-height: auto
    padding: 0 15px

    &.ajax-page-loading
      min-height: 400px

    .loading-wrapper
      text-align: center
      background-color: #fff
      display: none
      position: absolute
      width: 100%
      height: 100%
      left: 0
      right: 0
      bottom: 0
      top: calc(50% - 50px)
      margin: 0 auto

    .loading-wrapper.ajax-page-loading
      display: block

  body.dark
    .ajaxPage
      .loading-wrapper
        background-color: #000

</style>
