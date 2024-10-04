<script setup>
import { ref } from 'vue'
import { Handle, Position, useVueFlow } from '@vue-flow/core'

const props = defineProps({
  id: {
    type: String,
    required: true,
  },
  data: {
    type: Object,
    required: true,
  },
})

</script>


<template>
  <div class="stop-node">
    <p>End Node!</p>

    <!-- Input Handle -->
    <Handle
      type="target"
      :position="Position.Left"
      id="input"
      :style="{ background: '#8A2BE2' }"
    />
  </div>
</template>

<style scoped>
.stop-node {
  padding: 10px;
  background-color: #1F1F1F;
  border: 1px solid #5E5E5E;
  border-radius: 5px;
  color:white;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  width: 200px;
  text-align: center;
}

.node-title {
  font-size: 12px;
  color: #dcdcdc;
  background-color: #1F1F1F;
  border-color: #1F1F1F;
  padding: 5px;
  border-radius: 3px;
  width: 100%;
  box-sizing: border-box;

  text-align: center;
}


/* width */
.node-textarea::-webkit-scrollbar {
  width: 10px;
}

/* Track */
.node-textarea::-webkit-scrollbar-track {
  background-color: #2b2b2b;
  border-radius: 5px;
}

/* Handle */
.node-textarea::-webkit-scrollbar-thumb {
  background: #5E5E5E;
  border-radius: 10px;
}

/* Handle on hover */
.node-textarea::-webkit-scrollbar-thumb:hover {
  background: #5a3a77;
}
</style>
