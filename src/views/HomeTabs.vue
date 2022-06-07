<template>
  <div id="homeTabs">
    <tabs cache-lifetime="10"
          :options="{ useUrlFragment: false, defaultTabHash: 'homeTab0' }"
          @clicked="tabClicked"
          @changed="tabChanged">
      <tab v-for="(tab, index) in tabs"
           :id="'homeTab'+index"
           :name="tab.tab_title">
        <AjaxPage :url="tab.tab_content" v-show="getActive === ('#homeTab'+index)" :active="getActive === ('#homeTab'+index)" />
      </tab>
    </tabs>
  </div>
</template>

<script>
  import AjaxPage from "../components/global/AjaxPage";

  export default {
    name: 'HomeTabs',
    components: { AjaxPage },
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
      this.tabs = ACF_FIELDS.tabs
      if (!this.tabs.length) {
        return;
      }
    }
  }
</script>

<style lang="sass">

  #homeTabs
    margin: 5rem 0

    .tabs-component-tabs
      width: auto
      max-width: 850px
      text-align: center
      display: flex
      flex-direction: row
      flex-wrap: wrap
      justify-content: flex-start
      align-items: center
      margin-bottom: 6rem
      a
        padding: 2rem 6rem
        color: #696969
        font-size: 22px
        line-height: 24px
        position: relative
        transition: .3s ease-in-out
        border-bottom: 1px solid #696969
        &:first-child
          padding-left: 2rem
        &:hover
          color: #A22035
        &:hover::after
          content: ''
          display: block
          position: absolute
          bottom: -1px
          width: 100%
          left: -1rem
          right: -1rem
          margin: 0 auto
          height: 1px
          background-color: #A22035
        &.is-active
          color: #fff
        &.is-active::after
          content: ''
          display: block
          position: absolute
          bottom: -1px
          width: 100%
          left: -1rem
          right: -1rem
          margin: 0 auto
          height: 1px
          background-color: #A22035


  @media only screen and (min-width: 1024px) and (max-width: 1350px)
    #homeTabs
      .tabs-component-tabs
        li
          a
            padding: 1rem 4rem !important
            font-size: 21px
            line-height: 22px
  @media screen and (min-width: 580px) and (max-width: 1024px)
    #homeTabs
      margin: 0

      .tabs-component-tabs
        margin: 4rem auto
        text-align: center
        width: 100%
        align-items: center
        justify-content: center
        li
          a
            display: block
            width: 100%
            margin-bottom: .5rem
            padding: 1rem 3rem !important
            font-size: 18px
            line-height: 22px
            &:first-child
              padding-left: 1rem
  @media screen and (max-width: 580px)
    #homeTabs
      margin: 0

      .tabs-component-tabs
        flex-direction: column
        margin-bottom: 3rem
        li
          width: 100%
        a
          display: block
          width: 100%
          margin-bottom: .5rem
          padding: 1rem
          font-size: 18px
          line-height: 22px
          &:first-child
            padding-left: 1rem

</style>
