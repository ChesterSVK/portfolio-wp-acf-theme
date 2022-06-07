<template>
  <div id="gallery">
    <div class="loading-wrapper" :class="[ loading ? loadingClass : '' ]">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
           style="margin:auto;background:transparent;display:block;" width="100px" height="100px" viewBox="0 0 100 100"
           preserveAspectRatio="xMidYMid">
        <path d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#a32035" stroke="none">
          <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1"
                            values="0 50 51;360 50 51"></animateTransform>
        </path>
      </svg>
    </div>

    <div v-if="filterAllowed">
      <div class="filter-wrapper">
        <div class="season-filter-wrap" v-if="categories.length">
          <select name="season" id="season" @change="changeSeason">
            <option value="" selected>{{ chooseSeasonString }}</option>
            <option :value="category['value']" v-for="category in categories">{{category['label']}}</option>
          </select>
        </div>
        <div class="month-filter-wrap" v-if="months.length">
          <select name="month" id="month" @change="changeMonth">
            <option value="" selected>{{ chooseMonthsString }}</option>
            <option :value="month['value']" v-for="month in months">{{month['label']}}</option>
          </select>
        </div>
      </div>
    </div>

    <infinite-scroll @infinite-scroll="load"
                     :message="message"
                     :noResult="noResult">
      <div v-if="categories" class="masonry-with-columns">
        <div class="mansonry-brick" v-for="gallery in computedGalleries" :key="gallery.id">
          <a class="mansory-brick-link" :href="gallery.link" :title="gallery.title">
            <img class="image" :src="gallery.featured" :alt="gallery.title">
            <h4 class="title">
              {{ gallery.title }}

            </h4>
          </a>
        </div>
      </div>
      <div v-else>
        <h4>
          Nenašli sa žiadne fotogalérie
        </h4>
      </div>
    </infinite-scroll>
  </div>
</template>

<script>
  import InfiniteScroll from 'infinite-loading-vue3'


  export default {
    name: 'Gallery',
    components: {InfiniteScroll},
    data() {
      return {
        noResult: 'noresult',
        message: "message",
        loading: true,
        galleries: [],
        complete: false,
        chooseSeasonString: 'Choose season',
        chooseMonthsString: 'Choose month',
        months: [],
        selectedMonth: null,
        selectedSeason: null,
        filterAllowed: false,
        categories: [],
        page: 1,
        perPage: 3,
        calling: false,
        loadingClass: 'gallery-loading'
      }
    },
    computed: {
      computedGalleries() {
        let filtered = [];
        for (let i = 0; i < this.galleries.length; i++) {
          if (this.selectedMonth && this.selectedSeason) {
            if ((this.galleries[i].category && this.galleries[i].category === this.selectedSeason) &&
                (this.galleries[i].date && this.galleries[i].date === this.selectedMonth)) {
              filtered.push(this.galleries[i])
            }
            continue
          } else if (this.selectedSeason && !this.selectedMonth) {
            if (this.galleries[i].category && this.galleries[i].category === this.selectedSeason) {
              filtered.push(this.galleries[i])
            }
            continue
          } else if (this.selectedMonth && !this.selectedSeason) {
            if (this.galleries[i].date && this.galleries[i].date === this.selectedMonth) {
              filtered.push(this.galleries[i])
            }
            continue
          } else {
            filtered.push(this.galleries[i])
          }
        }
        return filtered
      }
    },
    methods: {
      changeSeason(event) {
        this.selectedSeason = event.target.value
      },
      changeMonth(event) {
        this.selectedMonth = event.target.value
      },
      async load() {
        const component = this
        if (component.complete) return
        if (component.calling) return

        component.calling = true
        component.loading = true
        try {

          const response = await fetch('/wp-admin/admin-ajax.php?action=list_galleries&_limit=1'
          + '&per_page=' + component.perPage
          + '&page=' + component.page)

          const json = await response.json();
          if (!json.length) {
            component.complete = true
          } else if (json.length < component.perPage) {
            component.galleries.push(...json);
            component.complete = true
          } else {
            component.galleries.push(...json);
          }
          component.loading = false
          component.page++;
        } catch (error) {
          console.error(error)
        }
        component.calling = false
      }
    },
    mounted() {
      this.load()
    },
    created() {
      if (ACF_FIELDS) {
        if (ACF_FIELDS.filter_allowed) {
          this.filterAllowed = ACF_FIELDS.filter_allowed
        }
        if (ACF_FIELDS.categories) {
          this.categories = ACF_FIELDS.categories
        }
        if (ACF_FIELDS.months) {
          this.months = ACF_FIELDS.months
        }
        if (ACF_FIELDS.seasonString) {
          this.chooseSeasonString = ACF_FIELDS.seasonString
        }
        if (ACF_FIELDS.monthsString) {
          this.chooseMonthsString = ACF_FIELDS.monthsString
        }
      }
      // this.callAPI()
    }
  }
</script>

<style lang="sass">

  #gallery
    position: relative
    min-height: 50vh
    padding-bottom: 200px

    .filter-wrapper
      display: flex
      flex-direction: row
      flex-wrap: wrap
      justify-content: center
      align-items: flex-start
      padding: 3rem 0
      margin: 0 auto 5rem auto

      select
        padding: 1.5rem 2rem
        -moz-appearance: none
        -webkit-appearance: none
        appearance: none
        width: 326px
        border: 1px solid #F3F2F8
        box-sizing: border-box
        box-shadow: 0px 4px 4px rgba(9, 11, 33, 0.02)
        border-radius: 12px
        position: relative
        outline: 0


      .season-filter-wrap select
        background-color: #A32035
        color: #fff
        border: 1px solid #a32035
        background-image: url('/assets/icons/theme/arrow-down-w.svg')
        background-repeat: no-repeat
        background-position: right 1em center
        background-size: 20px

      .month-filter-wrap select
        margin-left: 2rem
        background-color: #fff
        color: #000
        border: 1px solid #F3F2F8
        background-image: url('/assets/icons/theme/calendar_filter.svg')
        background-repeat: no-repeat
        background-position: right 1em center
        background-size: 20px


    .loading-wrapper
      display: none
      position: absolute
      width: 100%
      height: 400px
      background: linear-gradient(rgba(230, 100, 101, 0), #ffffff 35%)
      left: 0
      right: 0
      bottom: 0
      top: auto
      margin: 0 auto
      padding-top: 200px
      z-index: 100

    .loading-wrapper.gallery-loading
      display: block

    .masonry-with-columns
      display: flex
      flex-wrap: wrap

      div.mansonry-brick
        background: #eeeeee
        color: white
        margin: 0 1px 1px 0
        text-align: center
        flex: 1 0 auto
        overflow: hidden

        .mansory-brick-link
          height: 500px
          line-height: 500px
          display: block
          position: relative

          &:hover
            .title
              opacity: 1
              visibility: visible

          .title
            transition: .3s ease-in-out
            display: block
            opacity: 0
            visibility: hidden
            position: absolute
            left: 0
            right: 0
            top: 0
            height: 100%
            bottom: 0
            width: 100%
            color: #ffffff
            background: #A32035
            z-index: 1

        img
          width: 100%
          height: 100%
          object-fit: cover

    @for $i from 1 through 3
      div.mansonry-brick:nth-child(#{$i})
        width: (random(33) + 25) + vw

  @media only screen and (min-width: 767px) and (max-width: 1024px)
    #gallery
      .masonry-with-columns
        .filter-wrapper
          padding: 2rem 0
          display: flex
          .season-filter-wrap select,
          .month-filter-wrap select
            width: 50%
            max-width: 300px


        div.mansonry-brick
          .mansory-brick-link
            height: 400px
          .title
            line-height: 400px
            overflow: hidden
            text-overflow: ellipsis
            word-break: break-word
            white-space: nowrap
            padding: 15px
            position: static
            height: auto
            opacity: 1
            visibility: visible

    @media only screen and (min-width: 580px) and (max-width: 767px)
      #gallery
        padding-bottom: 0px

        .filter-wrapper
          padding: 2rem 0
          margin: 0 auto 2rem auto
          display: block
          text-align: center

          .season-filter-wrap select
            background-size: 15px
            display: block
            padding: 1rem 2rem
            width: 100%
            max-width: 300px
            margin: 1rem auto

          .month-filter-wrap select
            background-size: 15px
            display: block
            padding: 1rem 2rem
            width: 100%
            max-width: 300px
            margin: 1rem auto
        .masonry-with-columns
          display: flex
          flex-wrap: wrap
          div.mansonry-brick
            .mansory-brick-link
              height: 300px
            .title
              line-height: 300px
              overflow: hidden
              text-overflow: ellipsis
              word-break: break-word
              white-space: nowrap
              padding: 15px
              position: static
              height: auto
              opacity: 1
              visibility: visible

  @media only screen and (max-width: 580px)
    #gallery
      padding-bottom: 0px

      .filter-wrapper
        padding: 2rem 0
        margin: 0 auto 2rem auto
        display: block
        text-align: center

        .season-filter-wrap select
          background-size: 15px
          display: block
          padding: 1rem 2rem
          width: 100%
          max-width: 300px
          margin: 1rem auto

        .month-filter-wrap select
          background-size: 15px
          display: block
          padding: 1rem 2rem
          width: 100%
          max-width: 300px
          margin: 1rem auto

      .loading-wrapper.gallery-loading
        display: block

      .masonry-with-columns
        display: flex
        flex-wrap: wrap

        div.mansonry-brick
          width: 100% !important

          .mansory-brick-link
            height: auto
            line-height: 10px

            .title
              overflow: hidden
              text-overflow: ellipsis
              word-break: break-word
              white-space: nowrap
              padding: 15px
              position: static
              height: auto
              opacity: 1
              visibility: visible



</style>
