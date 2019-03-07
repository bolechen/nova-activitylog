Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'nova-activitylog',
            path: '/activitylog',
            component: require('./components/Tool'),
        },
    ])
})
