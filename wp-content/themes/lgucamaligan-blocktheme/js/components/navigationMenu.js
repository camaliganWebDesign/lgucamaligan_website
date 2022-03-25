import constants from '../constants.js';
import { API as apiFetcher } from '../inc/api-fetcher.js';

export default {
  template: '#navigation-menu',
  props: ['nameOfMenu'],
  data() {
    return {
      data: null,
    }
  },
  created() {
    this.getNavigationData( this.nameOfMenu );
  },
  methods: {
    async getNavigationData( menuName ){
      let fetchData = { url: constants.url.NavigationMenu + '?name=' + menuName };
      let response = await apiFetcher.get( fetchData );
      //console.log( response[this.menuName] );
      this.data = response[menuName];
    },
  }
}