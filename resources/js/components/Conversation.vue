<template>
    <div class="chat">
      <MessagesHeader :contact="contact" />
      <MessagesFeed :contact="contact" :messages="messages"/>
      <MessageComposer @send="sendMessage" />
    </div>
</template>

<script>
    import MessagesHeader from './MessagesHeader';
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';

    export default {

        components: {
            MessagesHeader,MessagesFeed, MessageComposer
        },
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(content){
                if (!this.contact) {
                    return;
                }
                axios.post('/chat/send', {
                    to_id: this.contact.id,
                    content: content
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            }
        },
    }
</script>
