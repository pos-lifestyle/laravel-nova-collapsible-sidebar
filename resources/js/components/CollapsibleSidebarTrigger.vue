<template>
    <div class="collapsible-sidebar-trigger" :class="{'is-shy': isShy}">
        <i class="fa fa-bars"></i>
        <i v-if="!isCollapsed" class="fa fa-chevron-left"></i>
        <i v-if="isCollapsed" class="fa fa-thumb-tack"></i>
    </div>
</template>

<script>
    export default {
        props: {
            isCollapsed: {
                type: Boolean,
                default: false,
            },
            isShy: {
                type: Boolean,
                default: false,
            },
        },
    };
</script>
