<template>
  <div class="wrapper">
    <div class="contentt">
      <p>Press enter or add a comma after each Skills</p>
      <ul>
        <li v-for="(tag, index) in tags" :key="tag.id">
          {{ tag.name }}
          <i class="uit uit-multiply" @click="removeTag(index, tag.id)"> </i>
        </li>
        <input
          class="input-skills"
          type="text"
          spellcheck="false"
          @keydown.enter="addTag"
          v-on:blur="addTag"
        />
      </ul>
    </div>
    <div class="details">
      <p>
        <span>{{ tags.length }}</span> tags are remaining
      </p>
      <button @click="removeAllTags">Remove All</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tags: [],
    };
  },

  mounted() {
    axios.get("/getTags").then(({ data }) => {
      this.tags = data;
    });
  },

  methods: {
    removeTag(index, id) {
        if(type)
      axios
        .post("/removeTag", {
          id: id,
        })
        .then(() => {
          this.tags.splice(index, 1);
        });
    },

    removeAllTags() {
      axios
        .post("/removeAllTags")
        .then(() => {
          this.tags.splice(0);
        });
    },

    addTag(event) {
      if (this.tags.length < 10) {
        event.preventDefault();
        var val = event.target.value.trim();
        if (val.length > 2 && !this.tags.includes(val)) {
          axios
            .post("/addTag", {
              tag: val,
            })
            .then(({ data }) => {
              this.tags.push(data);
              event.target.value = "";
            });
        }
      }
    },
  },
};
</script>
