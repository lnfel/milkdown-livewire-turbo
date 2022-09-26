/**
 * Import packages here and/or initiate one time
 */

require('./bootstrap');

/**
 * Import milkdown via require method
 * and assign to window context to we can use it anywhere anytime
 */
window.milkdown = require('@milkdown/core')
window.preset = require('@milkdown/preset-commonmark')
window.theme = require('@milkdown/theme-nord')
window.pluginMenu = require('@milkdown/plugin-menu')
window.milkdownUtils = require('@milkdown/utils')

const turbolinks = require('turbolinks')
turbolinks.start()
console.log('turbolinks: ', turbolinks)

// console.log(milkdown)

// Sample initialization of milkdown
// milkdown.Editor.make().use(theme.nord).use(preset.commonmark).use(pluginMenu.menu).create();
