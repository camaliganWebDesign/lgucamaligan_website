
import constants from './constants.js';
import navigationMenu from './components/navigationMenu.js';

const lguHeader = Vue.createApp({
    data() {
        return {
            govPhLink: 'https://www.gov.ph',
            isLoggedIn: false,
            accessibilityIcon: '',
            loggedInUserData: {},
        }
    },
    components: {
       'navigation-menu': navigationMenu,
    },
    created() {
        this.checkIfUserLoggedIn();
        this.getAssets();
    },
    methods: {
        /*async getNavigationData(){
          let fetchData = { url: constants.url.NavigationMenu };
          let response = await apiFetcher.get( fetchData );
          //console.log( response[this.menuName] );
          //this.data = response;
          console.log( this.menuName );
        },*/
        checkIfUserLoggedIn() {
            this.isLoggedIn = document.body.classList.contains( 'logged-in' );
            console.log( this.isLoggedIn );
        },
        getAssets() {
            if( this.isLoggedIn ) {
                this.accessibilityIcon = '';
            } else {
                // todo - create login page and user create page
                this.accessibilityIcon = '';
            }
            this.loggedInUserData.assets = constants.assets.loggedIn;
        },
    }

}).mount('#lguHeader')

/*const lguContent = Vue.createApp({
    data() {
        return {

        }
    },
    components: {},
    methods: {

    }

}).mount('#lguContent');*/

const lguFooter = Vue.createApp({
    data() {
        return {

        }
    },
    components: {},
    methods: {

    }

}).mount('#lguFooter');

if( document.getElementById('lguWidgetArea') ) {
    const lguWidgetArea = Vue.createApp({
        data() {
            return {

            }
        },
        components: {},
        methods: {

        }

    }).mount('#lguWidgetArea');
}

/*const Application = Vue.createApp({
    data() {
        return {
            navigationMenus: [],
        }
    },
    components: {
        'site-header': siteHeader,
        //'site-content',
        //'site-page-widget-area'
        //'site-footer'
    },
    methods: {
        async getNavigationData(){
          let fetchData = { url: constants.url.NavigationMenu };
          let response = await apiFetcher.get( fetchData );
          //console.log( response[this.menuName] );
          this.navigationMenus = response;
        }
    }
}).mount('#lguMainContent')*/