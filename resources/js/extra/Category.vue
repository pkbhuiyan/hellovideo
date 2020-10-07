<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="pull-left">Category</h3>
                        <!-- <button class="btn btn-primary pull-right"  @click="openAdd" data-toggle="modal" data-target="#categoryModal">Add Category</button> -->
                        <v-btn color="#2196f3" class="pull-right"  @click="openAdd" data-toggle="modal" data-target="#categoryModal">Add Category</v-btn>
                    </div>

                    <div class="card-body">
                        <small-serach></small-serach>
                        <!--  -->
                        <ul class="tags">
                            <li v-if="results.length > 0">
                                <span class="tag" v-for="(r,index) in results" :key="index">
                                    <span data-toggle="modal" data-target="#categoryUpModal" @click="openUp(r.id,index)">{{ r.category_name  }}</span> 
                                    <span class="closeX" @click="del(r.id)">X</span>
                                </span>
                            </li>
                            <li v-else>
                                <span class="tag" v-for="(c,index) in categories" :key="index">
                                    <span data-toggle="modal" data-target="#categoryUpModal" @click="openUp(c.id,index)">{{ c.category_name  }}</span> 
                                    <span class="closeX" @click="del(c.id)">X</span>
                                </span>
                            </li>
                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>
        <add-category :openModal="addActive"></add-category>
        <update-category :openModal="updateActive" :category="category"></update-category>
    </div>
</template>

<script>

export default {
    
    data(){
        return{
            addActive:'',
            updateActive:'',
            categories:{},
            category:{},
            results:{},
            errors:{}
        }
    },
    methods:{
        
        openAdd(){
            this.addActive = 'categoryModal'
        },
        getCategories(){
            axios.get('categories')
            .then(response=>{
                this.categories = response.data;
            })
        },
        del(id){
            axios.delete(`/categories/${id}`)
            .then(()=>{
                toastr.warning('Category deleted');
                this.load()
                this.results = {}
            })
        },
        openUp(id,key){
            console.log(key);
            this.category = this.categories[key];
            this.updateActive='categoryUpModal';
        },
        load(){
            this.getCategories()
            
        }
    },
    
    mounted(){
        this.$Progress.start()
        this.getCategories()
        this.$Progress.finish()
    }
}
</script>

<style>
/* vuetify css */
.theme--light.v-btn:not(.v-btn--icon):not(.v-btn--flat) {
    /* background-color: #2196f3!important; */
    color: #fff;
    text-transform: none!important;
}


/* end */
.tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  padding: 0;
}

.tags li {
  float: left; 
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  cursor: pointer;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
}

.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {
  background: #fff;
  border-bottom: 13px solid transparent;
  border-left: 10px solid #eee;
  border-top: 13px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  background-color: crimson;
  color: white;
}

.tag:hover::after {
   border-left-color: crimson; 
}
.closeX {
    float: right;
    font-size: 0.85rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: 0.5;
    top: 8px;
    left: 10px;
    position: relative;
}
</style>
