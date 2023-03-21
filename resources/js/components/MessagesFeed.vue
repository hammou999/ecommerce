<template>
    <div class="chat-history" >
        <ul class="m-b-0 ul2" v-if="contact" ref="feed">
          <li v-for="message in messages" :key="message.id" class="clearfix" >
            <div :class="`message-data${message.to_id == contact.id ? ' text-right' : ''}`">
              <span class="message-data-time">{{ format(message.created_at) }}</span>
            </div>
            <div :class="`message${message.to_id == contact.id ? ' other-message float-right' : ' my-message'}`">
              {{ message.content }}
            </div>
          </li>
        </ul>
      </div>
</template>

<script>
    import { formatRelative } from 'date-fns'
    import { fr } from 'date-fns/locale'
    export default {
        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            format(date){
                return formatRelative(new Date(date),new Date(), { locale: fr })
            },
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 10);
            }
        },
        watch: {
            contact() {
                this.scrollToBottom();
            },
            messages:{
                deep: true,
                handler(){
                this.scrollToBottom();
            }
            }
        }
    }
</script>
