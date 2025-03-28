<script type="text/x-template" id="wcs_templates_modal--taxonomy">
    <div class="wcs-modal" :class="classes" v-on:click="closeModal">
        <div class="wcs-modal__box">
            <div class="wcs-modal__inner">
                <a href="#" class="wcs-modal__close ti-close" v-on:click="closeModal"></a>
                <div class="wcs-modal__content wcs-modal__content--full">
                    <h2 v-html="data.name"></h2>
                    <div class="wcs-modal__instuctor_image"></div>
                    <div v-html="data.content"></div>
                    <div class="wcs-modal__instuctor_id" v-html="data.id" style="opacity: 0;"></div>
                </div>
            </div>
        </div>
    </div>
</script>
