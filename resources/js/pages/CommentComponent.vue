<template>
  <div>
    <div v-for="comment in comments" :key="comment.id" class="my-5">
      <h2>{{ comment.name }}</h2>
      <p class="m-0">{{ comment.body }}</p>
      <a v-if="level < 3" href="#new-post" @click="replyToThis(comment)"
        >Reply</a
      >
      <div v-if="comment.child_comments.length > 0" class="comments pl-5 mt-3">
        <comments :comments="comment.child_comments" :level="level + 1" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "comments",
  props: {
    comments: Array,
    level: Number,
  },
  components: {
    comments: this,
  },
  methods: {
    replyToThis(comment) {
      console.log({ comment });
      this.$root.$emit("replyToThis", comment);
    },
  },
};
</script>

<style scoped>
.comments {
  border-left-color: black;
  border-left-style: solid;
  border-left-width: 2px;
}
</style>
