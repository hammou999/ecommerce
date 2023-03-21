<template>
    <div id="plist" class="people-list">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Search..." />
      </div>
      <ul class="list-unstyled chat-list mt-2 mb-0 ul1">
        <li v-for="contact in contacts" :key="contact.id" @click="selectContact(contact)" :class="`clearfix${contact.id == selected.id ? ' active' : ''}`">
          <div class="count" v-if="contact.unread_count">
              {{ contact.unread_count }}
          </div>
          <img
            src="https://bootdey.com/img/Content/avatar/avatar1.png"
            alt="avatar"
          />
          <div class="about">
            <div class="name">{{ contact.name }}</div>
            <div class="status">
              <i class="fa fa-circle offline"></i> il y a
            </div>
          </div>
        </li>
      </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        },
        mounted() {

        },
        methods: {
            selectContact(contact) {
                contact.unread_count = 0;
                this.selected = contact;
                this.$emit('selected', contact);
            }
        },
        data() {
            return {
                selected : Object
            };
        },
        }
</script>

<style>



</style>
