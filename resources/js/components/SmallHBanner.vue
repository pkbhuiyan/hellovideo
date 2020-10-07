<template>
<div class="vidlist-section">
    
    <!-- category video -->
    <div class="vidlist-vid" v-for="(c,index) in category" :key="index">
        <div class="vidlist-name">
            <h3>{{c.category_name}}</h3>
        </div>
        <carousel class="horizontal-vid" :navigationEnabled="true" navigationPrevLabel="❰" navigationNextLabel="❱" :paginationEnabled="false" :perPageCustom="[[768, 3], [1024, 4]]" :autoplay=false>
            <slide v-for="(item,index) in video" :key="index"  v-if="item.category_id === c.id">
                <div class="vid-container">
                    <router-link :to="'/video/' + item.id">
                        <img :src="'https://i.ytimg.com/vi/' + item.videolink + '/maxresdefault.jpg'" :alt="item.img">
                        <span class="vidlink-overlay"></span>
                        <img class="center-play-btn" src="public/image/play.png" alt="">
                    </router-link>
                </div>
                <div class="slider-text">
                    <h5>{{item.title.slice(0,35)}}...</h5>
                </div>
            </slide>
            
 
        </carousel>
    </div>
    <!-- end category video -->
    <!-- seasons -->
    <div class="vidlist-vid" v-if="playlist">
        <div class="vidlist-name">
            <h3>Shows</h3>
        </div>
        <carousel class="horizontal-vid seasons" :navigationEnabled="true" navigationPrevLabel="❰" navigationNextLabel="❱" :paginationEnabled="false" :perPageCustom="[[768, 3], [1024, 4]]" :autoplay=false>
                <slide v-for="(item,index) in playlist" :key="index" >
                    <div class="vid-container">
                        <router-link :to="'/video/' + item.id">
                            <img :src="'https://i.ytimg.com/vi/' + item.videolink + '/maxresdefault.jpg'" :alt="item.img">
                            <span class="vidlink-overlay">
                            </span>
                             <img class="center-play-btn" src="public/image/play.png" alt="image">
                        </router-link>
                    </div>
                    <div class="slider-text">
                        <h5>{{item.title.slice(0,45)}} ...</h5>
                    </div>
                </slide>
            
 
        </carousel>
    </div>
    <!-- end seasons -->



</div>
    
</template>

<script>
export default{
     data(){
        return{
            video:{},
            category:{},
            playlist:{}
        }
    },
     
    methods:{
        get_categories(){
            axios.get('/get_category')
            .then(response => {
                this.category = response.data.slice(0,2) // get only 2 category
            })
        },
        get_videos(){
            axios.get('/get_videos')
            .then(response => {
                this.video = response.data
            })
        },
        get_playlist(){
            axios.get('/get_playlist')
            .then(response => {
                this.playlist = response.data
            })
        }
        
       
        
    },
    mounted(){
        this.get_categories();
         this.get_videos();
         this.get_playlist();
    }
}
</script>

<style>
.slider-text{
    color:#fff;
    text-align:left;
    margin-top:10px;
}
.seasons button{
    top:48%!important;
}
/* overlay */
.vid-container{
    position: relative;
    cursor: pointer;
    margin-right: 4px;
}
.vidlink-overlay{
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #000;
}
.vid-container:hover .vidlink-overlay {
  opacity: 0.5!important;
}
.vid-container:hover .center-play-btn{
    opacity: 0.8;
}
.center-play-btn {
        position: absolute!important;
    font-size: 10px!important;
    height: 50px!important;
    top: 36%!important;
    left: 42%;
    width: 50px!important;
    opacity: 0;
}

#container {
  padding: 0 60px;
}

.horizontal-vid .VueCarousel-slide {
  position: relative;
  color: #fff;
  font-family: Arial;
  font-size: 24px;
  text-align: center;
  min-height: 100px;
}

.horizontal-vid .VueCarousel-navigation button,.vertical-vid .VueCarousel-navigation button {
    font-size: 25px;
    font-weight: bold;
    width: 50px;
    /* border: 1px solid #ddd!important; */
    height: 50px;
    border-radius: 50px;
    color: #fff;
}
.horizontal-vid .VueCarousel-navigation button:hover,.vertical-vid .VueCarousel-navigation button:hover{
    /* background: #fff; */
    /* color:#fff; */
}

.label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.horizontal-vid .VueCarousel-navigation-prev{
    left: 46px!important;
}
.horizontal-vid .VueCarousel-navigation-next{
    right:46px!important;
}
.VueCarousel-navigation-button{
    /* top: 62%!important; */
}
.horizontal-vid .VueCarousel-slide{
    width: 100%;
    padding: 2px;
    margin-top: 50px;
    /* margin-bottom: 50px; */
}
.horizontal-vid .VueCarousel-slide img{
    width: 100%;
}
.horizontal-vid .VueCarousel-inner {
    margin-left: 50px;
    margin-right: 50px;
}
.vidlist-name{
margin-left: 50px;
    position: relative;
    top: 50px;
    margin-bottom: 10px;
}
</style>
