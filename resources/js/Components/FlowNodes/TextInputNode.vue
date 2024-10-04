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

const { updateNodeData } = useVueFlow()
const textInput = ref(props.data.text || '')

function onTextInput(event) {
  textInput.value = event.target.value
  updateNodeData(props.id, { text: textInput.value })
}
</script>

<template>
  <div class="text-input-node">
    <input class="node-title" type="text" v-model="data.label" ></input>
    <textarea class="node-textarea" v-model="data.text"></textarea>


    <!-- Input Handle -->
    <Handle
      type="target"
      :position="Position.Left"
      id="input"
      :style="{ background: '#8A2BE2' }"
    />

    <!-- Output Handle -->
    <Handle
      type="source"
      :position="Position.Right"
      id="output"
      :style="{ background: '#8A2BE2' }"
    />
  </div>
</template>

<style scoped>
.text-input-node {
  padding: 10px;
  background-color: #1F1F1F;
  border: 1px solid #5E5E5E;
  border-radius: 5px;
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


.node-textarea {
  font-size: 10px;
  line-height: 9px;
  color: #fff;
  width: 100%;
  background-color: #333;
  border: none;
  padding: 5px;
  border-radius: 5px;
  margin-top: 3px;
  height: 100px;
  resize: none;
  overflow: auto;
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
