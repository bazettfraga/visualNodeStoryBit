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
const choices = ref(props.data.choices || [{ text: 'Yes' }, { text: 'No' }])

function onTextInput(event) {
  textInput.value = event.target.value
  updateNodeData(props.id, { text: textInput.value })
}

function addChoice() {
  const newChoices = [...choices.value, { text: 'New Choice' }]
  choices.value = newChoices
  updateNodeData(props.id, { choices: newChoices })
}

function removeChoice(index) {
  const newChoices = choices.value.slice(0, index).concat(choices.value.slice(index + 1))
  choices.value = newChoices
  updateNodeData(props.id, { choices: newChoices })
}
</script>



<template>
  <div class="choice-node">
    <input class="node-title" type="text" v-model="data.label" />
    <textarea class="node-textarea" v-model="data.text"></textarea>

    <!-- Input Handle -->
    <Handle
      type="target"
      :position="Position.Left"
      id="input"
      :style="{ background: '#8A2BE2' }"
    />

    <!-- Display choices with output handles, input fields, and remove buttons -->
    <div v-for="(choice, index) in choices" :key="index" class="choice">
      <button @click="removeChoice(index)" class="remove-button">-</button>
      <input class="choice-input" type="text" v-model="choice.text" />
      <Handle
        type="source"
        :position="Position.Right"
        :id="`output-${index}`"
        :style="{ top: `${170 + index * 40}px`, background: '#8A2BE2' }"
      />
    </div>

    <!-- Add button for new choices -->
    <button class="add-button" @click="addChoice">+</button>
  </div>
</template>

<style scoped>
.choice-node {
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

.choice {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-left: 33px;
  border-radius: 5px;
  margin-top: 5px;
  margin-left: 15px;
  width: 100%;
}

.choice-input {
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
