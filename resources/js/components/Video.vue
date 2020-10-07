<template>
<!-- <vframe :source="current"></vframe> -->
<div>
<div class="content-wrapper">
    <div class="wrapper container">
        <div class="top-content">
        <vframe :source="current"></vframe>
        
        <div class="details row">
            <div class="videos col-md-8 display-cell">
                <div class="desc column">
                    <h3><b>{{welcome.title}}</b></h3>
                    <p>{{welcome.description}}</p>
                </div>
                
            </div>
            <div class="share col-md-4">
                <ul>
                    <li>
                        <button 
                            type="submit"
                            class="btn shr-btn"
                            :class="{btn_unlike: !liked, btn_like: liked}"
                            @click="toggleLike" 
                        >
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            <br>
                            <span v-text="text"></span>
                        </button> 
                    </li>
                    <li>
                        <button 
                        type="submit"
                        class="btn shr-btn"
                        :class="{btn_unlike: !bk_liked, btn_like: bk_liked}"
                        @click="toggleBookmark"
                        >
                            <i class="material-icons">bookmark</i> <br>
                            <span v-text="bText"></span>
                        </button>   
                    </li>
                    
                </ul>
                <div>
                    <social-sharing :url="current"
                      :title="welcome.title"
                      :description="welcome.description"
                      :quote="welcome.title"
                      
                      inline-template>
                        <div class="social-icon">
                            <small>Share with:</small> 
                            <network network="facebook">
                                <i class="fa fa-facebook"></i> 
                            </network>
                            <network network="twitter">
                                <i class="fa fa-twitter"></i> 
                            </network>
                        </div>
                    </social-sharing>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>


<div class="content-wrapper gray-back">
    <div class="wrapper container">
        <div class="bottom-content">
            <div class="row">
                <div class="col-md-12 con">
                    <div class="fb col-md-8"> 
                        <div class="fb-plugin">
                            <div data-colorscheme="light" data-href="http://127.0.0.1:8000/#/" data-numposts="3" data-order-by="social" class="fb-comments"></div>
                            <!-- <fb-comment :url='' /> -->
                        </div> 
                    </div>
                    <div class="playlist-vid col-md-4">
                        <div class="title">
                            Playlist Video
                        </div>
                        
                        <div  v-for="(pl,index) in playlist" :key="index" @click="changeCurrent(index)">
                            <router-link  class="vid-list" :to="'/video/' + pl.video_id" >
                                <div class="thumb-list col-sm-5">
                                    <img :src="'https://i.ytimg.com/vi/' + pl.videolink+ '/hqdefault.jpg'" alt="new image">
                                </div>
                                <div class="text col-sm-7">
                                    <p> <b> {{pl.title.substr(0,40)}} ... </b> </p>
                                    <small> {{pl.likes > 1 ? pl.likes+' Likes' : pl.likes+' Like'}} </small>
                                </div>
                            </router-link>
                        </div>
                        <div v-if="playlist === '' ">
                            <router-link  class="vid-list" :to="'/video/' + this.itemId" >
                                <div class="thumb-list col-sm-4">
                                    <img :src="'https://i.ytimg.com/vi/' + welcome.videolink+ '/hqdefault.jpg'" alt="new image">
                                </div>
                                <div class="text col-sm-8">
                                    <p> <b> {{welcome.title}} ... </b> </p>
                                    <small>122 Likes</small>
                                </div>
                            </router-link>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</template>

<script>


import Vframe from './Vframe.vue';

export default {
    components: {
        'vframe': Vframe,
    },
    
    data(){
        return{
            welcome:{},
            itemId: this.$route.params.id,
            playlist:'',
            playlists: '',
            current: '',
            liked:false,
            bk_liked:false,
            text:'Like',
            bText:'Bookmark',
            submitted:'',
            likes:'',
            fbPageID: ''
        }
    },
    methods:{
        toggleLike: function()
        {
            if(this.liked) {
                this.unlikeVideo()
            } else {
                this.likeVideo()
            }
        },
        toggleBookmark: function()
        {
             if(this.bk_liked){
                this.unbookmarkVideo()
            }else{
                this.bookmarkVideo()
            }
        },

        likeVideo: function() {
            if(this.$gate.isLogin()){
             axios.post('/likes',{'Video':this.itemId})
                .then(response => {
                    this.liked = true;
                    this.text = 'Liked';
                })
                .catch(error => {
                    console.log(error);
                })   
            }else{
                alert("please login to like the video");
            }
        },
        unlikeVideo: function() {
                axios.delete('/likes/'+this.itemId)
                .then(response => {
                    this.liked = false;
                    this.text = 'Like';
                })
        },
        bookmarkVideo: function() {
            if(this.$gate.isLogin()){
            axios.post('/bookmarks',{'Video':this.itemId})
                .then(response => {
                    this.bk_liked = true;
                    this.bText = 'Bookmarked';
                })
                .catch(error => {
                    console.log(error);
                })   
            }else{
                alert("please login to bookmark the video");
            }
        },
        unbookmarkVideo: function() {
            axios.delete('/bookmarks/'+this.itemId)
            .then(response=>{
                this.bk_liked = false;
                this.bText = 'Bookmark';
            })
            .catch(error => {
                console.log(error);
            })   
        },
        // check whether use is liked the video
        is_liked_by_user(){
            if(this.$gate.isLogin()){
                axios.get('/likes/'+this.itemId)
                .then(response => {
                    if(isNaN(response.data)){
                        this.liked = true;
                        this.text = 'Liked'
                    }else{
                        this.liked = false;
                        this.text = 'Like'
                    }
                })
                .catch(error => {
                    console.log(error);
                })  
            }     
        },
        is_bookmark_by_user(){
            if(this.$gate.isLogin()){
            axios.get('/bookmarks/'+this.itemId)
            .then(response => {
                if(isNaN(response.data)){
                    this.bk_liked = true;
                    this.bText = 'Bookmarked'
                }else{
                    this.bk_liked = false;
                    this.bText = 'Bookmark'
                }
            })
            .catch(error => {
                console.log(error);
            })
            }
        },
        // get single video by id
        get_video_by_id(){
        axios.get('/get_video_by_id/'+this.itemId)
        .then(response => {
            this.welcome = response.data
            this.current = "https://www.youtube.com/embed/"+this.welcome.videolink +"?mode=opaque&amp;rel=0&amp;autohide=1&amp;showinfo=0&amp;wmode=transparent" 
            this.fbPageID = 'http://127.0.0.1:8000/#/video/'+this.itemId;
        })
        .catch(error => {
            console.log(error); 
        })
        },
        get_all_playlist_video(){
            axios.get('/get_all_playlist_video/'+this.itemId)
            .then(response => {
                this.playlist = response.data
            })
        },
        changeCurrent(ind){
            this.welcome = this.playlist[ind];
            this.itemId = this.welcome.video_id;
            this.is_liked_by_user();
            this.is_bookmark_by_user();
            this.current = "https://www.youtube.com/embed/"+this.playlist[ind].videolink+"?autoplay=0&showinfo=0&modestbranding=0&wmode=transparent&controls=0&color=white&rel=0&enablejsapi=0&playsinline=0&&version=3&theme=light&autohide=1&egm=0&showsearch=0";
            this.fbPageID = 'http://127.0.0.1:8000/#/video/'+this.playlist[ind];
            location.reload(true);
        },
        get_video_like_count($id){
            axios.get('/get_video_like_count/'+$id)
            .then(response => {
               return response.data;  
            })
        }, 
    },
    mounted(){
         this.get_video_by_id()
         this.get_all_playlist_video()
         this.is_liked_by_user()
         this.is_bookmark_by_user() 
    },

}
</script>


/*
    Component Styles
*/


<style>
/* facebook */

._5mdd{
    color: #fff;
}
/* end */
.shr-btn{
    padding: 0!important;
}
.gray-back {
    background: #151518!important;
}
.vid-list > .thumb-list img{
    width: 100px;
    height: 80px;
}
.vid-list{
    width: 100%;
    margin-top: 20px;
    display: inline-flex;
}
.bottom-content{
    margin-top: 20px;
    margin-bottom: 80px;
}
.playlist-vid.col-md-4 {
    border: 1px solid;
    padding: 0!important;
    height: 100%;
}
.con{
    display: inline-flex;
}
@media (max-width: 1400px) and (min-width: 1024px){
.thumb img{
    width:80px;
    height:80px;
    border-radius: 50%;
}
.desc{
        width: calc(100% - 100px);
        
}
}

.details h3,.details h4,.details p{
    color:#fff;
}

.btn:focus{
    box-shadow: none;
}
.share,button span {
    margin-top: 25px;
    color:#fff;
}
.share ul li i {
    border: 1px solid #ddd;
    width: 45px;
    height: 45px;
    font-size: 20px;
    color:#fff;
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
}
.share ul li i:hover,.btn_like i{
    color:#4ea7f2!important;
    border: 1px solid #4ea7f2!important;
}
.share ul li {
    list-style: none;
    display: inline-block;
}

.display-cell{
    display: table-cell;
    vertical-align: middle;
    float: none;
    margin-top:20px; 
}
.container{
    padding: 0!important;
}

.thumb img{
    width:80px;
    height:80px;
    border-radius: 50%;
}
.title{
    border-bottom: 0.1rem solid;
    letter-spacing: .02em!important;
    padding: 10px;
}

.thumb{
    display: inline-block;
    border-radius: 50%;
    vertical-align: top;
    margin-right: 10px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
.desc{
    display: inline-block;
    text-align: justify;
}
.row{
    margin-left:0!important;
    margin-right: 0!important; 
}
.plyr{
    width: 900px;
}
ul li:first-child{
    margin-right: 5px;
}
.share ul li:nth-child(2){
    margin-left: 5px;
}
.share ul li:nth-child(3) {
    margin-left: 9px;
}
@media (min-width:1200px) {
    .plyr{
        left: 12.5%;
    }
}

.social-icon i:hover {
    color: #74b9ff;
}

.social-icon i {
    padding: 14px 11px;
    border-radius: 40%;
    cursor: pointer;
}
.fb{
    background: #fff;
    margin-right: 10px;
}

</style>


