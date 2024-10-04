<script setup>
import { ref, watch } from 'vue'
import { VueFlow } from '@vue-flow/core'
import InteractionControls from './../../Components/FlowCore/InteractionControls.vue'

import StartNode from './../../Components/FlowNodes/StartNode.vue'
import StopNode from './../../Components/FlowNodes/StopNode.vue'
import TextInputNode from './../../Components/FlowNodes/TextInputNode.vue'
import ChoiceNode from './../../Components/FlowNodes/ChoiceNode.vue'
import RedirectNode from './../../Components/FlowNodes/RedirectNode.vue'


import KeyAdderNode from './../../Components/FlowNodes/KeyAdderNode.vue'

import SpecialEdge from './../../Components/FlowNodes/SpecialEdge.vue'

const props = defineProps({
  graphData: Object
});

const nodes = ref([]);
const edges = ref([]);
const position = ref([0, 0]);
const zoom = ref(1);

// Watch for changes to graphData and update nodes and edges
watch(() => props.graphData, (newData) => {
  console.log('New Graph Data:', newData); // For debugging
  if (newData) {
    nodes.value = newData.nodes || [];
    edges.value = newData.edges || [];
    position.value = newData.position || [0, 0];
    zoom.value = newData.zoom || 1;
  }
}, { immediate: true });


</script>

<!-- // notes.
// In nodes if a type is type: 'textInput',
{/* <template #node-textInput="TextInputProps">
        <TextInputNode v-bind="TextInputProps" />
      </template> */}
 //It would need to from what I thing. needs to match that of  #node-textInput
 //So from  #node-textInput cut off #node- and presto. Again, this is the assumption. -->

<template>
  <div class="vue-flow-container">
    <VueFlow :nodes="nodes" :edges="edges" class="interaction-flow" fit-view-on-init>
      <InteractionControls />

      <template #node-textInput="TextInputProps">
        <TextInputNode v-bind="TextInputProps" />
      </template>

      <template #node-choice="ChoiceProps">
        <ChoiceNode v-bind="ChoiceProps" />
      </template>
      
      <template #node-redirect="RedirectProps">
        <RedirectNode v-bind="RedirectProps" />
      </template>

      <template #node-keyAdder="KeyAdderProps">
        <KeyAdderNode v-bind="KeyAdderProps" />
      </template>

      <template #node-start="StartProps">
        <StartNode v-bind="StartProps" />
      </template>

      <template #node-stop="StopProps">
        <StopNode v-bind="StopProps" />
      </template>      
    </VueFlow>
  </div>
</template>



<style scoped>
@import 'https://cdn.jsdelivr.net/npm/@vue-flow/core@1.39.1/dist/style.css';
@import 'https://cdn.jsdelivr.net/npm/@vue-flow/core@1.39.1/dist/theme-default.css';
@import 'https://cdn.jsdelivr.net/npm/@vue-flow/controls@latest/dist/style.css';
@import 'https://cdn.jsdelivr.net/npm/@vue-flow/minimap@latest/dist/style.css';
@import 'https://cdn.jsdelivr.net/npm/@vue-flow/node-resizer@latest/dist/style.css';

.vue-flow-container {
  width: 100%;
  height: 100vh;
  background-color: #1F1F1F;
  position: relative;
}


html,
body,
#app {
  margin: 0;
  height: 100%;
}

#app {
  text-transform: uppercase;
  font-family: 'JetBrains Mono', monospace;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

.vue-flow__minimap {
  transform: scale(75%);
  transform-origin: bottom right;
}

.vue-flow__panel {
    background-color:#2d3748;
    padding:10px;
    border-radius:8px;
    box-shadow:0 0 10px #00000080;
    color:#fff;
    display:flex;
    flex-direction:column;
    gap:2px;
    font-size:12px;
    font-weight:600
}

.vue-flow__panel .label {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:5px;
    cursor:pointer
}

.vue-flow__panel .label input {
    cursor:pointer
}

</style>