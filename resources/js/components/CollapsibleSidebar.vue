<template>
    <div class="collapsible-sidebar"
         :class="{
             'is-collapsed': isCollapsed,
             'is-hover-prevented': isHoverPrevented
         }"
    >
        <collapsible-sidebar-trigger
            :is-collapsed="isCollapsed"
            :is-shy="shyTrigger"
            @click.native="setIsCollapsed(!isCollapsed)"
        ></collapsible-sidebar-trigger>

        <div class="collapsible-sidebar-content-wrapper">
            <div class="collapsible-sidebar-content w-sidebar px-6">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import * as store from 'store2';
    import CollapsibleSidebarTrigger from './CollapsibleSidebarTrigger';

    export default {
        components: {
            CollapsibleSidebarTrigger,
        },

        props: {
            persist: {
                type: Boolean,
                default: false,
            },
            shyTrigger: {
                type: Boolean,
                default: false,
            },
        },

        data: function () {
            return {
                isCollapsed: false,
                isHoverPrevented: false,
                storage: null,
            };
        },

        mounted: function () {
            this.storage = store.namespace('collapsibleSidebar');

            if (!this.persist) {
                this.storage.clear();
                return;
            }

            this.isCollapsed = !!this.storage.get('isCollapsed');
        },

        methods: {
            setIsCollapsed: function (isCollapsed) {
                this.isCollapsed = isCollapsed;

                if (this.persist) {
                    this.storage.set('isCollapsed', isCollapsed);
                }

                if (isCollapsed) {
                    this.isHoverPrevented = true;
                    setTimeout(() => this.isHoverPrevented = false, 400);
                }
            },
        },
    };
</script>
