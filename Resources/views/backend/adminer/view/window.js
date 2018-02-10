Ext.define('Shopware.apps.Adminer.view.Window', {
    extend: 'Enlight.app.Window',
    title: 'Adminer',
    autoShow: true,
    border: false,
    layout: 'fit',
    height: '90%',
    width: 1200,
    stateful: true,

    initComponent: function() {
        var me = this;

        var token = (typeof csrfToken == 'undefined') ? '' : csrfToken;

        me.items = [{
            xtype: 'container',
            html: '<iframe id="test" src="{url action=form}?adminerAction=' + me.action +'&__csrf_token=' + token + '"></iframe>',
            listeners: {
                'afterrender': function () {
                    this.getEl().dom.children[0].onload = function () {
                        me.setWidth(me.getWidth() + 1);
                    }
                }
            }
        }];
        me.callParent(arguments);

        me.setTitle('Adminer (' + (me.action === 'index' ? 'MySQL' : 'ElasticSearch') + ')');
    }
});
