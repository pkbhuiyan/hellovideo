<template>
    <div class="content-wrapper wtch-list">
        <div class="tab-list">
            <div class="container">
                <h2>My Collection</h2>
            </div>
        </div>
        <div class="container row">
                <div v-if="!videos" class="watchlist1">
                    <h1>You don't have any bookmarked video.</h1>
                    <router-link to="/">
                        <button class="btn btn-success">Browse Videos</button>
                    </router-link>
                </div>
                <div v-else class="card watchlist col-md-3" style="width: 18rem;" v-for="(v,index) in videos" :key="index">
                    <router-link :to="'/video/' + v.id">
                        <img class="card-img-top" :src="'https://i.ytimg.com/vi/' + v.videolink + '/maxresdefault.jpg'" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{v.title}}</p>
                        </div>
                    </router-link>

                    <div class="overlay-item">
                        <img src="image/pin5.png" alt="remove bookmark" title="remove bookmark" @click="remove_bookmark(v.id)">
                    </div>
                </div>

            
            
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return{
            videos:'',
            hello:''
        }
    },
    methods:{
        get_bookmark(){
            axios.get('/get_bookmarked_vid')
            .then(response => {
                
                    this.videos = response.data
                
                
            })
            .catch(error => {
                console.log(error);
            });
        },
        remove_bookmark(id){
             axios.delete(`/bookmarks/${id}`)
                .then(response=>{
                    console.log(Object.keys(this.videos).length );
                
                if(Object.keys(this.videos).length === 1){
                    this.videos = ''
                    this.hello = "hello world";
                }else{
                    this.get_bookmark()
                }


                })
                .catch(error => {
                    console.log(error);
                })   
        }
    },
    mounted(){
        this.get_bookmark();
    }

}
</script>

<style>

.container-fluid{
    position: relative!important;
    top: 74px!important;
}
.tab-list {
    background: #181a1d!important;
    padding: 20px 0 0 20px;
}

.card-body{
    /* padding: 5px; */
    height: auto;
}
.card{
    padding: 0!important;
    margin: 4px;
    

}
.wtch-list{
    background: #151818!important;
}
.watchlist{
    background: #000;
        border: 1px solid;
        margin-bottom:30px; 
}
.watchlist1 {
    margin-bottom: 30px;
    text-align: center;
    width: 100%;
    margin-top: 30px;
    height: 300px;
}
.overlay-item {
    position: absolute;
    left: 83%;
    padding: 5px;
    background: #fff;
    border-radius: 50%;
}
.overlay-item img {
    height: 30px;
}
</style>
