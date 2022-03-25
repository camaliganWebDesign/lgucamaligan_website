export default {
    api: {
        NavigationMenu: 'wp-json/custom-routes/wp-menus',
    },
    assets: {
        // referenced from the dir location of main.js
        gobPhSeal: lguLocalizedVars.site.themeUrl + '../assets/govph-official-seal.svg',
        loggedIn: {
            iconNew:             lguLocalizedVars.site.themeUrl + '/assets/page-admin/btn-new.svg',
            iconAllPosts:        lguLocalizedVars.site.themeUrl + '../assets/page-admin/btn-all-posts.svg',
            iconEditUserPage:    lguLocalizedVars.site.themeUrl + '../assets/page-admin/btn-edit-userpage.svg',
            iconProfileSettings: lguLocalizedVars.site.themeUrl + '../assets/page-admin/btn-profile.svg',
            iconLogout:          lguLocalizedVars.site.themeUrl + '../assets/page-admin/btn-logout.svg',
        },
    }
};