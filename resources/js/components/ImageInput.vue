<template>
    <div class="columns">
        <div class="file column has-name is-right is-boxed">
            <label class="file-label">
                <input class="file-input" type="file" @change="onSelectFile" name="thumbnail">
                <span class="file-cta">
                 <span class="file-icon">
                    <i class="fas fa-upload"></i>
                 </span>
                  <span class="file-label">
                     تحميل الصورة
                  </span>
             </span>
            </label>
        </div>
        <div class="column">
            <div>
                <figure class="image">
                    <img  :src="image">
                </figure>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "ImageInput",
        data() {
            return {
                image: this.url
            }
        },
        props: {
            url: {
                type: String,
                default: ''
            }
        },
        methods: {
            onSelectFile(e) {
                let reader, files = e.target.files;
                if (files.length != 0) {
                    reader = new FileReader();
                    reader.onload = (e) => {
                        this.image = e.target.result;
                    }
                }
                reader.readAsDataURL(files[0]);
            }
        }
    }
</script>

<style scoped>
    img {
        width: 300px;
        height: 300px;
    }
</style>