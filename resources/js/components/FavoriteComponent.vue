<template>
    <button
        class="favorite"
        v-bind:class="favoriteToggle"
        @click="notificateFavorite()"
    >
        &hearts;
    </button>
</template>

<script>
import { identifier } from "@babel/types";

export default {
    props: {
        shop_id: {},
        favorite_id: {},
        toggle: { type: Boolean },
    },
    computed: {
        favoriteToggle: function () {
            return this.toggle ? "favorite--on" : "favorite--off";
        },
    },
    methods: {
        notificateFavorite: function () {
            if (this.toggle) {
                this.unfavorite();
            } else {
                this.favorite();
            }
        },

        changeFavoriteId: function (newValue) {
            if (this.favorite_id == newValue) {
                return;
            }
            this.favorite_id = newValue;
        },

        changeToggle: function (newValue) {
            if (this.toggle == newValue) {
                return;
            }
            this.toggle = newValue;
        },

        favorite: function () {
            axios
                .post("/favorite/create", {
                    shop_id: this.shop_id,
                    favorite_id: this.favorite_id,
                })
                .then((res) => {
                    this.changeFavoriteId(res.data.favorite_id);
                    this.changeToggle(true);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        unfavorite: function () {
            axios
                .post("/favorite/delete", {
                    shop_id: this.shop_id,
                    favorite_id: this.favorite_id,
                })
                .then((res) => {
                    this.changeFavoriteId(undefined);
                    this.changeToggle(false);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
};
</script>

<style scoped>
.favorite {
    font-size: 32px;
}
.favorite--on {
    color: #f00;
}
.favorite--off {
    color: #e2e2e2;
}
</style>
