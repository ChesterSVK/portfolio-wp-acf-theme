<template>
  <div id="aboutTabs">
    <tabs cache-lifetime="10"
          :options="{ useUrlFragment: false, defaultTabHash: 'homeTab0' }"
          @clicked="tabClicked"
          @changed="tabChanged">
      <tab v-for="(tab, index) in tabs"
           :id="'aboutTab'+index"
           :name="tab.text">
        <AjaxPage :url="tab.content_url" v-show="getActive === ('#aboutTab'+index)" :active="getActive === ('#aboutTab'+index)" />
      </tab>
    </tabs>
  </div>
</template>

<script>
  import AjaxPage from "../components/global/AjaxPage";

  export default {
    name: 'AboutTabs',
    components: {AjaxPage},
    data() {
      return {
        tabs: [],
        active: 'none'
      }
    },
    methods: {
      tabClicked(selectedTab) {
      },
      tabChanged(selectedTab) {
        this.active = selectedTab.tab.hash
      }
    },
    computed: {
      getActive() {
        return this.active
      }
    },
    created() {
      /* eslint no-undef: 0 */
      // Todo fallback
      if (!ACF_FIELDS) return
      if (!ACF_FIELDS.tabs) return

      this.tabs = ACF_FIELDS.tabs
      if (!this.tabs.length) {
        return;
      }
    }
  }
</script>

<style lang="sass">

  #aboutTabs
    margin: 5rem 0
    .tabs-component
      display: flex
      flex-direction: row
      flex-wrap: wrap
      justify-content: space-evenly
      align-items: flex-start

      .tabs-component-tabs
        min-height: 500px
        margin-left: -4rem
        margin-right: -3rem
        flex: 1 0 30%
        background-color: #A32035
        background-image: url("/assets/img/about-bg.svg")
        background-position: left 15% top 0
        background-repeat: repeat-y
        background-size: auto
        border-radius: 15px
        padding: 4rem 0 4rem 4rem
        border-left: 7px solid #A32035
        .tabs-component-tab
          &.is-active a
            background-color:  #000000
          &:hover a
            background-color:  #000000
          a
            font-size: 24px
            line-height: 28px
            display: block
            padding: 1rem 2rem
            margin-right: -5px
            transition: .3s ease-in-out
            color: #fff
      .tabs-component-panels
        flex: 1 0 70%
        .tabs-component-panel
          outline: none !important
        .ajaxPage
          outline: none !important
          margin: 0
          margin-left: 150px
          padding: 2rem 0
          p
            max-width: 800px
            margin: 1em auto

  @media only screen and (min-width: 1024px) and (max-width: 1350px)
    #aboutTabs
      .tabs-component
        .tabs-component-tabs
          margin-left: -4rem
          margin-right: -5rem
          flex: 1 0 25%
          padding-left: 2rem
          .tabs-component-tab a
            font-size: 22px
        .tabs-component-panels
          flex: 1 0 75%


  @media screen and (min-width: 767px) and (max-width: 1024px)
    #aboutTabs
      margin: 0
      .tabs-component
        .tabs-component-tabs
          min-height: 400px
          flex: 1 0 30%
          width: 30%
          margin-right: 3rem

        .tabs-component-panels
          flex: 1 0 70%
          width: 70%
          padding: 0 15px
          .ajaxPage
            margin: 0
            padding: 2rem 15px
  @media screen and (min-width: 580px) and (max-width: 767px)
    #aboutTabs
      margin: 0
      .tabs-component
        .tabs-component-tabs
          min-height: 300px
          margin: 0 !important
          flex: 1 0 20%
          padding: 0
          border-radius: 0
          width: 20%

          .tabs-component-tab
            a
              text-align: center
              padding: .5rem
              margin: 0
              font-size: 14px
              line-height: 18px
          &:hover a
            margin: 0
        .tabs-component-panels
          flex: 1 0 80%
          width: 80%
          padding: 0 15px
          .ajaxPage
            margin: 0
            padding: 2rem 15px


  @media screen and (max-width: 580px)
    #aboutTabs
      margin: 0
      .tabs-component
        flex-direction: column
        .tabs-component-tabs
          min-height: 200px
          margin-left: 0
          margin-right: 0
          flex: 1 0 100%
          padding: 15px
          border-radius: 0
          width: 100%
          .tabs-component-tab
            a
              text-align: center
              padding: 1rem
              margin: 0
              font-size: 16px
              line-height: 20px
          &:hover a
            margin: 0
        .tabs-component-panels
          flex: 1 0 100%
          width: 100%
          padding: 0 15px
          .ajaxPage
            margin: 0
            padding: 2rem 0

</style>
