<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Upload Videos</div>

                    <div class="card-body">
                        <form>
                           
                            <div class="form-group">
                                <label for="formGroupExampleInput">Title</label>
                                <input type="text" v-model="video.title" class="form-control" id="formGroupExampleInput" placeholder="">
                                <small v-if="errors.title" class="text-danger">*{{ errors.title[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Select list:</label>
                                <select class="form-control" id="sel1" v-model="video.category_id">
                                    <option v-for="(c,index) in categories" :key="index" :value="c.id">{{c.category_name}}</option>
                                    
                                </select>
                                <small v-if="errors.category_id" class="text-danger">*{{ errors.category_id[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Video Link</label>
                                <input type="text" name="videolink" v-model="video.videolink" class="form-control" id="formGroupExampleInput2" placeholder="">
                                <small v-if="errors.videolink" class="text-danger">*{{ errors.videolink[0] }}</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Short Description</label>
                                
                                <textarea class="form-control" id="exampleFormControlTextarea1" v-model="video.description" rows="3"></textarea>
                                <small v-if="errors.description" class="text-danger">*{{ errors.description[0] }}</small>
                            </div>
                            <!-- <button type="button" @click="tryUploadVideo(video.videolink)" class="btn btn-primary">Submit</button> -->

                            <v-btn color="#2ecc71" @click="tryUploadVideo(video.videolink)">Save</v-btn>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            categories:{},
            user:{},
            video:{
                title: '',
                category_id:'',
                videolink:'',
                description:'',
            },
            errors:{}
        }
    },
    methods:{
        tryUploadVideo(url){
            // get the youtube video code
                this.video.videolink =  this.youtube_video_link_checker(url);
                // get user id
                this.video['user_id'] = this.user.id
                // then post
               
                    axios.post('videos',this.video)
                    .then(response=>{
                        toastr.success('Video Saved');
                        // console.table(response);
                        this.video = {
                            title: '',
                            category_id: '',
                            videolink: '',
                            description: ''
                        }
                        

                    })
                    .catch(error=>{
                        this.errors = error.response.data.errors
                        toastr.error('Error occured!');
                        
                    })
                
        },
        getCategories(){
            axios.get('categories')
            .then(response=>{
                this.categories = response.data;
                return this.categories;
            })
        },
        getUser(){
            axios.get('/profile')
            .then(response=>{
                this.user = response.data;
                return this.user;
            })
        },
        youtube_video_link_checker(url){
            var regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                this.errors = ""
            return match[2];
            } else {
                toastr.error('Invalid Video Link!!');
            }
        }
    },
    created(){
        this.getUser(); 
        this.getCategories();
        
    }

    
}
</script>
