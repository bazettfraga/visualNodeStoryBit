<template>
  <div class="special-node">
    <div class="node-title">{{ data.title }}</div>
    <textarea class="node-textarea" v-model="data.text"></textarea>
  </div>
</template>

<script setup>
import { toRefs } from 'vue'

const props = defineProps({
  data: Object
})

const { data } = toRefs(props)
</script>

<style scoped>
.special-node {
  padding: 10px;
  background-color: #1F1F1F;
  border: 1px solid #5E5E5E;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  width: 200px;
  position: relative; /* Ensures absolute positioning of child elements */
}

.node-title {
  width: 100%;
  background-color: #333;
  color: #fff;
  padding: 5px;
  text-align: center;
  border-radius: 5px;
}

.node-textarea {
  font-size: 8px;
  line-height: 8px;
  color: #fff;
  width: 100%;
  background-color: #333;
  border: none;
  padding: 5px;
  border-radius: 5px;
  margin-top: 10px;
  height: 100px;
  resize: none;
  overflow: auto;
}

.handle {
  width: 10px;
  height: 10px;
  background-color: #000;
  border-radius: 50%;
  cursor: pointer;
  position: absolute;
  top: 50%;
  left: -5px;
}
</style>
