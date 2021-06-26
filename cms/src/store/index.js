import Vue from 'vue'
import Vuex from 'vuex'
import app from './modules/app'
import user from './modules/user'
import permission from './modules/permission'
import tagsViews from './modules/tagsViews'
import theme from './modules/theme'
import getters from './getters'
import chat from './modules/chat'
import setting from './modules/setting'

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    app,
    user,
    permission,
    tagsViews,
    theme,
    chat,
    setting,
  },
  getters
})

export default store
