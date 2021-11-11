<template>
    <div>
        <div class="_menu">
            <div class="_home">
                <div class="_home_card_all">
                    <div class="_home_top">
                        <h1 class="_home_title">GALLERY</h1>

                        <div class="_home_input">
                            <Input @on-change="searchData" v-model="str" placeholder="Search"/>
                        </div>
                    </div>

                    <div class="_home_card_main">
                        <!-- Item -->
                        <div class="_home_card" @click="$router.push('/birdDetails/' + item.id)" v-for="(item, index) in dataList.data" :key="index">
                            <div class="_home_card_pic">
                                <img class="_home_card_img" v-lazy="item.image" alt="" title="">
                            </div>

                            <div class="_home_card_details">
                                <p class="_home_card_title">{{ item.name }}</p>
                                <!-- <p class="_home_card_des">{{ item.description }}</p> -->
                            </div>
                        </div>
                        <!-- Item -->
                    </div>

                    <div class="_pagination">
                        <Page :page-size="dataList.per_page" :current="dataList.current_page" :total="dataList.total" @on-change="paginate"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
    	return {
            dataList: [],
            str:'',
            page:''
    	}
    },

    methods : {
        async searchData(){ 
            const res = await this.callApi('get', `/app/get_bird?str=${this.str}`)
            if (res.status === 200) {
                this.dataList = res.data
            }else{
                this.swr()
            }
        },

        async paginate(page) {
            this.tableLoading = true;
            const res = await this.callApi("get", `/app/get_bird?page=${page}`);
            if (res.status == 200) {
                this.dataList = res.data;
            } else {
                this.nswr();
            }
            this.tableLoading = false;
        },
    },

    async created(page){
        const res = await this.callApi('get', '/app/get_bird')
        // const res = await this.callApi('get', '/app/get_bird')
    	if (res.status === 200) {
    		this.dataList = res.data
            console.log('yes', this.dataList)
    	}else{
    		this.swr()
    	}
    }
};	
</script>