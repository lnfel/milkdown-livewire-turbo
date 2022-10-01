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
import * as pluginPrism from '@milkdown/plugin-prism'
import * as pluginMenu from '@milkdown/plugin-menu'
const plugins = [pluginMenu, pluginPrism]
window.milkdownPlugin = {}

plugins.forEach((plugin) => {
    Object.entries(plugin).forEach(([name, exported]) => {
        milkdownPlugin[name] = exported
    })
})

console.log('milkdownPlugin: ', milkdownPlugin)
window.milkdownUtils = require('@milkdown/utils')

const turbolinks = require('turbolinks')
turbolinks.start()
console.log('turbolinks: ', turbolinks)

// console.log(milkdown)

// Sample initialization of milkdown
// milkdown.Editor.make().use(theme.nord).use(preset.commonmark).use(pluginMenu.menu).create();
