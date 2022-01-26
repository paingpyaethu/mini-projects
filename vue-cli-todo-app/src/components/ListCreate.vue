<template>
	<div class="form-row mb-3">
		<div class="col-10">
			<input type="text" class="form-control form-control-lg" v-model="newMessage" @keyup.enter="create()" placeholder="Say Something">
		</div>
		<div class="col-2">
			<button class="btn btn-primary btn-lg w-100" @click="create()">
				<i class="fas fa-plus-circle"></i>
			</button>
		</div>
		<div class="col-12">
			<small v-if="showError" class="text-danger font-weight-bold">{{errorMessage}}</small>
		</div>
	</div>
</template>

<script>
    export default {
        name: "ListCreate",
        data() {
            return {
                newMessage: '',
								errorMessage: '',
								showError: false
            }
        },
        methods: {
            create() {
                if (this.newMessage.length){
                    this.showError = false;
                    this.$emit('create',this.newMessage);
                    this.newMessage = '';
								}else{
                    this.showError = true;
                    this.errorMessage = 'Say Something'
								}
            }

        },
    }
</script>

<style scoped>

</style>