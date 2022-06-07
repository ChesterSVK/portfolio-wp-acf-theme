
export default {
  getPageContentProperty (key) {
    // eslint-disable-next-line no-undef
    return WP_CONFIG_VAR && WP_CONFIG_VAR.content ? WP_CONFIG_VAR.content[key] : null
  },
  getImageUrlProperty (key) {
    const image = this.getPageContentProperty(key)
    return image && image.url ? image.url : '#'
  }
}
