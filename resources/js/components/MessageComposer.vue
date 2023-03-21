<template>
    <div class="chat-message clearfix">
        <div class="input-group mb-0">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-send"></i></span>
          </div>
          <input
            type="text"
            class="form-control"
            placeholder="Enter text here..."
            v-model="message"
            @keydown.enter="send"
          />
        </div>
      </div>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault();

                if (this.message == '') {
                    return;
                }

                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>
