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
const redirects = ref(props.data.redirects || [{ text: 'Yes' }, { text: 'No' }])

function onTextInput(event) {
  textInput.value = event.target.value
  updateNodeData(props.id, { text: textInput.value })
}

function addRedirect() {
  redirects.value.push({ text: 'New Redirect' })
  updateNodeData(props.id, { redirects: redirects.value })
}

function removeRedirect(index) {
  redirects.value.splice(index, 1)
  updateNodeData(props.id, { redirects: redirects.value })
}
</script>



<template>
  <div class="redirect-node">
    <p>Redirect node</p>

    <!-- Input Handle -->
    <Handle
      type="target"
      :position="Position.Left"
      id="input"
      :style="{ background: '#8A2BE2' }"
    />

    <!-- Display redirects with output handles, input fields, and remove buttons -->
    <div v-for="(redirect, index) in redirects" :key="index" class="redirect">
      <button @click="removeRedirect(index)" class="remove-button">-</button>
      <input class="redirect-input" type="text" v-model="redirect.text" />
      <Handle
        type="source"
        :position="Position.Right"
        :id="`output-${index}`"
        :style="{ top: `${56 + index * 39}px`, background: '#8A2BE2' }"
      />
    </div>

    <!-- Add button for new redirects -->
    <button class="add-button" @click="addRedirect">+</button>
  </div>
</template>

<style scoped>
.redirect-node {
  padding: 10px;
  background-color: #1F1F1F;
  border: 1px solid #c75454;
  border-radius: 5px;
  color:white;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  width: 155px;
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

.redirect {
  display: flex;
  align-items: center;
  justify-content: space-between;

  border-radius: 5px;
  margin-top: 5px;

  width: 100%;
}

.redirect-input {
  font-size: 10px;
  color: #fff;
  background-color: #555;
  border: none;
  padding: 5px;
  border-radius: 5px;
  width: 70%;
  margin-right: 5px;
}

.add-button {
  background-color: blue;
  border-radius: 3px;
  border: none;
  color: white;
  padding: 5px;
  text-align: center;
  cursor: pointer;
  font-size: 14px;
  margin-top: 10px;
  width: 30px;
}

.add-button:hover {
  background-color: darkblue;
}

.add-button:active {
  background-color: navy;
}

.remove-button {
  background-color: red;
  border-radius: 3px;
  border: none;
  color: white;
  padding: 5px;
  text-align: center;
  cursor: pointer;
  font-size: 14px;
  width: 30px;
  margin-right: 5px;
}

.remove-button:hover {
  background-color: darkred;
}

.remove-button:active {
  background-color: maroon;
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
