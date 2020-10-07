<template>
    <div>
        <div class="searchbar">
            <div class="field-input">
                <input type="text" v-model="keywords" placeholder="Search..."><span> </span>
            </div>
        </div>
        <hr>
    </div>
    
</template>

<script>
export default {
    data(){
        return{
            keywords: null
        }
    },
    watch:{
        keywords(after,before){
            this.fetch();
        }
    },
    methods:{
        fetch(){
            axios.get('/search',{params:{keywords:this.keywords}})
            .then(response=>{
                this.$parent.results = response.data;
            })
            .catch(error => {})
        }
    }
}
</script>






<style>
.searchbar {
    max-width: 960px;
    margin: 0 auto;
    width: 100%;
    
}
.field-input {
    text-align: right;
}
.field-input  input:focus {
    outline: none;
}
.searchbar .field-input input {
    text-align: left;
    border-radius: 6rem;
    border: 1px solid #a0a0a0;
    padding: .6rem 2rem .6rem 1rem;
    width: 12rem;
    font-family: 'roboto';
    transition: .5s;
}
</style>

