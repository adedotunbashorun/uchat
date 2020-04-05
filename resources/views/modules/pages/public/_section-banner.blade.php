<div class="banner-container" :class="bg">
    <swiper :options="swiperOption">
        <div class="swiper-pagination" slot="pagination"></div>
        <swiper-slide v-for="(banner,index) in slides" :key="index">
            <img :src="banner.img">
        </swiper-slide>
    </swiper>
</div>