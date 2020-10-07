<template>
  
<div class="banner">

<v-carousel shadow height="640px" >
  <div v-for="(item,index) in videos" :key="index">

 
    <router-link  :to="'/video/'+item.id" >  
      <v-carousel-item
        :src=" 'https://i.ytimg.com/vi/' + item.videolink + '/maxresdefault.jpg'"
      >
      <div class="play-btn">
        <img class="bnr-center-play-btn" height="100" width="100" src="image/play.png" alt="" srcset="">
      </div>
      <div class="slider-title">
        <h1>{{item.title.slice(0,45)}}</h1>
        <p>{{item.description.slice(0,45)}}</p>
      </div>
      </v-carousel-item>
    </router-link>
   
     </div>
</v-carousel>



</div>


</template>

<script>
export default {
  
  data(){
    return{
      
      videos:{},
      video:{}
    }
  },
  methods:{
    getVideos(){
      axios.get('/get_all_feature_video')
      .then(response => {
        this.videos = response.data;
      })
    },
    
  },
  mounted(){
    this.getVideos();
  }

}
</script>


<style>


.slider-title{
  top: 80%;
  color: #fff;
  position: absolute;
  margin-left: 54px;
}


.v-carousel__controls{
  background: transparent!important;
}
/* .v-window-item {
    position: relative;
    top: 70px;
} */

.v-responsive__content .play-btn{
      position: absolute;
  top: 45%;
    margin: 0;
    padding: 0;
    left: 45%;
}
.v-responsive__content .content{
  position: absolute;
    top: 78%;
    margin: 0;
    padding: 0;
    left: 10%;
    color: #fff;
}
/* v-window-item */
.v-responsive__content::before {
    -webkit-box-shadow: inset 0px -90px 220px 0px #000;
    box-shadow: inset 0px -90px 220px 0px #000;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: "";
}
.play-btn i{
      font-size: 70px;
    color: #fff;
    cursor: pointer;
    opacity: 0.6;
}

.bnr-center-play-btn {
    position: relative!important;
    font-size: 10px!important;
    /* height: 100px!important;
    width: 100px!important; */
    top: 60%!important;
    left: 0%!important;
}
</style>