Ext.define('Shopware.apps.Adminer', {
    extend:'Enlight.app.SubApplication',
    name:'Shopware.apps.Adminer',
    bulkLoad: true,
    loadPath:'{url action=load}',

    controllers:[],
    models:[],
    stores:[],
    views:[
        'Window'
    ],

    launch: function() {
        return Ext.create('Shopware.apps.Adminer.view.Window');
    }
});
