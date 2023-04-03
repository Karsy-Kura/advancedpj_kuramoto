<template>
    <div class="container">
        <button class="favorite-on">&hearts;</button>
        <button class="favorite-off">&hearts;</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Favorite Component mounted.');
        }
    }
</script>

<style scoped>
    .favorite-on , .favorite-off {
        font-size: 32px;
    }
    .favorite-on {
        color: #f00;
    }
    .favorite-off {
        color: #e2e2e2;
    }
</style>
