<template>
    <div>
        <div class="row col">
            <h1>Парсер markdown</h1>
        </div>

        <div class="row col">
            <p>Парсер жирного текста и курсива</p>
        </div>
        <textarea v-model="message" @input="parse"></textarea>
        <div class="response" v-html="response" />
    </div>

</template>

<script>
export default {
    data() {
        return {
            response: '',
            message: ''
        };
    },
    methods: {
        parse: function() {
            const options = {
                url: 'https://localhost/convert',
                method: 'POST',
                data: {
                    'message': this.message
                }
            }
            this.$axios(options)
                .then((res) => {
                    this.response = res.data
                })
                .catch((err) => {
                    console.error(err);
                })
        }
    }
};
</script>
