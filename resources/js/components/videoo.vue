<template>
    <vue-core-video-player src="/videos/VID_20230317_192526.mp4"></vue-core-video-player>
</template>

<script>
    import {VueCoreVideoPlayer} from 'vue-core-video-player';
    Vue.use(VueCoreVideoPlayer)
    export default {
        components: {
            VueCoreVideoPlayer
        }
    }
</script>
