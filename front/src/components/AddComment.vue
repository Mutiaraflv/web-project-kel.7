<template>
    <div>
      <h2>Add Comment</h2>
      <textarea v-model="newComment" rows="4" cols="50"></textarea>
      <button @click="addComment">Submit</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        newComment: ''
      }
    },
    methods: {
      addComment() {
        this.$emit('add-comment', this.newComment);
        this.newComment = '';
      }
    }
  }
  </script>
  