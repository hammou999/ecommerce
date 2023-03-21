<template>
  <div class="card chat-app">
    <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
    <ContactsList :contacts="contacts" @selected="startConversationWith"/>
  </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';


export default {
  components: {
    Conversation, ContactsList
    },

  props: {
            user: Object,
            initialcontacts: Object,
        },
  data() {
    return {
      contacts : this.initialcontacts,
      selectedContact: null,
      messages:[],
      now : new Date(),
    };
  },

  mounted() {
    Echo.private(`message.${this.user.id}`)
                .listen('Message', (e) => {
                            console.log("get");
                    this.hanleIncoming(e.message);
                });
  },

  methods: {
      startConversationWith(contact) {
                axios.get(`/chat/${contact.id}`)
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
      saveNewMessage(message) {
          this.messages.push(message);
      },
      hanleIncoming(message) {
                if (this.selectedContact && message.from_id == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    return;
                }
                this.contacts = this.contacts.map((single) => {
                  if (single.id !== message.from_id) {
                      return single;
                  }
                  single.unread_count += 1;
                  return single;
                })
                let notification = new Audio('/sound/notification.mp3');
                notification.play();

      }


  },
};
</script>

