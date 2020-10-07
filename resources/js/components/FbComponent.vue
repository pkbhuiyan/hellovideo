<template>
    <div class="fb-plugin">
        <fb-comment :url='urlID' />
    </div>  
</template>

<script>

export default {
    props:['urlID']
}
</script>