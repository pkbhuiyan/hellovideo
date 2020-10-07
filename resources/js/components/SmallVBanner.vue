<template>
<div class="vidlist-section vBan">
    
    <div class="vidlist-vid " v-for="(i,index) in 2" :key="index"> 
    <div class="vertical">
        <h3>Latest Release</h3>
    </div>
    <div class="vidlist-vid">
        <carousel class="vertical-vid" :navigationEnabled="true" navigationPrevLabel="❰" navigationNextLabel="❱" :paginationEnabled="false" :perPageCustom="[[768, 3], [1024, 6]]" :autoplay=false>

        <slide v-for="(n,index) in images" :key="index">
            <div class="vid-container">
                <img :src="'image/'+ n.img " alt="">
                <!-- <img v-else src="image/testv4.jpg" alt=""> -->
                <span class="vidlink-overlay">
                    
                </span>
                <img class="center-play-btn" src="image/play.png" alt="image">
            </div>
            <div class="slider-text">
                <h5> {{n.text}}</h5>
            </div>
            <!-- <div v-else class="slider-text">
                <h5>TVF Tripling</h5>
            </div> -->
        </slide>
        
    </carousel>
    </div>
</div>


</div>
    
</template>

<script>

export default{
    data(){
        return{
            images:[
                {img:'test3v.jpg',text:'TVF Bachelors'},
                {img:'testv4.jpg',text:'TVF Tripling'},
                {img:'vertical1.jpg',text:'Barely Speaking'},
                {img:'vertical2.jpg',text:'Chai Sutta Chronicles'},
                {img:'vertical3.jpg',text:'Pitchers'},
                {img:'vertical4.jpg',text:'Inmates'},
                {img:'vertical5.jpg',text:'Fathers'},
            ]
        }
    }
}

</script>







<style>
.vBan{
    /* margin-top:82px; */
}
/* overlay */
.vid-container{
    position: relative;
    cursor: pointer;
}
.vertical-vid .VueCarousel-slide {
    margin-top: 30px!important;
    margin-bottom: 30px!important;
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
  opacity: 0.5;
}
.center-play-btn {
    position: relative;
    font-size: 50px;
    top: 36%;
}







#container {
  padding: 0 60px;
}

.vertical-vid .VueCarousel-slide {
  position: relative;
  color: #fff;
  font-family: Arial;
  font-size: 24px;
  text-align: center;
  min-height: 100px;
}

.vertical-vid .VueCarousel-navigation button {
    font-size: 25px;
    font-weight: bold;
    width: 50px;
    /* border: 1px solid #ddd!important; */
    height: 50px;
    border-radius: 50px;
}
.vertical-vid .VueCarousel-navigation button:hover{
    /* background: #000; */
    /* opacity: 0.3; */
}

.label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.vertical-vid .VueCarousel-navigation-prev{
    left: 46px!important;
}
.vertical-vid .VueCarousel-navigation-next{
    right:46px!important;
}
.vertical-vid .VueCarousel-slide{
    width: 100%;
    padding: 2px;
    margin-top: 50px;
    margin-bottom: 50px;
}
.vertical-vid .VueCarousel-slide img{
    width: 100%;
}
.vertical-vid .VueCarousel-inner {
    margin-left: 50px;
    margin-right: 50px;
}
.vertical{
margin-left: 50px;
    position: relative;
    top: 36px;
    margin-bottom: 14px;
}
</style>
