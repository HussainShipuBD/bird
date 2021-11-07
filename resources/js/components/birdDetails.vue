<template>
    <div>
        <div class="_detailsPage">
            <h1 class="_detailsPage_title">PIRATE {{ dataList.name }}</h1>
            <p class="_detailsPage_des">{{ dataList.description }}</p>

            <div class="_detailsPage_pic">
                <!-- <img class="_detailsPage_img" src="/img/LWN021-1.jpg" alt="" title=""> -->
                <img class="_detailsPage_img" :src="dataList.image" alt="" title="">
            </div>

            <h1 class="_detailsPage_subTitle">attributes</h1>

            <div class="_detailsPage_attr_main">
                <div class="_detailsPage_attr">
                    <p class="_detailsPage_attr_th _one">TRAIT</p>
                    <p class="_detailsPage_attr_th _two">VALUE</p>
                </div>

                <!-- Item -->
                <div v-for="(item, index) in dataList.attributes" :key="index" class="_detailsPage_attr">
                    <p class="_detailsPage_attr_title _one">{{ item.trait_type }}</p>
                    <p class="_detailsPage_attr_val _two">{{ item.value }}</p>
                </div>
                <!-- Item -->
            </div>
        </div>
        <p>This is details</p>
    </div>
</template>


<script>
export default {
    data() {
    	return {
            dataList: [],
    	}
    },

    methods : {
    
    },

    async created(page){
        const res = await this.callApi('get', `/app/get_bird_details/${this.$route.params.id}`)
    	if (res.status === 200) {
    		this.dataList = res.data
            console.log('yes', this.dataList)
    	}else{
    		this.swr()
    	}
    }
};	
</script>