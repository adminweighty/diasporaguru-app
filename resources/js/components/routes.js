const HomeList = () => import('./list.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const CompanyRateList = () => import('./list.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const CompanyRateCreate = () => import('./addRate.vue' /* webpackChunkName: "resource/js/components/category/add" */)
const CompanyRateEdit = () => import('./editRate.vue' /* webpackChunkName: "resource/js/components/category/edit" */)
const ChangePassword = () => import('./changePassword.vue' /* webpackChunkName: "resource/js/components/category/edit" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeList
    },
    {
        name: 'companyRateList',
        path: '/companyRate',
        component: CompanyRateList
    },
    {
        name: 'companyRateEdit',
        path: '/companyRate/:id/edit',
        component: CompanyRateEdit
    },
    {
        name: 'companyRateAdd',
        path: '/companyRate/add',
        component: CompanyRateCreate
    },
    {
        name: 'changePassword',
        path: '/changePassword',
        component: ChangePassword
    }
]
