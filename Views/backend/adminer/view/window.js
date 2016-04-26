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

        me.items = [{
            xtype: 'container',
            html: '<iframe id="test" src="{url action=form}"></iframe>',
            listeners: {
                'afterrender': function () {
                    this.getEl().dom.children[0].onload = function () {
                        me.setWidth(me.getWidth() + 1);
                    }
                }
            }
        }];
        me.callParent(arguments);
    }
});