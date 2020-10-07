<template>
<v-player>
    <div class="plyr__video-embed">
        <iframe width="100%" height="515" :src='source' frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</v-player>
            

</template>

<script>
import { VuePlyr  } from 'vue-plyr'
import 'vue-plyr/dist/vue-plyr.css'
export default {
    components: {
        'vPlayer':VuePlyr,
    },
    props:['source']
}
</script>

<style>
/* 


video player + video
https://codepen.io/Chuloo/pen/aqgLMa?editors=1010

*/
</style>
