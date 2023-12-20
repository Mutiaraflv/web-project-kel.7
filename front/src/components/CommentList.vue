<template>
    <div>
      <h2>Comments</h2>
      <ul>
        <li v-for="comment in comments" :key="comment.id">{{ comment.content }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    props: ['comments']
  }
  </script>
  