<template>
    <div class="modal fade"  :id="openModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-md-12">
                        <label for="inputCity">Category</label>
                        <input type="text" class="form-control" @keyup.enter="save" v-model="category_name" id="inputCity">
                        <small  class="text-danger" v-if="errors">{{ errors.category_name }}</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
                <v-btn  color="#636e72" data-dismiss="modal">Close</v-btn>
                <v-btn color="#2ecc71" @click="save">Save</v-btn>
            </div>
            </div>
    </div>
</div>
</template>

<script>

export default {
    props:['openModal'],
    data(){
        return{
            category_name:'',
            errors:{}
        }
    },
    methods:{
        save(){
            this.$Progress.start()
            axios.post('categories',{
                category_name:this.category_name
            })
            .then(response =>{
                // console.log(response);
                toastr.success('New category added');
                this.$parent.categories.push(response.data)
                this.category_name = ''
                this.errors = ''
                this.$parent.addActive = ''
                this.$Progress.finish()
            })
            .catch(error=>{
                
                this.errors = error.response.data.errors;
                toastr.error('Error occured!');
                this.$Progress.fail()
            })
        }
    }

}
</script>

<style>

</style>
