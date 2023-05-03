import { createStore } from "vuex";

const store = createStore({
    state(){
        return {
            isLogin: false,
            authToken: null,
        }
    },
    mutations: {
        login(state,payload) {

        },
        logout(state){

        }
    },
    getters: {
        auth(state) {
            return state
        }
    }

});




export default store;
