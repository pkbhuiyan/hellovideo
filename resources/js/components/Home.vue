<template>
<div class="content-wrapper">
    <div>
        <banner></banner>
        <div class="home-body">
            <s-hbanner></s-hbanner>
        </div>
        
        
    </div>
</div>
</template>

<script>

import Banner from './Banner.vue';
import SmallHBanner from './SmallHBanner.vue';
import SmallVBanner from './SmallVBanner.vue';



export default {
    components:{
        'banner': Banner,
        'sHbanner': SmallHBanner,
        'sVbanner': SmallVBanner,
    },
    
   



}

</script>

<style>
.home-body{
    background: #151518;
}
</style>
