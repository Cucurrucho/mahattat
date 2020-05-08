<template>
    <div class="is-hidden-tablet">
        <a class="drawer-btn" @click="toggleDrawer">
            <i class="fas fa-arrow-left"></i>
        </a>
        <vue-drawer :visible.sync="visible" placment="right">
            <div slot="body">
                <div class="drawer-item-envelop">
                    <a :href="newsAction" class="drawer-item">
                        <span>أخبار ومقالات</span>
                    </a>
                </div>
                <div class="drawer-item-envelop">
                    <a :href="mentorAction" class="drawer-item">
                        <span>الموجهين</span>
                    </a>
                </div>
                <div class="drawer-item-envelop">
                    <a :href="participantsAction" class="drawer-item">
                        <span>المشاركين</span>
                    </a>
                </div>
            </div>
        </vue-drawer>
    </div>
</template>

<script>
    import VueDrawer from 'vue-drawer-component'
    import 'vue-drawer-component/src/index.css'

    export default {
        name: "Drawer",
        components: {
            VueDrawer
        },
        props: {
            newsAction: {
                type: String,
                required: true
            },
            mentorAction: {
                type: String,
                required: true
            },
            participantsAction: {
                type: String,
                required: true
            },
        },
        data() {
            return {
                visible: false
            }
        },
        methods: {
            toggleDrawer(){
                this.visible = !this.visible;
            }
        }
    }
</script>

<style scoped>
    .drawer {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
    }
    .drawer-btn {
        position: fixed;
        top: 50%;
        color: black;
    }
    .drawer-item-envelop {
        margin-top: 50%;
        height: 80%;
        width: 80%;
    }
    .drawer-item {
        box-shadow: 10px 10px 10px 10px rgba(232,232,232,1);
        width: 100%;
        border-radius: 50%;
        text-align: center;
        padding: 50% 0;
        line-height: 0;
        position: relative;
        border: 1px solid darkgray;
        color: black;
        transform: rotate(20deg);
        display: inline-block;
    }
    a.drawer-item:hover {
        background: rgba(41,102,117,1);
        color: white;
    }

</style>