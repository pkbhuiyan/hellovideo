<template>
    <div class="modal fade"  :id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-md-12">
                        <label for="inputCity">Category</label>
                        <input type="text" class="form-control" @keyup.enter="updateCategory(category.id)" v-model="category.category_name" id="inputCity">
                        <small  class="text-danger" v-if="errors">{{ errors.category_name }}</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  @click="updateCategory(category.id)">Update changes</button> -->

                <v-btn  color="#636e72" data-dismiss="modal">Close</v-btn>
                <v-btn color="#2ecc71"  @click="updateCategory(category.id)">Update changes</v-btn>
            </div>
            </div>
    </div>
</div>
</template>

<script>

export default {
    props:{
        openModal:{
            type:String,
            required:true
        },
        category:{
            type: Object,
            required:true
        }
    },
    data(){
        return{
            errors:{}
        }
    },
    methods:{
        updateCategory(id){
            
            
            axios.put(`/categories/${id}`,this.category)
            .then(response => {
                this.errors = ''
                toastr.success('Category updated');
                // this.$parent.load()
                
            })
            .catch(error=>{
                this.errors = error.response.data.errors;
            })
        }
    }

}
</script>

<style>

</style>
