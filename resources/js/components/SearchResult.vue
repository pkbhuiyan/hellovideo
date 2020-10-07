<template>
    <!-- search overlay -->
    <div id="myOverlay" class="overlay">
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
        <div class="overlay-content">
            <form>
               <span class="search-result"> <i class="fa fa-search"></i><input type="text" placeholder="Search.." name="search"></span>
                
            
            </form>
            <div class="content-result">
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end overlay -->
</template>

<script>

export default {
    data(){
        return{
            image:[
                {id:1,img:'image/test1.jpg',heading:"Test Heading 1"},
                {id:2,img:'image/test2.png',heading:"Test Heading 2"},
                {id:3,img:'image/test1.jpg',heading:"Test Heading 3"},
                {id:4,img:'image/test2.png',heading:"Test Heading 4"},
                {id:5,img:'image/test1.jpg',heading:"Test Heading 5"},
                {id:6,img:'image/test2.png',heading:"Test Heading 6"}
            ]
        }
    }
}
</script>

<style>

</style>
